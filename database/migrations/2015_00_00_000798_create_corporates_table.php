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
            $table->integer('nif')->unsigned()->primary();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('cae')->nullable();
            $table->string('activity')->nullable();
            $table->string('nature')->nullable();
            $table->decimal('capital')->nullable();
            $table->boolean('is_active')->nullable();
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
