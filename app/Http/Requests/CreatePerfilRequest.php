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
            'usuario' => 'unique:usuarios,nombre',
            'nombre' => 'required|min:70',
            'imagen' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El campo del titulo es obligatorio',
            'titulo.unique' => 'Este usuario ya se encuentra creado',
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'descripcion.min' => 'Debe ingresar como minimo 70 caracteres acerca de la noticia' ,
            'imagen.required' => 'La noticia debe de contener una imagen',
            'imagen.image' => 'El archivo debe de ser JPG o PNG'
        ];
    }
}
