<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePerfilRequest;

class PerfilController extends Controller
{
    
    public function admin(){

        $usuario = User::where('email','=',auth()->user()->email)->get();

        return view('perfil.admin', compact('usuario'));

    }

    public function store(CreatePerfilRequest $request){
        return $request->nombre;

        return view('Hola Mundo');
        
    }
}
