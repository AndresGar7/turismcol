<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_data', function (Blueprint $table) {
            $table->id('idUser');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->date('fec_nac');
            $table->string('direccion')->nullable();
            $table->string('cod_postal')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('pais')->nullable();
            $table->string('url_img')->nullable();
            $table->string('name_img')->nullable();
            $table->enum('sexo',['N','F','M']);   
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
        Schema::dropIfExists('clientes');
    }
}
