<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    // MANERA DE PASAR AL MODELO DE LA TABLA QUE VALORES QUIERE QUE SE GUARDEN EN LA DB -> FORMA MANUAL

    protected $fillable = [
        'nombre',
        'usuario',
        'email',
        'url_img',
        'name_img',
        'rango',
        'sexo',
        'nombre',
        'direccion',
        'ciudad',
        'cod_postal',
        'pais'
    ];
}
