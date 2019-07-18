<?php
namespace App\Http\Requests;

use App\Http\Requests\Request as CustomRequest;
use Validator;
use Route;

class CustomerLoansRequest extends CustomRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
    	$rules = [
            'loan_amount'         => 'required',
            'currency'            => 'required',
            'loan_duration'       => 'required|integer',
            'repayment_frequency' => 'required',
            'interest_rate'       => 'required|integer',
            'arrangement_fee'     => 'required|numeric',
       	];
    	
    	return $rules;
    }

    public function attributes()
    {
        return [
            'loan_amount'         => 'Loans amount',
            'currency'            => 'Currency',
            'loan_duration'       => 'Loans duration',
            'repayment_frequency' => 'Repayment frequency',
            'interest_rate'       => 'Interest rate',
            'arrangement_fee'     => 'Arrangement fee',
        ];
    } 
}
