<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name', 50);
            $table->string('email', 100)->unique();
            $table->string('password', 128);
            $table->text('fulladdress', 100)->nullable();
            $table->string('phone', 11)->unique();
            $table->string('passport', 20)->unique();
            $table->enum('bad_debt', [0, 1])->detault(1);
            $table->enum('status', [0, 1])->detault(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
