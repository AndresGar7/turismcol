<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUsuarioRequest;

class UsuarioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function admin(){

        $usuarios = DB::table('users_login')
        ->join('users_data', 'users_login.idUser', '=', 'users_data.idUser')
        ->select('users_login.*', 'users_data.nombre', 'users_data.apellidos')
        ->get();

        return view('usuarios.admin', compact('usuarios'));
    }

    public function create(){
        // return 'hola mundo';
        return view('usuarios.create');
    }

    public function store(CreateUsuarioRequest $request){

        $cliente = Cliente::create([
            'nombre' => $request['nombre'],
            'apellidos' => $request['apellidos'],
            'email' => $request['email'],
            'telefono' => $request['telefono'],
            'fec_nac' => '0001-01-01',
            'url_img' => 'storage/img/perfiles/sin_imagen.jpg'
        ]);

        $usuario = User::create([
            'name' => $request['name'],
            'idUser' => $cliente->idUser,
            'email' => $request['email'],
            'usuario' => $request['email'],
            'rol' => $request['rol'],
            'password' => Hash::make($request['password_new']),
        ]);

        return redirect()->route('usuarios.create')->with('realizado', 'ok');
    }

    public function show(User $usuario){

        $usuario = DB::table('users_login')
        ->join('users_data', 'users_login.idUser', '=', 'users_data.idUser')
        ->select('users_login.*', 'users_data.*')
        ->where('users_data.idUser', '=', $usuario->idUser)
        ->first();

        return view('usuarios.show', compact('usuario'));
    }

}
