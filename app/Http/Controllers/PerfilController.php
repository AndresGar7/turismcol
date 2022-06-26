<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatePerfilRequest;

class PerfilController extends Controller
{
    
    public function admin(){

        if(Auth::check()){

            $usuario = User::where('email','=',auth()->user()->email)->first();
            
            $valida_cliente = Cliente::where('email','=',$usuario->email)->count();
        
            if($valida_cliente > 0){
                $cliente = Cliente::where('email','=',auth()->user()->email)->first();
                $funcion = 'perfil.update';
            }else{
                $cliente = 0;
                $funcion = 'perfil.store';
            }
        
            return view('perfil.admin', compact('usuario','cliente','funcion'));

        }else{
            return redirect()->route('login');
        }

        
    }
    
    public function store(CreatePerfilRequest $request){

        if($request->usuario){
            $usuario = trim($request->usuario);
        }else{
            $usuario = null;
        }
        $nombre = $request->nombre;
        $email = $request->email;
        $ciudad = $request->ciudad;
        $pais = $request->pais;
        $telefono = $request->telefono;
        $direccion = $request->direccion;
        $cod_postal = trim($request->cod_postal);
        $sexo = $request->sexo;

        if(request()->file('imagen')){
            $imagen = request()->file('imagen')->store('public/img/perfiles');
            $name_img = str_replace('public/img/perfiles/','', $imagen);
            $ext_img= substr($name_img, -4);
            $name_img = str_replace($ext_img ,'', $name_img);
            $url_imagen = str_replace('public','storage',$imagen) ;
        }else{
            $imagen = null;
            $name_img = null;
            $ext_img = null;
            $url_imagen = null;
        }
        
        Cliente::create([
            'usuario' => $usuario,
            'nombre' => $nombre,
            'email' => $email,
            'direccion' => $direccion,
            'ciudad' => $ciudad,
            'telefono' => $telefono,
            'pais' => $pais,
            'direccion' => $direccion,
            'cod_postal' => $cod_postal,
            'sexo' => $sexo,
            'url_img' => $url_imagen,
            'name_img' => $name_img
        ]);

        //!-----------------------------------------------------------------------------
        // Esto se utiliza para optimizar el tamaño de las imagenes que se van a mostrar de las noticias.
        $image = Image::make(Storage::get($imagen))
        ->resize(600, 500)
        ->encode();

        Storage::put($imagen, (string) $image);

        //!-----------------------------------------------------------------------------

        return redirect()->route('perfil.admin');
    }

    public function update(Cliente $usuario, CreatePerfilRequest $request){

        // return $request->telefono;

        $usuarioo = str_replace(' ','_',$request->usuario);

        if(request()->file('imagen')){
            //Primero eliminamos la imagen gurdada dentro del servidor para poder cambiarla por la nueva
            $img_publica = str_replace('storage','public',$usuario->url_img);
            Storage::delete($img_publica);

            //Se guarda la nueva imagen en la carpeta del servidor
            $imagen = request()->file('imagen')->store('public/img/perfiles');

            $name_img = str_replace('public/img/noticias/','', $imagen);
            $ext_img= substr($name_img, -4);
            $name_img = str_replace($ext_img ,'', $name_img);
            
            $url_imagen = str_replace('public','storage',$imagen);
            
            $usuario->update([
                'usuario' => $usuarioo,
                'nombre' => $request->nombre,
                'direccion' => $request->direccion,
                'cod_postal' => $request->cod_postal,
                'ciudad' => $request->ciudad,
                'telefono' => $request->telefono,
                'pais' => $request->pais,
                'url_img' => $url_imagen,
                'name_img' => $name_img,
                'sexo' => $request->sexo
            ]);
    
            //!-----------------------------------------------------------------------------
            // Esto se utiliza para optimizar el tamaño de las imagenes que se van a mostrar de las noticias.
            $image = Image::make(Storage::get($imagen))
                ->resize(600, 500)
                ->encode();
    
            Storage::put($imagen, (string) $image);
            //!-----------------------------------------------------------------------------
    
            
        }else{
            $usuario->update([
                'usuario' => $usuarioo,
                'nombre' => $request->nombre,
                'direccion' => $request->direccion,
                'cod_postal' => $request->cod_postal,
                'ciudad' => $request->ciudad,
                'telefono' => $request->telefono,
                'pais' => $request->pais,
                'sexo' => $request->sexo
            ]);
        }
        
        
        return redirect()->route('perfil.admin', $usuario);

    }

}
