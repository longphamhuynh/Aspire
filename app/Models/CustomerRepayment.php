<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerRepayment extends Model
{
	protected $table    = 'customer_repayment';
	protected $fillable = ['customer_id', 'customer_loans_id', 'repayment_amount', 'repayment_method','paid_at'];
	public $timestamps = false;
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loans()
    {
        return $this->belongsTo(CustomerLoans::class, 'customer_loans_id');
    }
}
