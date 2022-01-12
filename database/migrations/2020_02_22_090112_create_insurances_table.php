<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('service_tax');
            $table->double('discount')->nullable();
            $table->text('remark')->nullable();
            $table->string('insurance_no');
            $table->string('insurance_code');
            $table->double('hospital_rate');
            $table->double('total');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::drop('insurances');
    }
}
