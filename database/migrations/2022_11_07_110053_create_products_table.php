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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->decimal('price')->nullable();
            $table->string('price_by')->nullable();
            $table->longText('description');
            $table->unsignedBigInteger('collection_id');
            $table->unsignedBigInteger('replacement_cycle_id');
            $table->unsignedBigInteger('tone_id');
            $table->unsignedBigInteger('style_id');
            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade'); 
            $table->foreign('replacement_cycle_id')->references('id')->on('replacement_cycles')->onDelete('cascade'); 
            $table->foreign('tone_id')->references('id')->on('tones')->onDelete('cascade'); 
            $table->foreign('style_id')->references('id')->on('styles')->onDelete('cascade'); 
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
};
