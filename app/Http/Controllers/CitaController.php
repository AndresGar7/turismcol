<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateCitaRequest;
use Illuminate\Support\Carbon;

class CitaController extends Controller
{
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

        foreach($eventos as $evento){
            $evento->display = "#000000";
            $title = $evento->titulo;
            $evento->title = $title;
            $id = $evento->idCita;
            $evento->id = $id;
            $evento->color= '#12B886';
            $evento->textColor='black';
            // $evento->display = 'green';
            // $evento->eventColor= '#12B886';
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
