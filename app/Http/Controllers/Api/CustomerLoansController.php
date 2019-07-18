<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerLoansRequest;
use App\Http\Controllers\Controller;
use App\Services\CustomerLoansService;

class CustomerLoansController extends Controller
{
    public function __construct(CustomerLoansService $customerLoansServie)
    {
    	$this->customerLoansServie = $customerLoansServie;
    }

    public function createLoans(CustomerLoansRequest $request)
    {
    	$loans = $this->customerLoansServie->createLoans($request);
    	if (!$loans) {
    		return [
				'status'  => 406,
				'message' => 'Create new loans not success. Loans already been taken',
				'data'    => null
    		];
    	}
    	return [
			'status'  => 200,
			'message' => 'Create new loans successsfull.',
			'data'    => $loans
		];
    }
}
