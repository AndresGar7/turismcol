<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsuarioRequest extends FormRequest
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


        if(request()->accion == 'usuarios.update' ){
            if(!empty(request()->password_new)){
                $rules = [
                    'nombre' => 'required|min:3',
                    'apellidos' => 'required',
                    'password_new' => 'required|confirmed|min:8',
                    'password_new_confirmation' => 'required|min:8',
                    'telefono' => 'required|min:9',
                    'rol' => 'required'
                ];
            }else{
                $rules = [
                    'nombre' => 'required|min:3',
                    'apellidos' => 'required',
                    'telefono' => 'required|min:9',
                    'rol' => 'required'
                ];
            }
        }else{
            $rules = [
                'email' => 'required|email|unique:users_login,email',
                'nombre' => 'required|min:3',
                'apellidos' => 'required',
                'password_new' => 'required|confirmed|min:8',
                'password_new_confirmation' => 'required|min:8',
                'telefono' => 'required|min:9',
                'rol' => 'required'
            ];
        }


        return $rules;
    }

    public function messages()
    {
        return [
            'email.required' => 'El campo Correo Electrónico es obligatorio',
            'email.email' => 'El Correo Electrónico no es valido.',
            'nombre.required' => 'El campo Nombres es obligatorio',
            'nombre.min' => 'El campo Nombres tiene que contener como minimo 3 caracteres.',
            'apellidos.required' => 'El campo Apellidos es obligatorio.',
            'password_new.required' => 'El campo Contraseña es obligatorio.',
            'password_new.min' => 'La Contraseña debe contener al menos 8 caracteres.',
            'password_new.confirmed' => 'Los campos de Contraseña no coinciden.',
            'password_new_confirmation.required' => 'El campo Confirmar Contraseña es obligatorio.',
            'password_new_confirmation.min' => 'La Contraseña de confirmación debe de contener mas de 8 caracteres.',
            'telefono.required' => 'El campo Telefono es obligatorio.',
            'telefono.min' => 'El Telefono debe de contener como minimo 9 digitos.',
            'rol.required' => 'El campo de Cargo es obligatorio.'
        ];
    }
}
