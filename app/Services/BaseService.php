<?php
namespace App\Services;


abstract class BaseService
{
	
	public function __construct()
	{
		//
	}

	/**
	 * Build resource response
	 * @param object $loans 
	 * @return array
	 */
	public function buildResource($loans)
	{
		if (!$loans) return null;
		$totalInterest            = $loans->loan_amount * (($loans->interest_rate * $loans->loan_duration) / 100);
		$totalPayment             = $loans->loan_amount + $totalInterest + $loans->arrangement_fee;
		$monthlyRepayment         = $totalPayment / $loans->loan_duration;
		$loans->total_interest    = number_format($totalInterest, 2);
		$loans->total_payment     = number_format($totalPayment, 2);
		$loans->monthly_repayment = number_format($monthlyRepayment, 2);
		$loans->customer;
		$loans->repayment;
		return $loans;
	}
}