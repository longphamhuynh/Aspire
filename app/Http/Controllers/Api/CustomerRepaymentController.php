<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRepaymentRequest;
use App\Http\Controllers\Controller;
use App\Services\CustomerRepaymentService;

class CustomerRepaymentController extends Controller
{
    public function __construct(CustomerRepaymentService $customerRepaymentService)
    {
    	$this->customerRepaymentService = $customerRepaymentService;
    }

    /**
     * create Repayment
     * @param  CustomerRepaymentRequest $request
     * @return 
     */
    public function createRepayment(CustomerRepaymentRequest $request)
    {
    	$repayment = $this->customerRepaymentService->createNewRepayment($request);
    	if (!$repayment) {
    		return [
				'status'  => 406,
				'message' => 'Create repayment not success. Repayment invalid',
				'data'    => null
    		];
    	}
    	return [
			'status'  => 200,
			'message' => 'Create new loans successsfull.',
			'data'    => $repayment
		];
    }
}