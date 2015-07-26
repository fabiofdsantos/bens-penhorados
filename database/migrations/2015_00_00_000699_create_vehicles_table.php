<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->foreign('code')->references('code')->on('items');

            $table->integer('year')->nullable();
            $table->integer('engine_displacement')->nullable();
            $table->string('reg_plate_code')->nullable();
            $table->boolean('is_good_condition')->nullable();

            $table->integer('make_id')->unsigned()->nullable();
            $table->foreign('make_id')->references('id')->on('vehicle_makes');

            $table->integer('model_id')->unsigned()->nullable();
            $table->foreign('model_id')->references('id')->on('vehicle_models');

            $table->integer('color_id')->unsigned()->nullable();
            $table->foreign('color_id')->references('id')->on('vehicle_colors');

            $table->integer('fuel_id')->unsigned()->nullable();
            $table->foreign('fuel_id')->references('id')->on('vehicle_fuels');

            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('vehicle_categories');

            $table->integer('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('vehicle_types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
