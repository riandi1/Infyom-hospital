<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvancedPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advanced_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('patient_id');
            $table->string('receipt_no');
            $table->double('amount');
            $table->date('date');
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advanced_payments');
    }
}
