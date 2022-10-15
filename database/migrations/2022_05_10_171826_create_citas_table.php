<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('idCita');
            $table->unsignedBigInteger('idUser');
            $table->string('titulo');
            $table->foreign('idUser')->references('idUser')->on('users_data');
            $table->date('fecha_cita');
            $table->string('motivo_cita');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('color');
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
        Schema::dropIfExists('citas');
    }
}
