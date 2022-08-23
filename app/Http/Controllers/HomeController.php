<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cita;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Noticia;
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
    
        if ($usuario->rol == 'admin' || $usuario->rol == 'sop') {
            $noticias = Noticia::count();
            $citas = Cita::count();
            $clientes = User::where('rol','=', 'user')->count();
            $clienUsuario = User::where('rol','=', 'sop')->count();

            return view('home', compact('usuario','masDatos','noticias','citas','clientes','clienUsuario'));
        }else{

            $citasVencidas = Cita::where('fecha_cita', '=<' , 'CURDATE()')->count();
            $citasRealizar = Cita::where('fecha_cita','>', 'CURDATE()')->count();
            $citasHoy = Cita::where('fecha_cita','=', Carbon::now()->format('Y-m-d'))->count();

            // return $masDatos;

            return view('home', compact('usuario','masDatos','citasVencidas','citasRealizar','citasHoy'));
        }
        
    }

    public function index()
    {
        return view('welcome');
    }
}
