<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Intervention\Image\Facades\Image;

class NoticiaController extends Controller
{
    
    // SE ENCARGA DE MOSTRAR LAS NOTICIAS EN LA PARTE PRINCIPAL DE LA PAGINA
    public function index()
    {   
        $noticiasPri =  Noticia::where('importancia','=','pri')->get();
        $noticias = Noticia::where('importancia','sec')->simplePaginate(6);
        
        return view('noticias.index', compact(['noticias','noticiasPri']));
    }

    // SI SE ESCOGE ALGUNA NOTICIA MUESTRA LA INFORMACION EN UNA PAGINA NUEVA DE LA PAGINA PRINCIPAL
    public function show(Noticia $noticia)
    {

        // $noticia = Noticia::findOrFail($id); // FINDORFAIL --> SE ENCARGA DE TRAER EL ARCHIVO CON EL QUE TIENE EL NOMBRE LA VARIABLE AL IGUAL QUE EN LA DB

        return view('noticias.show', [

            'noticia' => $noticia

        ]);

    }

    // SE ENCARGA DE MOSTRAR LAS NOTICIAS EN LA PAGINA DE ADMINISTRACION
    public function admin()
    {   

        $noticias = Noticia::orderBy('created_at','DESC')->paginate();
        
        return view('noticias.admin', compact('noticias'));
    }


    // SE ENCARGA DE MOSTRAR LA NOTICIA SELECCIONADA EN LA PAGINA DE ADMINISTRACION
    public function showAdmin(Noticia $noticia)
    {

        // $noticia = Noticia::findOrFail($id); // FINDORFAIL --> SE ENCARGA DE TRAER EL ARCHIVO CON EL QUE TIENE EL NOMBRE LA VARIABLE AL IGUAL QUE EN LA DB

        return view('noticias.showAdmin', [

            'noticia' => $noticia

        ]);

    }

    // SE ENCARGA DE MOSTRAR LA PAGINA PARA CREAR LAS NOTICIAS
    public function create()
    {

        return view('noticias.create');

    }

    // SE ENCARGA DE CREAR LAS NUEVAS NOTICIAS Y GUARDARLAS EN LA BBDD
    public function store(CreateProjectRequest $request)
    {

        // Esta parte se encarga de validar los campos del formulario para subir una nueva noticia

        // return request()->file('imagen')->store('');
        
        // request()->validate(
        // [
        //     'titulo.required' => 'El campo del titulo es obligatorio',
        //     'descripcion.required' => 'El campo descripcion es obligatorio',
        //     'descripcion.min' => 'Debe ingresar como minimo 70 caracteres acerca de la noticia' ,
        //     'imagen.required' => 'La noticia debe de contener una imagen',
        //     'imagen.image' => 'El archivo debe de ser JPG o PNG'
        // ]);

        $titulo = trim(request('titulo')); // QUITA LOS ESPACIOS DE UNA CADENA DE TEXTO
        $url = str_replace(' ','-',$titulo);
        $descripcion = trim(request('descripcion'));
        $resumen = substr($descripcion, 0, 70);

        $imagen = request()->file('imagen')->store('public/img/noticias');

        // $name_img = $request->file('imagen')->store('public/img/noticias');
        $name_img = str_replace('public/img/noticias/','', $imagen);
        $ext_img= substr($name_img, -4);
        $name_img = str_replace($ext_img ,'', $name_img);

        $url_imagen = str_replace('public','storage',$imagen) ;
        
        Noticia::create([

            'title' => $titulo,
            'url' => $url,
            'resumen' => $resumen,
            'description' => $descripcion,
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

        // var_dump(request()->file('imagen')->store('public/img/noticias'));

        return redirect()->route('noticias.admin');

    }


    // SE ENCARGA DE MOSTRAR LA VISTA PARA EDITAR LA NOTICIA
    public function edit(Noticia $noticia)
    {   

        $cantidad = Noticia::where('importancia','=', 'pri')->count();

        return view('noticias.edit', [

            'noticia' => $noticia,
            'cantidad' => $cantidad,

        ]);

    }


    // SE ENCARGA DE ACTUALIZAR LOS DATOS DE LA NOTICIA EN LA BBDD
    public function update(Noticia $noticia, UpdateProjectRequest $request){

        $titulo = trim(request('titulo'));
        $url = str_replace(' ','-',$titulo);
        $descripcion = trim(request('descripcion')) ;
        $resumen = substr($descripcion, 0, 70);

        

        if(request()->file('imagen')){

            $img_publica = str_replace('storage','public',$noticia->url_img);
            Storage::delete($img_publica);
            
            
            $imagen = request()->file('imagen')->store('public/img/noticias');

            // $name_img = $request->file('imagen')->store('public/img/noticias');
            $name_img = str_replace('public/img/noticias/','', $imagen);
            $ext_img= substr($name_img, -4);
            $name_img = str_replace($ext_img ,'', $name_img);
            
            $url_imagen = str_replace('public','storage',$imagen);
            // return [$noticia->url_img, $url_imagen = str_replace('public','storage',$imagen)];
            $noticia->update([
                'title' => $titulo,
                'url' => $url,
                'description' => $descripcion,
                'resumen' => $resumen,
                'url_img' => $url_imagen,
                'name_img' => $name_img,
                'importancia' => $request->importancia
            ]);

             //!-----------------------------------------------------------------------------
            // Esto se utiliza para optimizar el tamaño de las imagenes que se van a mostrar de las noticias.
            $image = Image::make(Storage::get($imagen))
                ->resize(600, 500)
                ->encode();
    
            Storage::put($imagen, (string) $image);
             //!-----------------------------------------------------------------------------

        }else{


            $noticia->update([
                'title' => $titulo,
                'url' => $url,
                'description' => $descripcion,
                'resumen' => $resumen,
                'importancia' => $request->importancia
            ]);
        }


        return redirect()->route('noticias.showAdmin', $noticia);

    }

    public function destroy(Noticia $noticia)
    {
        $img_publica = str_replace('storage','public',$noticia->url_img);
        Storage::delete($img_publica);
        $noticia->delete();

        return redirect()->route('noticias.admin', $noticia);   
    }
}
