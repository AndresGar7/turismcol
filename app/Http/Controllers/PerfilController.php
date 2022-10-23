<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatePerfilRequest;
use App\Http\Requests\PasswordPerfilRequest;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin(){

        if(Auth::check()){

            $usuario = User::where('email','=',auth()->user()->email)->first();
            $valida_cliente = Cliente::where('email','=',$usuario->email)->count();
            
            if($valida_cliente > 0){
                $cliente = Cliente::where('email','=',auth()->user()->email)
                ->first();
            }else{
                $cliente = 0;
                // $funcion = 'perfil.store';
            }
            $funcion = 'perfil.update';

            // dd($cliente);
        
            return view('perfil.admin', compact('usuario','cliente','funcion'));

        }else{
            return redirect()->route('login');
        }

        
    }
    
    public function store(){    
    }

    public function update(Cliente $usuario, CreatePerfilRequest $request){

        // $usuarioo = str_replace(' ','_',$request->usuario);

        if(request()->file('imagen')){

            //Primero eliminamos la imagen gurdada dentro del servidor para poder cambiarla por la nueva
            if($usuario->url_img == 'storage/img/perfiles/sin_imagen.jpg'){
                
                //Se guarda la nueva imagen en la carpeta del servidor
                $imagen = request()->file('imagen')->store('public/img/perfiles');
                // dd(request()->file('imagen')->store('public/img/perfiles'));
                $name_img = str_replace('public/img/perfiles/','', $imagen);
                $ext_img= substr($name_img, -4);
                $name_img = str_replace($ext_img ,'', $name_img);            
                
                $url_imagen = str_replace('public','storage',$imagen);

                $usuario->update([
                    'nombre' => $request->nombre,
                    'apellidos' => $request->apellidos,
                    'direccion' => $request->direccion,
                    'cod_postal' => $request->cod_postal,
                    'ciudad' => $request->ciudad,
                    'telefono' => $request->telefono,
                    'pais' => $request->pais,
                    'url_img' => $url_imagen,
                    'fec_nac' => $request->fec_nacimiento,
                    'name_img' => $name_img,
                    'sexo' => $request->sexo
                ]);
                //!-----------------------------------------------------------------------------
                // Esto se utiliza para optimizar el tamaño de las imagenes que se van a mostrar de las noticias.
                $image = Image::make(Storage::get($imagen))
                    ->resize(600, 550)
                    ->encode();
        
                Storage::put($imagen, (string) $image);
                //!-----------------------------------------------------------------------------
                // $img_publica = str_replace('storage','public',$usuario->url_img);
                // dd($usuario->url_img);
            }else{
                $img_publica = str_replace('storage','public',$usuario->url_img);
                Storage::delete($img_publica);

                //Se guarda la nueva imagen en la carpeta del servidor
                $imagen = request()->file('imagen')->store('public/img/perfiles');
                // dd(request()->file('imagen')->store('public/img/perfiles'));
                $name_img = str_replace('public/img/perfiles/','', $imagen);
                $ext_img= substr($name_img, -4);
                $name_img = str_replace($ext_img ,'', $name_img);            
                
                $url_imagen = str_replace('public','storage',$imagen);

                $usuario->update([
                    'nombre' => $request->nombre,
                    'apellidos' => $request->apellidos,
                    'direccion' => $request->direccion,
                    'cod_postal' => $request->cod_postal,
                    'ciudad' => $request->ciudad,
                    'telefono' => $request->telefono,
                    'pais' => $request->pais,
                    'url_img' => $url_imagen,
                    'name_img' => $name_img,
                    'sexo' => $request->sexo,
                    'fec_nac' => $request->fec_nacimiento
                ]);
                //!-----------------------------------------------------------------------------
                // Esto se utiliza para optimizar el tamaño de las imagenes que se van a mostrar de las noticias.
                $image = Image::make(Storage::get($imagen))
                    ->resize(600, 550)
                    ->encode();
        
                Storage::put($imagen, (string) $image);
                //!-----------------------------------------------------------------------------
            }

        }else{

            // var_dump($request);
            $usuario->update([
                'nombre' => $request->nombre,
                'apellidos' => $request->apellidos,
                'direccion' => $request->direccion,
                'cod_postal' => $request->cod_postal,
                'ciudad' => $request->ciudad,
                'telefono' => $request->telefono,
                'pais' => $request->pais,
                'sexo' => $request->sexo,
                'fec_nac' => $request->fec_nacimiento,
            ]);
        }
        
        
        return redirect()->route('perfil.admin', $usuario)->with('actualizoPerfil', 'ok');

    }

    public function changePassword(User $usuario){

        $paso = 0;

        if(Auth::check()){

        $usuario = Cliente::where('email','=',auth()->user()->email)->first();
        return view('perfil.password', compact('usuario','paso'));

        }else{
            return redirect()->route('login');
        }

    }

    public function updaPassword(User $usuario,PasswordPerfilRequest $request){

        $usuario->update([
            'password' => Hash::make($request['password_new'])
        ]);

        // dd($usuario);

        $usuario = Cliente::where('email','=',auth()->user()->email)->first();  

        return redirect()->route('perfil.changePassword')->with('actualizo', 'ok');
    }

}
