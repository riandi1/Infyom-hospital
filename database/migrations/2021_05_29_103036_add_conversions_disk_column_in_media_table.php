<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConversionsDiskColumnInMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->string('conversions_disk')->nullable();
            $table->uuid('uuid')->nullable()->unique();
            $table->json('generated_conversions');

            $table->json('manipulations')->change();
            $table->json('custom_properties')->change();
            $table->json('responsive_images')->change();
        });
        DB::table('media')->update([
            'conversions_disk' => DB::raw('`disk`'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropColumn('conversions_disk');
        });
    }
}
