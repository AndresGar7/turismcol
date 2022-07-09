<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_login', function (Blueprint $table) {
            $table->id('idLogin');
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('idUser')->on('users_data');
            $table->string('usuario')->unique();
            // $table->string('name');
            // $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('rol',['user','sop','admin'])->default('user'); 
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
