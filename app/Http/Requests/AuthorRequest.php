<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'nome' => 'required|string|max:100',
            'pseudonimo' => 'required|string|max:100',
            'data_nascimento'=> 'required',
            'sexo'=> 'required|string|min:1|max:1',
            'rg'=> 'required|string|max:20',
            'cpf'=> 'required|string|max:20',
            'endereco'=> 'required|string|max:100',
            'cep'=> 'required|string|max:10',
            'cidade'=> 'required|string|max:100',
            'bairro'=> 'required|string|max:100',
            'email'=> 'required|string|email|max:100',
            'telefone_celular'=> 'required|string|max:20',
            'telefone_fixo'=> 'required|string|max:20', 
        ];
    }
}
