<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreatePerfilRequest;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    
    public function admin(){

        $usuario = User::where('email','=',auth()->user()->email)->get();
        
        $cliente = Cliente::where('email','=',auth()->user()->email)->count();

        if($cliente > 0){
            $cliente = Cliente::where('email','=',auth()->user()->email)->first();
            $funcion = 'perfil.update';
        }else{
            $funcion = 'perfil.store';
        }

        return view('perfil.admin', compact('usuario','cliente','funcion'));

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


            return $request ;

    }

}
