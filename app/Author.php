<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table='authors';

    protected $fillable = [
        'nome', 'pseudonimo', 'data_nascimento', 'sexo', 'rg', 'cpf', 'endereco', 
        'cep', 'cidade', 'bairro', 'email', 'telefone_celular', 'telefone_fixo',
    ];


    public function search($filter = null)
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('nome', 'LIKE', "%{$filter}%");
            }
        })->paginate();

        return $results;
    }


    public function livros(){
        return $this->hasMany('App\Book','author_id');
    }

}
