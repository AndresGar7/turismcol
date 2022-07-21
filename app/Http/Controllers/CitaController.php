<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateCitaRequest;
use Illuminate\Support\Carbon;

class CitaController extends Controller
{

    public function validar(){

        $eventos = Cita::all();
        $hoy = strtotime(date("Y-m-d H:i:00",time()));

        foreach($eventos as $evento){
            $cita = strtotime($evento->start);
            if($hoy >= $cita){
                $evento[0] = 'rojo';
            }else{
                $evento[0] = 'verde';
            }
            // array_push($evento,'hoy');
        }

        return view('citas.create', compact('hoy','eventos','cita'));
    }

    public function admin()
    {   
        if(Auth::check()){
        
            return view('citas.admin');

        }else{

            return redirect()->route('login');

        }
    }

    public function store(Request $request)
    {
        // request()->validate(Cita::$rules);
        request()->validate(CreateCitaRequest::$rules);
        // dd($request['idUser']);
        $date = Carbon::now();

        Cita::create([
            'idUser' => $request['idUser'],
            'titulo' => $request['title'],
            'fecha_cita' => $date,
            'motivo_cita' => $request['descripcion'],
            'start' => $request['start'],
            'end' => $request['start']
        ]);

        return $request;
    }

    public function  show(Cita $cita){
        
        $eventos = Cita::all();
        $hoy = strtotime(date("Y-m-d 00:00:00"));
        
        foreach($eventos as $evento){

            $evento->display = true;
            $title = $evento->titulo;
            $evento->title = $title;
            $id = $evento->idCita;
            $evento->id = $id;

            $fechaCita = strtotime($evento->start);
            if($hoy <= $fechaCita){
                $evento->color= '#12B886';
            }else{
                $evento->color = '#DE3131';
            }
            $evento->textColor='black';
        }

        return response()->json($eventos);
    }

    public function edit($idCita){

        $evento = Cita::find($idCita);

        $evento->start = Carbon::createFromFormat('Y-m-d H:i:s', $evento->start)->format('Y-m-d');
        $evento->end = Carbon::createFromFormat('Y-m-d H:i:s', $evento->end)->format('Y-m-d');

        return response()->json($evento);
    }

    public function update(Request $request,Cita $cita){

        request()->validate(CreateCitaRequest::$rules);

        $date = Carbon::now();

        $cita->update([
            'idUser' => $request['idUser'],
            'titulo' => $request['title'],
            'fecha_cita' => $date,
            'motivo_cita' => $request['descripcion'],
            'start' => $request['start'],
            'end' => $request['start']
        ]);

        return response()->json($cita);
    }

    public function destroy($idCita){

        $evento = Cita::find($idCita)->delete();

        return response()->json($evento);
    }

}
