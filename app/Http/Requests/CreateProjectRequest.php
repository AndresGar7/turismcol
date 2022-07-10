<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'titulo' => 'required|unique:noticias,titulo',
            'descripcion' => 'required|min:70',
            'imagen' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El campo del titulo es obligatorio',
            'titulo.unique' => 'El campo del titulo no se puede repetir',
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'descripcion.min' => 'Debe ingresar como minimo 70 caracteres acerca de la noticia' ,
            'imagen.required' => 'La noticia debe de contener una imagen',
            'imagen.image' => 'El archivo debe de ser JPG o PNG'
        ];
    }
}

// 'titulo' => 'required',
//     'descripcion' => 'required|min:70',
//     'imagen' => 'required|image'
// ],
// [
//     'titulo.required' => 'El campo del titulo es obligatorio',
//     'descripcion.required' => 'El campo descripcion es obligatorio',
//     'descripcion.min' => 'Debe ingresar como minimo 70 caracteres acerca de la noticia' ,
//     'imagen.required' => 'La noticia debe de contener una imagen',
//     'imagen.image' => 'El archivo debe de ser JPG o PNG'
// ]