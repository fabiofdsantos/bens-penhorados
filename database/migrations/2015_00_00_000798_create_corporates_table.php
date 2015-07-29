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

class CreateCorporatesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('corporates', function (Blueprint $table) {
            $table->integer('nif')->primary();
            $table->string('name');
            $table->string('address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('cae');
            $table->string('activity');
            $table->string('nature');
            $table->decimal('capital');
            $table->capital_currency('EUR');
            $table->boolean('is_active');
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->string('website')->nullable();
            $table->integer('fax')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('corporates');
    }
}
