<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\CustomersRequest;
use App\Http\Controllers\Controller;
use App\Services\CustomerService;

class CustomersController extends Controller
{
    public function __construct(CustomerService $customerServie)
    {
    	$this->customerService = $customerServie;
    }

    /**
     * Customer register
     * @param App\Http\Requests\CustomersRequest CustomersRequest
     * @return response
     */
    public function register(CustomersRequest $request)
    {
    	$customer = $this->customerService->createNewCustomer($request);
    	if (!$customer) {
    		return [
				'status'  => 424,
				'message' => 'Create new customer not success.',
				'data'    => null
    		];
    	}
    	return [
			'status'  => 201,
			'message' => 'Create new customer successsfull.',
			'data'    => $customer
		];
    }

    /**
     * Customer Login
     * @param CustomersRequest $request
     * @return response
     */
    public function login(CustomersRequest $request)
    {
    	$customer = $this->customerService->login($request);
    	if ($customer) {
    		return [
				'status'  => 200,
				'message' => 'login successsfull.',
				'data'    => $customer
			];
    	}
		return [
			'status'  => 403,
			'message' => 'login fails.',
			'data'    => null
		];
    }
}
