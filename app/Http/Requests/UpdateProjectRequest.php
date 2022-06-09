<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => [ 
                $this->route('noticia') ?  '' : 'required',
                'image'
            ],
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El campo del titulo es obligatorio',
            'descripcion.required' => 'El campo descripcion es obligatorio',
            'imagen.required' => 'La noticia debe de contener una imagen',
            'imagen.image' => 'El archivo debe de ser JPG o PNG'
        ];
    }
}
