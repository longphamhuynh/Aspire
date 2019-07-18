<?php
namespace App\Http\Requests;

use App\Http\Requests\Request as CustomRequest;
use Validator;
use Route;

class CustomerRepaymentRequest extends CustomRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
    	$rules = [
            'customer_loans_id' => 'required',
            'repayment_amount'  => 'required|numeric',
            'repayment_method'  => 'required',
       	];
    	
    	return $rules;
    }

    public function attributes()
    {
        return [
            'customer_loans_id' => 'Loans',
            'repayment_amount'  => 'Repayment amount',
            'repayment_method'  => 'Repayment method',
        ];
    } 
}
