<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas';
    protected $primaryKey = 'idCita';

    
    protected $fillable = [
        'idUser',
        'titulo',
        'fecha_cita',
        'motivo_cita',
        'start',
        'end'
    ];

    // public static $rules = [
    //     'title' => 'required',
    //     'descripcion' => 'required',
    //     'start' => 'required',
    //     'end' =>'required'
    // ];

    // public function messages(){

    //     return [
    //         'title.required' => 'El campo titulo es obligatorio'
    //     ];
    // }
}
