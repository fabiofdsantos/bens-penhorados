<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('import', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status', ['Agendada', 'Em execução', 'Com falhas', 'Concluída']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('import');
    }
}
