<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('customer_id');
            $table->decimal('loan_amount', 11, 2);
            $table->string('currency', 8)->default('VND');
            $table->integer('loan_duration')->default(12);
            $table->string('repayment_frequency', 20)->default('Monthly');
            $table->integer('interest_rate')->default(0);
            $table->integer('arrangement_fee')->default(0);
            $table->dateTime('loan_date')->nullable();
            $table->string('status', 20)->detault('PENDING');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_loans');
    }
}
