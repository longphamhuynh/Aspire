<?php
namespace App\Services;

use App\Models\CustomerRepayment;
use App\Models\CustomerLoans;
use Carbon\Carbon;
class CustomerRepaymentService extends BaseService
{
	protected $pendding = 'PENDDING';
	protected $approved = 'APPROVED';
	protected $repaid   = 'REPAID';
	protected $rejected = 'REJECTED';

	/**
	 * Customer repayment service constructor
	 */
	public function __construct(CustomerRepayment $customerRepayment, CustomerLoans $customerLoans)
	{
		$this->customerRepayment = $customerRepayment;
		$this->customerLoans     = $customerLoans;
	}

	/**
	 * create New Repayment
	 * @param  $request
	 * @return array|boolean
	 */
	public function createNewRepayment($request)
	{
		$loans = $this->customerLoans->where('id', $request->customer_loans_id)
			->where('customer_id', auth()->user()->id)
			->where('status', $this->approved)
			->first();
		if ($loans = $this->buildResource($loans)) {
			$total_payment   = intval(str_replace(',', '', $loans->total_payment));
			$total_repayment = $loans->repayment->sum('repayment_amount');
			if ($total_repayment < $total_payment) {

				if ($request->repayment_amount >= intval(str_replace(',', '', $loans->monthly_repayment))) {
					$repayment = [
						'customer_id'       => auth()->user()->id,
						'customer_loans_id' => $request->customer_loans_id,
						'repayment_amount'  => $request->repayment_amount,
						'repayment_method'  => $request->repayment_method,
						'paid_at'           => Carbon::now()
					];
					$repayment = $this->customerRepayment->create($repayment);
					if (($total_repayment + $request->repayment_amount) >= $total_payment) {
						$this->customerLoans->where('id', $request->customer_loans_id)
						->where('customer_id', auth()->user()->id)->update(['status' => $this->repaid]);
					}
					return $repayment;
				}
			}
		}
		return false;
	}
}
