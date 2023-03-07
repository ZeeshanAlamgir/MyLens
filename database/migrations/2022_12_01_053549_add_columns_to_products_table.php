<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->json('lens_material')->nullable();
            $table->string('base_curve')->nullable();
            $table->string('diameter')->nullable();
            $table->string('oxygen_permeability')->nullable();
            $table->string('center_thickness')->nullable();
            $table->string('power')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('lens_material');
            $table->dropColumn('base_curve');
            $table->dropColumn('diameter');
            $table->dropColumn('oxygen_permeability');
            $table->dropColumn('center_thickness');
            $table->dropColumn('power');
        });
    }
};
