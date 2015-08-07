<?php

/*
 * This file is part of Bens Penhorados, an undergraduate capstone project.
 *
 * (c) Fábio Santos <ffsantos92@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePtMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pt_municipalities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('regex');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('pt_districts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('pt_municipalities');
    }
}
