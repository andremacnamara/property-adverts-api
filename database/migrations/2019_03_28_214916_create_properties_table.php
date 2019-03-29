<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address');
            $table->string('town');
            $table->string('county');
            $table->string('postcode');
            $table->string('eircode');
            $table->string('property_type');
            $table->string('selling_type');
            $table->integer('price');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('size');
            $table->string('building_energy_rating');
            $table->string('description');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
