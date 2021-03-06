<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalasJuntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salas_juntas', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('nombre');
             $table->time('horario_inicial')->nullable();;
             $table->time('horario_final')->nullable();
             $table->boolean('reservado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salas_juntas');
    }
}
