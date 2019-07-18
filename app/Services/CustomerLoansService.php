<?php
namespace App\Services;

use App\Models\CustomerLoans;
use Carbon\Carbon;
class CustomerLoansService extends BaseService
{
	protected $pendding = 'PENDDING';
	protected $approved = 'APPROVED';
	protected $repaid   = 'REPAID';
	protected $rejected = 'REJECTED';
	/**
	 * Customer loans service constructor
	 */
	public function __construct(CustomerLoans $customerLoans)
	{
		$this->customerLoans = $customerLoans;
	}

	/**
	 * Create Loans
	 * @param  $request
	 * @return array | boolean
	 */
	public function createLoans($request)
	{
		if (!$this->customerLoans->where('customer_id', auth()->user()->id)->first()) {
			$loans = [
				'customer_id'         => auth()->user()->id,
				'loan_amount'         => $request->loan_amount,
				'currency'            => $request->currency,
				'loan_duration'       => $request->loan_duration,
				'repayment_frequency' => $request->repayment_frequency,
				'interest_rate'       => $request->interest_rate,
				'arrangement_fee'     => $request->arrangement_fee,
				'status'              => $this->approved,
				'loan_date'          => Carbon::now()
			];
			$createLoans = $this->customerLoans->create($loans);
			if ($createLoans) {
				return $this->buildResource($createLoans);
			}
			return false;
		}
		return false;
	}
}
