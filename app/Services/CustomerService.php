<?php
namespace App\Services;

use App\Models\Customers;

class CustomerService
{
	/**
	 * Customer service constructor
	 */
	public function __construct(Customers $customers)
	{
		$this->customers = $customers;
	}

	/**
	 * Create new customer logic
	 * @param request
	 * @return array | boolean
	 */
	public function createNewCustomer($request)
	{
		$customer = [
			'full_name'   => $request->full_name,
			'password'    => bcrypt($request->password),
			'email'       => $request->email,
			'fulladdress' => $request->fulladdress,
			'phone'       => $request->phone,
			'passport'    => $request->passport
		];
		return $this->customers->create($customer);
	}

	/**
	 * Login logic
	 * @param $request
	 * @return array | boolean
	 */
	public function login($request)
	{
		if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $customer = auth()->user();
            $access_token = optional($customer)->createToken('customer_token')->accessToken;
            return ['access_token' => $access_token];
        }
        return false;
	}
}
