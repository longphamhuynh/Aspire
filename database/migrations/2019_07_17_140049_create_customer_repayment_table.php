<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerRepaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_repayment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('customer_loans_id');
            $table->decimal('repayment_amount', 11, 2);
            $table->string('repayment_method', 64)->default('MB')->comment('MB:Mobile Banking', 'MMP: MOMOPAY', 'VNP: VNPAY');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('customer_loans_id')->references('id')->on('customer_loans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_repayment');
    }
}
