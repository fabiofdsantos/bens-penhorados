<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesModelsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vehicles_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('regex');

            $table->integer('make_id')->unsigned();
            $table->foreign('make_id')->references('id')->on('vehicles_makes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('vehicles_models');
    }
}
