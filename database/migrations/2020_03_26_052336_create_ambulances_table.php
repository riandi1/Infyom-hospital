<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAmbulancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambulances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vehicle_number');
            $table->string('vehicle_model');
            $table->string('year_made');
            $table->string('driver_name');
            $table->string('driver_license');
            $table->string('driver_contact');
            $table->string('note')->nullable();
            $table->boolean('is_available')->default(1);
            $table->integer('vehicle_type')->default(1);
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
        Schema::drop('ambulances');
    }
}
