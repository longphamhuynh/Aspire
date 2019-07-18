<?php
namespace App\Http\Requests;

use App\Http\Requests\Request as CustomRequest;
use Validator;
use Route;

class CustomersRequest extends CustomRequest
{
	protected $isCreate = false;

	public function __construct() {
		if (Route::getCurrentRoute()->getName() === 'api.v1.customer.create') {
			$this->isCreate = true;
		}
	}
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
    	$rules = [
          	'email'     => 'required|email',
          	'password'  => 'required'
       	];
    	if ($this->isCreate) {
    		$rules = [
	          	'full_name' => 'required',
	          	'password'  => 'required|min:6',
	          	'email'     => 'required|email|unique:customers,email',
	          	'phone'     => 'required|integer',
	          	'passport'  => 'required|integer',
	       	];
    	}
    	return $rules;
    }

    public function attributes()
    {
        return [
            'full_name' => 'Full name',
          	'password'  => 'Password',
          	'email'     => 'Email',
          	'phone'     => 'Phone',
          	'passport'  => 'Passport',
        ];
    } 
}
