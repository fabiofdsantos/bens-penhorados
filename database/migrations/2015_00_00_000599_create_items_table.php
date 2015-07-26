<?php

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
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('tax_office');
            $table->integer('year');
            $table->string('status');
            $table->string('mode');
            $table->decimal('price', 15, 2)->nullable();
            $table->integer('vat')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->text('images')->nullable();
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
