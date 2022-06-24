<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
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
        $actualizado = Cliente::where('email','=', auth()->user()->email)->first();
        
        return view('home', compact('actualizado'));
    }

    public function index()
    {
        return view('welcome');
    }
}
