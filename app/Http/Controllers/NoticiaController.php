<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProjectRequest;

class NoticiaController extends Controller
{
    
    // SE ENCARGA DE MOSTRAR LAS NOTICIAS EN LA PARTE PRINCIPAL DE LA PAGINA
    public function index()
    {   

        $noticias = Noticia::orderBy('created_at','DESC')->paginate(2);
        
        return view('noticias.index', compact('noticias'));
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

        $titulo = trim(request('titulo'));
        $url = str_replace(' ','-',$titulo);
        $descripcion = trim(request('descripcion'));
        $resumen = substr($descripcion, 0, 70);

        $imagen = request()->file('imagen')->store('public/img/noticias');

        $url_imagen = str_replace('public','storage',$imagen) ;
        
        Noticia::create([

            'title' => $titulo,
            'url' => $url,
            
            'resumen' => $resumen,
            'description' => $descripcion,
            'url_img' => $url_imagen

        ]);

        // var_dump(request()->file('imagen')->store('public/img/noticias'));

        return redirect()->route('noticias.admin');

    }


    // SE ENCARGA DE MOSTRAR LA VISTA PARA EDITAR LA NOTICIA
    public function edit(Noticia $noticia)
    {

        return view('noticias.edit', [

            'noticia' => $noticia

        ]);

    }


    // SE ENCARGA DE ACTUALIZAR LOS DATOS DE LA NOTICIA EN LA BBDD
    public function update(Noticia $noticia){


        request()->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image'
        ],
        [
            'titulo.required' => 'El campo del titulo es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'imagen.required' => 'La noticia debe de contener una imagen',
            'imagen.image' => 'El archivo debe de ser JPG o PNG'
        ]);

        $titulo = trim(request('titulo'));
        $url = str_replace(' ','-',$titulo);
        $descripcion = trim(request('descripcion')) ;
        $resumen = substr($descripcion, 0, 70);

        

        $imagen = request()->file('imagen')->store('public/img/noticias');

        $url_imagen = str_replace('public','storage',$imagen);

        // $noticia->update(array_filter(request()->validate()));
        
        $noticia->update([
            'title' => $titulo,
            'url' => $url,
            'description' => $descripcion,
            'resumen' => $resumen,
            'url_img' => $url_imagen
        ]);

        return redirect()->route('noticias.showAdmin', $noticia);

    }

    public function destroy(Noticia $noticia)
    {
        $noticia->delete();

        return redirect()->route('noticias.admin', $noticia);   
    }
}
