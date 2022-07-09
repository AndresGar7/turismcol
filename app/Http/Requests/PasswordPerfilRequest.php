<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class PasswordPerfilRequest extends FormRequest
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
            'password' => 'required|current_password',
            'password_new' => 'required|confirmed|min:8',
            'password_new_confirmation' => 'required|min:8'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'password.required' => 'El campo Contraseña Actual es obligatorio.',
            'password.current_password' => 'El campos Contraseña Actual no coincide.',
            'password_new.required' => 'El campo Contraseña Nueva es obligatorio.',
            'password_new.min' => 'La contraseña debe contener al menos 8 caracteres.',
            'password_new.confirmed' => 'Los campos de contraseña nueva no coinciden.',
            'password_new_confirmation.required' => 'El campo Confirmar Contraseña es obligatorio.',
            'password_new_confirmation.min' => 'La contraseña nueva de confirmación debe de contener mas de 8 caracteres.'
        ];
    }
}
