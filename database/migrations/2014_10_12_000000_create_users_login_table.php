<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            // $table->enum('rol',['user','sop','admin']); 
            $table->string('rol');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });


        $cliente = DB::table("users_data")
            ->insert([
                [
                    "nombre" => "Administrador",
                    "apellidos" => "Master",
                    "email" => "admin@admin",
                    "telefono" => "000000000",
                    'fec_nac' => '0001-01-01',
                    'url_img' => 'storage/img/perfiles/sin_imagen.jpg',
                    'created_at' => Now(),
                    'updated_at' => Now()
                ]
            ]);

            DB::table("users_login")
            ->insert([
                'idUser' => $cliente,
                'email' => 'admin@admin',
                'usuario' => 'admin@admin',
                'rol' => 'admin',
                'password' => Hash::make('admin1234'),
                'created_at' => Now(),
                'updated_at' => Now()
            ]);
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
