<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerLoans extends Model
{
	protected $table = 'customer_loans';

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'customer_id',
    	'loan_amount',
    	'currency',
    	'loan_duration',
    	'repayment_frequency',
    	'interest_rate',
    	'arrangement_fee',
    	'loan_date',
    	'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }
    public function repayment()
    {
        return $this->hasMany(CustomerRepayment::class, 'customer_loans_id');
    }
}
