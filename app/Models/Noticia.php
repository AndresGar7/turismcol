<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $table = 'noticias';
    protected $primaryKey = 'idNoticia';

    // MANERA DE PASAR AL MODELO DE LA TABLA QUE VALORES QUIERE QUE SE GUARDEN EN LA DB -> FORMA MANUAL

    protected $fillable = [
        'titulo',
        'resumen',
        'texto',
        'url',
        'url_img',
        'name_img',
        'fecha',
        'imagen',
        'importancia',
        'idUser'
    ];
    
    // MANERA DE PASAR Y ACEPTAR TODOS LAS VARIABLES QUE PASA EL CONTROLADOR PARA GUARDAR EN LA DB
    // protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'url';
    }

    
}
