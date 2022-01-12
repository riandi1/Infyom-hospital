<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('charge_type');
            $table->unsignedInteger('charge_category_id');
            $table->string('code');
            $table->string('standard_charge');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('charge_category_id')->references('id')
                ->on('charge_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('charges');
    }
}
