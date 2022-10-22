<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateCitaRequest;

class CitaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function administrar()
    {


        if(Auth::check()){

            $eventos = Cita::all();
            $usuarios = User::all();

            return view('citas.administrar', compact('usuarios'));
            
        }else{
            return redirect()->route('login');
        }
        
    }

    public function admin()
    {   
        if(Auth::check()){

            $usuarios = User::all();
            
            return view('citas.admin', compact('usuarios'));

        }else{

            return redirect()->route('login');

        }
    }

    public function store(Request $request)
    {
        
        request()->validate(CreateCitaRequest::$rules);
        // dd($request['idUser']);
        $date = Carbon::now();

        $existe = Cita::where('idUser', $request['idUser'])->first();

        if($existe){
            $color = $existe->color;
        }else{
            $color = substr(md5(time()), 0, 6);
            $color = '#'.$color;
        }

        Cita::create([
            'idUser' => $request['idUser'],
            'titulo' => $request['title'],
            'fecha_cita' => $date,
            'motivo_cita' => $request['descripcion'],
            'color' => $color,
            'start' => $request['start'],
            'end' => $request['start']
        ]);

        return $request;
    }

    public function  show($idUser)
    {

        if(Auth::check()){
            
            if ($idUser == 'admin') {
                $eventos = Cita::all();
            }else{
                $eventos = Cita::where('idUser', $idUser)->get();
            }


            $hoy = strtotime(date("Y-m-d 00:00:00"));
            
            foreach($eventos as $evento){
    
                $evento->display = true;
                $title = $evento->titulo;
                $evento->title = $title;
                $id = $evento->idCita;
                $evento->id = $id;
    
                $fechaCita = strtotime($evento->start);
                if($hoy > $fechaCita){
                    // $evento->color= $evento;
                    $evento->color = '#DE3131';
                }

                $evento->textColor='black';
                $evento['rol'] = $idUser;
            }
    
            return response()->json($eventos);

        }else{

            return redirect()->route('login');

        }
        
    }

    public function edit($idCita)
    {

        $evento = Cita::find($idCita);

        $evento->start = Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('Y-m-d');
        $evento->end = Carbon::createFromFormat('Y-m-d H:i:s', $evento->end)->format('Y-m-d');

        return response()->json($evento);
    }

    public function update(Request $request,Cita $cita)
    {

        request()->validate(CreateCitaRequest::$rules);

        $date = Carbon::now();

        $existe = Cita::where('idUser', $request['idUser'])->first();
        $color = $existe->color;

        $cita->update([
            'idUser' => $request['idUser'],
            'titulo' => $request['title'],
            'fecha_cita' => $date,
            'motivo_cita' => $request['descripcion'],
            'start' => $request['start'],
            'end' => $request['start'],
            'color' => $color
        ]);

        return response()->json($cita);
    }

    public function destroy($idCita)
    {

        $evento = Cita::find($idCita)->delete();

        return response()->json($evento);
    }

}
