<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class NoticiaController extends Controller
{   
    
    public function __construct()
    {
        //nombre middleware   protege unicamente los metodos que esten een el arreglo
        $this->middleware('is_authorized:sop,admin', ['only' => ['create']]);
        $this->middleware('is_authorized:sop,admin', ['only' => ['admin']]);
        $this->middleware('is_authorized:sop,admin', ['only' => ['showAdmin']]);
        $this->middleware('is_authorized:sop,admin', ['only' => ['show']]);
        $this->middleware('is_authorized:sop,admin', ['only' => ['edit']]);
    }

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
        $usuario = User::where('idUser', '=', $noticia->idUser)->first();

        return view('noticias.showAdmin', [

            'noticia' => $noticia,
            'usuario' => $usuario

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

        $titulo = trim(request('titulo')); // QUITA LOS ESPACIOS DE UNA CADENA DE TEXTO
        $url = str_replace(' ','-',$titulo);
        $descripcion = trim(request('descripcion'));
        $resumen = substr($descripcion, 0, 70);

        $imagen = request()->file('imagen')->store('public/img/noticias');

        // $name_img = $request->file('imagen')->store('public/img/noticias');
        $name_img = str_replace('public/img/noticias/','', $imagen);
        $ext_img= substr($name_img, -4);
        $name_img = str_replace($ext_img ,'', $name_img);

        $url_imagen = str_replace('public','storage',$imagen);

        $usuario = auth()->user()->idUser;
        $fecha = Carbon::now();
        
        Noticia::create([

            'titulo' => $titulo,
            'url' => $url,
            'resumen' => $resumen,
            'texto' => $descripcion,
            'url_img' => $url_imagen,
            'imagen' => $name_img . '.jpg',
            'name_img' => $name_img ,
            'fecha' => $fecha,
            'idUser' => $usuario

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

            //Primero eliminamos la imagen gurdada dentro del servidor para poder cambiarla por la nueva
            $img_publica = str_replace('storage','public',$noticia->url_img);
            Storage::delete($img_publica);
            
            //Se guarda la nueva imagen en la carpeta del servidor
            $imagen = request()->file('imagen')->store('public/img/noticias');

            // $name_img = $request->file('imagen')->store('public/img/noticias');
            $name_img = str_replace('public/img/noticias/','', $imagen);
            $ext_img= substr($name_img, -4);
            $name_img = str_replace($ext_img ,'', $name_img);
            
            $url_imagen = str_replace('public','storage',$imagen);
            // return [$noticia->url_img, $url_imagen = str_replace('public','storage',$imagen)];
            $noticia->update([
                'titulo' => $titulo,
                'url' => $url,
                'texto' => $descripcion,
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
                'titulo' => $titulo,
                'url' => $url,
                'texto' => $descripcion,
                'resumen' => $resumen,
                'importancia' => $request->importancia
            ]);
        }


        return redirect()->route('noticias.showAdmin', $noticia);

    }

    //SE ENCARGA DE ELIMINAR LAS NOTICIAS CREADAS
    public function destroy(Noticia $noticia)
    {
        $img_publica = str_replace('storage','public',$noticia->url_img);
        Storage::delete($img_publica);
        $noticia->delete();

        return redirect()->route('noticias.admin', $noticia);   
    }
}
