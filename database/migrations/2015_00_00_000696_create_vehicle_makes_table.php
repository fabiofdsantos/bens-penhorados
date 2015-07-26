<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehicleMakesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('vehicle_makes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('regex');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_makes');
    }
}
