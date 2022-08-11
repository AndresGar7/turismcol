<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:30', 'min:3'],
            'lastName' => ['required', 'string', 'max:50', 'min:3'],
            'phone' => ['required', 'string', 'max:13', 'min:9'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users_login'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.max'      => 'El campo nombre no debe ser mayor que 15 caracteres.',
            'name.min'      => 'El campo nombre no debe ser menor que 3 caracteres.',
            'lastName.required' => 'El campo apellido es obligatorio.',
            'lastName.max'      => 'El campo apellido no debe ser mayor que 50 caracteres.',
            'lastName.min'      => 'El campo apellido no debe ser menor que 3 caracteres.',
            'phone.required' => 'El campo telefono es obligatorio.',
            'phone.max'      => 'El campo telefono no debe ser mayor que 13 numeros.',
            'phone.min'      => 'El campo telefono no debe ser menor que 9 numeros.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email'   => 'El campo email no es un correo valido.',
            'email.unique' => 'El campo email ya se encuentra registrado.',
            'password.required' => 'El campo de contraseña es obligatorio.',
            'password.min' => 'El campo de contraseña debe contener mas de 8 caracteres.',
            'password.confirmed' => 'El campo contraseña no coinciden.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   
        
        // dd($data['lastName']);
        $cliente = Cliente::create([
            'nombre' => $data['name'],
            'apellidos' => $data['lastName'],
            'email' => $data['email'],
            'telefono' => $data['phone'],
            'fec_nac' => '0001-01-01',
            'url_img' => 'storage/img/perfiles/sin_imagen.jpg'
        ]);

        return User::create([
            'name' => $data['name'],
            'idUser' => $cliente->idUser,
            'email' => $data['email'],
            'usuario' => $data['email'],
            'rol' => 'user',
            'password' => Hash::make($data['password']),
        ]);
    }
}
