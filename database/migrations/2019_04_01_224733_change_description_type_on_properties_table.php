<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDescriptionTypeOnPropertiesTable extends Migration
{

    public function up()
    {
        Schema::table('properties', function(Blueprint $table) {
            $table->longText('description')->change();
        });
    }

    public function down()
    {
        Schema::table('properties', function(Blueprint $table) {
            $table->string('description')->change();
        });
    }
}
