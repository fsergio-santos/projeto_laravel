<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'password'=> 'required|string|min:8'
        ];
    }

    public function messages(){
        return [
            'email.required'=> 'O E-mail deve ser informado!',
            'email.email' => 'O E-mail deve ser válido',
            'password.required' => 'A Senha deve ser informada!',
            'password.min'=> 'A Senha deve ter oito caracteres' 
        ];
    }
}
