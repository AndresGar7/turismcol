<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {   
        $usuario = User::where('email','=', auth()->user()->email)->first();
        $masDatos = Cliente::where('email','=', auth()->user()->email)->get();
        $contador = false;

        foreach ($masDatos as $datos) {
            if ( $datos->sexo == 'N' || $datos->direccion == NULL || $datos->cod_postal == NULL || $datos->ciudad == NULL || $datos->pais == NULL) {
                $contador = true;
            }
        }
        
        $masDatos[0]['contador'] = $contador;

        
    
        // return compact('usuario','masDatos');
        
        return view('home', compact('usuario','masDatos'));
    }

    public function index()
    {
        return view('welcome');
    }
}
