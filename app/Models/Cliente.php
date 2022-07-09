<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'users_data';
    protected $primaryKey = 'idUser';
    

    // MANERA DE PASAR AL MODELO DE LA TABLA QUE VALORES QUIERE QUE SE GUARDEN EN LA DB -> FORMA MANUAL

    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'url_img',
        'name_img',
        'rol',
        'fec_nac',
        'sexo',
        'direccion',
        'telefono',
        'ciudad',
        'cod_postal',
        'pais'
    ];
}
