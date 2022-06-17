<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePerfilRequest extends FormRequest
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
        return [
            'usuario' => 'unique:clientes,usuario',
            'nombre' => 'required|max:70',
            'imagen' => 'image',
            'email' => 'required',
            'sexo' => 'required',
            'telefono' => 'required|max:13|min:9'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo del nombre es obligatorio',
            'nombre.max' => 'El nombre completo no puede superar los 70 caracteres',
            'usuario.unique' => 'Este usuario ya se encuentra creado',
            'imagen.image' => 'El archivo debe de ser JPG o PNG',
            'email.required' => 'El campo email es obligatorio',
            'sexo.required' => 'Debe de escoger alguna opcion',
            'telefono.required' => 'El campo del telefono es obligatorio',
            'telefono.min' => 'El telefono debe de ser mayor a 9 digitos',
            'telefono.max' => 'El telefono debe de ser menor a 13 digitos'
        ];
    }
}
