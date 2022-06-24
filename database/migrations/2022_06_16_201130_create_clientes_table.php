<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('usuario')->unique()->nullable();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('cod_postal')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('pais')->nullable();
            $table->string('url_img')->nullable();
            $table->string('name_img')->nullable();
            $table->enum('sexo',['N','F','M'])->nullable();  
            $table->enum('rango',['cli','sop','adm']);  
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
