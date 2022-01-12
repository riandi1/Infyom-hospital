<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_donations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('blood_donor_id');
            $table->integer('bags')->default(1);
            $table->timestamps();

            $table->foreign('blood_donor_id')->references('id')->on('blood_donors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_donations');
    }
}
