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

class CreateCorporateShareTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('corporate_share', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('corporate_nif')->unsigned()->nullable();
            $table->foreign('corporate_nif')->references('nif')->on('corporates');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('corporate_share');
    }
}
