<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRawDataTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('raw_data', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->string('hash')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('category_id')->references('id')->on('raw_data_categories')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('raw_data');
    }
}
