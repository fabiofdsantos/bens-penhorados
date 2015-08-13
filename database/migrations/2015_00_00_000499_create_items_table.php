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

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->string('code')->primary();

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('item_categories');

            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('item_statuses');

            $table->integer('purchase_type_id')->unsigned();
            $table->foreign('purchase_type_id')->references('id')->on('item_purchase_types');

            $table->integer('tax_office_id')->unsigned();
            $table->foreign('tax_office_id')->references('id')->on('item_tax_offices');

            $table->integer('district_id')->unsigned()->nullable();
            $table->foreign('district_id')->references('id')->on('pt_districts');

            $table->integer('municipality_id')->unsigned()->nullable();
            $table->foreign('municipality_id')->references('id')->on('pt_municipalities');

            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('year');
            $table->decimal('price', 15, 2)->nullable();
            $table->integer('vat')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->text('images')->nullable();
            $table->text('full_description');
            $table->string('depositary_name')->nullable();
            $table->integer('depositary_phone')->nullable();
            $table->string('depositary_email')->nullable();
            $table->string('mediator_name')->nullable();
            $table->integer('mediator_phone')->nullable();
            $table->string('mediator_email')->nullable();
            $table->dateTime('preview_dt_start')->nullable();
            $table->dateTime('preview_dt_end')->nullable();
            $table->dateTime('acceptance_dt');
            $table->dateTime('opening_dt')->nullable();

            $table->integer('itemable_id')->unsigned();
            $table->string('itemable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
