<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatePerfilRequest;

class PerfilController extends Controller
{
    
    public function admin(){

        $usuario = User::where('email','=',auth()->user()->email)->get();
        
        $cliente = Cliente::where('email','=',auth()->user()->email)->count();

        if($cliente > 0){
            $cliente = Cliente::where('email','=',auth()->user()->email)->first();
        }

        return view('perfil.admin', compact('usuario','cliente'));

    }

    public function store(CreatePerfilRequest $request){
        // return $request->nombre;


    }
}
