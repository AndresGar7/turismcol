<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatedPresupuestoRequest extends FormRequest
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
    public function rules()
    {
        $rules = [
            'nombre' => 'required|min:3',
            'apellido' => 'required|min:3',
            'email' => 'required|email',
            'telefono' => 'required|min:9',
            'concepto' => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo de Nombre es obligotorio.',
            'nombre.min' => 'El Nombre ingresado no es valido.',
            'apellido.required' => 'El campo Apellido es obligatorio.',
            'apellido.min' => 'El campo Apellido no es valido.',
            'email.required' => 'El campo Correo Electrónico es obligatorio.',
            'email.email' => 'El Correo Electrónico no es valido.',
            'telefono.required' => 'El campo Teléfono es obligatorio.',
            'telefono.min' => 'El Teléfono no es valido.',
            'concepto.required' => 'El campo ¿Que quieres saber? es obligatorio.'
        ];
    }
}
