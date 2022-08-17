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

        $rules = [
            'nombre' => 'required|max:70',
            'imagen' => 'image',
            'usuario' => 'required',
            'telefono' => 'required|max:13|min:9',
            'apellidos' => 'required|max:50|min:3',
            'fec_nacimiento' => 'required',
            'sexo' => 'required'
        ];
        
        if(request()->modo == 'perfil.update'){
            $rules['usuario'] ='min:5';
        }else{
            $rules['usuario'] ='required|min:5|unique:user_login,usuario';
        }
        // var_dump($rules);
        return $rules;
    }

    public function messages()
    {
        return [
            'sexo.required' => 'El campo de sexo es obligatorio.',
            'fec_nacimiento.required' => 'El campo de fecha de nocimiento es obligatorio.',
            'nombre.required' => 'El campo del nombre es obligatorio',
            'nombre.max' => 'El nombre completo no puede superar los 70 caracteres',
            'usuario.unique' => 'Este usuario ya se encuentra creado',
            'usuario.required' => 'El campo usuario es obligatorio',
            'usuario.min' => 'El usuario debe de contener como minimo 5 caracteres',
            'imagen.image' => 'El archivo debe de ser JPG o PNG',
            'email.required' => 'El campo email es obligatorio',
            'telefono.required' => 'El campo del telefóno es obligatorio',
            'telefono.min' => 'El telefóno debe de ser mayor a 9 digitos',
            'telefono.max' => 'El telefóno debe de ser menor a 13 digitos'
        ];
    }
}
