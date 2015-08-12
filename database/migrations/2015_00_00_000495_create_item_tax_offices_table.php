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

class CreateItemTaxOfficesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('item_tax_offices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->null();
            $table->string('code');

            $table->integer('municipality_id')->unsigned();
            $table->foreign('municipality_id')->references('id')->on('pt_municipalities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('item_tax_offices');
    }
}
