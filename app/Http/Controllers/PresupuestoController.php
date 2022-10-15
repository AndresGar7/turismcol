<?php

namespace App\Http\Controllers;

use App\Models\Presupuesto;
use Illuminate\Http\Request;
use App\Http\Requests\ValidatedPresupuestoRequest;

class PresupuestoController extends Controller
{
    // Funcion encargada de mostrar la vista Presupuesto
    public function index()
    {
        return view('presupuesto.index');
    }

    // Funcion encargada de procesar el formulario de Presupuesto
    public function sendMail(ValidatedPresupuestoRequest $request)
    {   

        Presupuesto::create([
            'nombre' => $request['nombre'],
            'apellidos' => $request['apellido'],
            'email' => $request['email'],
            'telefono' => $request['telefono'],
            'descripcion' => $request['concepto']
        ]);

        return redirect()->route('presupuesto.index')->with('sendMail', 'ok');
    }
}
