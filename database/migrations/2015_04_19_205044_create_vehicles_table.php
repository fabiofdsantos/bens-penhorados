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
            $table->integer('tax_office')->unsigned();
            $table->integer('year')->unsigned();
            $table->integer('item_id')->unsigned();
            /*$table->foreign(array('tax_office', 'year', 'item_id'))
            ->references(array('tax_office', 'year', 'item_id'))
            ->on('items');*/

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
