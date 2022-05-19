<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Author extends Model
{
    use Sortable;

    protected $table='authors';

    protected $fillable = [
        'nome', 
        'pseudonimo', 
        'data_nascimento', 
        'sexo', 
        'rg', 
        'cpf', 
        'endereco', 
        'cep', 
        'cidade', 
        'bairro', 
        'email', 
        'telefone_celular', 
        'telefone_fixo',
    ];

    public $sortable = [ 
        'id', 
        'nome', 
    ];

    public function search($filter = null, $items )
    {
        
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('nome', 'LIKE', "%{$filter}%");
            }
        })->paginate($items);

        return $results;
    }

    public function livros(){
        return $this->hasMany('App\Book', 'author_id');
    }

}
