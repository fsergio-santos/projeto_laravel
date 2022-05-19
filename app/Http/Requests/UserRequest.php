<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'sexo' => 'required',
            'password'=> 'required|string|min:8',
            'password_confirmation'=> 'required|string|min:8|same:password',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O nome do usuário deve ser informado',
            'email.required' => 'O email do usuário deve ser informado',
            'sexo.required' => 'O sexo do usuário deve ser informado',
            'password.required '=> 'A senha do usuário deve ser informada',
            'password_confirmation.same' => 'A confirmação da senha está diferente',
        ];
    }


}
