<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'titulo' => 'required|string|max:100',
            'data_cadastro'=> 'required',
            'titulo'=> 'required|string|max:100',
            'ano_edicao'=> 'required|string|max:5',
            'author_id'=> 'required',
            'editora_id'=> 'required',
        ];
    }
}
