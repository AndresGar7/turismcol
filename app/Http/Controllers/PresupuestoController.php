<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresupuestoController extends Controller
{
    // Funcion encargada de mostrar la vista Presupuesto
    public function index()
    {
        return view('presupuesto.index');
    }

    // Funcion encargada de procesar el formulario de Presupuesto
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required|min:3',
            'apellido' => 'required|min:3',
            'email' => 'required|email',
            'telefono' => 'required|min:9|max:13'
        ], 
        [
            'nombre.min' => 'El nombre debe de contener mas de 2 caracteres.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'apellido.min' => 'El apellido debe de contener mas de 2 caracteres.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'email.email' => 'El email no cumple con las caracteristicas de un correo valido.',
            'email.required' => 'El campo email es obligatorio.',
            'telefono.min' => 'El telefono debe de ser igual o mayor 9 digitos.',
            'telefono.max' => 'El telefono no puede superar los 13 digitos.',
            'telefono.required' => 'El campo de telefono es obligatorio'
        ]);

        return $request;
    }
}
