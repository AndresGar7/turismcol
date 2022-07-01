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
            'contraseña' => 'required|current_password',
            'contraseña_Nueva' => 'required|confirmed|min:8',
            'contraseña_Nueva_confirmation' => 'required|min:8'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'contraseña_Nueva.required' => 'El campo Contraseña Nueva es obligatorio.',
            'contraseña_Nueva.min' => 'debe contener al menos 8 caracteres.',
            'contraseña_Nueva_confirmation.required' => 'El campo Confirmar Contraseña es obligatorio.',
            'contraseña_Nueva_confirmation.min' => 'La contraseña nueva de confirmación.'
        ];
    }
}
