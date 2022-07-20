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
        $masDatos = Cliente::where('email','=', auth()->user()->email)->first();
        
        return view('home', compact('usuario','masDatos'));
    }

    public function index()
    {
        return view('welcome');
    }
}
