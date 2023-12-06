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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->intger('region');
            $table->intger('unit_no');
            $table->intger('bulding_no');
            $table->intger('land_space');
            $table->intger('bua');
            $table->intger('price');
            $table->intger('meter_price');
            $table->string('owner');
            $table->intger('owner_mobile');
            $table->intger('category');
            $table->intger('unit_type');
            $table->intger('bedrooms');
            $table->intger('bathrooms');
            $table->intger('floor');
            $table->intger('department');
            $table->intger('finishing');
            $table->intger('view');
            $table->intger('phase');
            $table->intger('lift');
            $table->intger('payment_method');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('primary_resale');
            $table->intger('unit_code');
            $table->text('description_en');
            $table->text('description_ar');
            $table->text('video');
            $table->string('pdf');
            $table->text('map');
            $table->integer('created_by');
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
        Schema::dropIfExists('properties');
    }
};
