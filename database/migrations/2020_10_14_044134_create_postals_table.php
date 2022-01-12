<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postals', function (Blueprint $table) {
            $table->id();
            $table->string('from_title')->nullable();
            $table->string('to_title')->nullable();
            $table->string('reference_no')->nullable();
            $table->date('date')->nullable();
            $table->text('address')->nullable();
            $table->integer('type')->nullable();
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
        Schema::dropIfExists('postals');
    }
}
