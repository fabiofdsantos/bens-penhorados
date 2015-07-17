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
            $table->string('code');
            $table->foreign('code')->references('code')->on('items');
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->integer('year')->nullable();
            $table->integer('engine_displacement')->nullable();
            $table->enum('type', ['Car', 'Truck', 'Motorcycle', 'Boat', 'Other'])->nullable();
            $table->enum('fuel', ['Gasoline', 'Diesel', 'Hybrid', 'Electric', 'Alternative'])->nullable();
            $table->integer('color_id')->nullable();
            //$table->foreign('color_id')->references('id')->on('vehicles_colors');
            $table->boolean('isGoodCondition')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('vehicles');
    }
}
