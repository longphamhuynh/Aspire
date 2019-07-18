<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {
    Route::post('customer/register', 'CustomersController@register')->name('api.v1.customer.create');
    Route::post('customer/login', 'CustomersController@login')->name('api.v1.customer.login');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('loans/create', 'CustomerLoansController@createLoans')->name('api.v1.loans.create');
        Route::post('repayments/create', 'CustomerRepaymentController@createRepayment')->name('api.v1.repayment.create');
    });
});
