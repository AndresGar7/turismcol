<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Funcion para cargar la imagen de perfil cuando el usuario se loguea, se debe de cambiar el nombre de la imagen en la DB
    public function adminlte_image(){
        return asset($this->cliente->url_img);
    }
    // Funcion que se encargar de mostrar el Rol del usuario que se encuentra logueado, se debe de traer de la DB y no pintar
    public function adminlte_desc()
    {      
        switch ($this->cliente->rango) {
            case 'adm':
                $rango = "Administrador";
                break;
            case 'sop':
                $rango = "Soporte";
                break;
            case 'cli':
                $rango = "Usuario";
                break;
        }

        return $rango;
    }

    // Funcion que se encarga de mostrar un boton de Profile al lado del Logout
    public function adminlte_profile_url()
    {
        return 'perfil/admin';
    }
    
    // Funcion encargada de relacionar la tabla del  cliente con la de usuario con el campo email
    public function cliente (){
        return $this->hasOne(Cliente::class, 'email','email');
    }
}
