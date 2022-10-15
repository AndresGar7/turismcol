<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->increments('idNoticia');
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('idUser')->on('users_data');
            $table->string('titulo')->unique();
            $table->string('url')->unique();
            $table->string('url_img');
            $table->string('name_img');
            $table->string('imagen');
            $table->string('resumen');
            $table->text('texto');
            $table->enum('importancia',['sec','pri']);
            $table->date('fecha');
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
        Schema::dropIfExists('noticias');
    }
}
