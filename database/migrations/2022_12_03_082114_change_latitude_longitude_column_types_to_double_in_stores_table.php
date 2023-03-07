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
        Schema::table('stores', function (Blueprint $table) {
            if (Schema::hasColumn('stores', 'latitude')) //check the column
            {
                Schema::table('stores', function (Blueprint $table)
                {
                    $table->dropColumn('latitude'); //drop it
                });
            }
            if (Schema::hasColumn('stores', 'longitude')) //check the column
            {
                Schema::table('stores', function (Blueprint $table)
                {
                    $table->dropColumn('longitude'); //drop it
                });
            }

            $table->double('latitude')->default(0);
            $table->double('longitude')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude']);
        });
    }
};
