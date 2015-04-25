<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('make');
            $table->string('model');
            $table->integer('vehicle_year');
            $table->enum('type', array('Car', 'Truck', 'Motorcycle', 'Boat', 'Other'));
            $table->enum('fuel', array('Gasoline', 'Diesel', 'Hybrid', 'Electric', 'Alternative'))->nullable();
            $table->string('colours')->nullable();
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
