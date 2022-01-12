<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_payrolls', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('sr_no');
            $table->string('payroll_id');
            $table->integer('type');
            $table->integer('owner_id');
            $table->string('owner_type');
            $table->string('month');
            $table->integer('year');
            $table->double('net_salary');
            $table->integer('status');
            $table->double('basic_salary');
            $table->double('allowance');
            $table->double('deductions');
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
        Schema::drop('employee_payrolls');
    }
}
