<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCitaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // public function rules()
    // {   
    //     $rules = [
    //         'title' => 'requiered',
    //         'motivo_cita' => 'required',
    //         'start' => 'required',
    //         'end' => 'required'

    //     ];

    //     return $rules;
    // }

    public static $rules = [
        'title' => 'required',
        'descripcion' => 'required',
        'start' => 'required',
        'end' =>'required',
    ];

    public static $errors = [

        'title.required' => 'El campo titulo es obligatorio',
        'motivo_cita.required' => 'El campo Descripción es obligatorio',
        'end.required' => 'El campo del end es obligatorio',
        'start.required' => 'El campo start es obligatorio',
        
    ];
}
