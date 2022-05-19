<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Editora extends Model
{
    use Sortable;

    protected $table='editoras';

    protected $fillable = [
        'nome',
    ];

    public $sortable = [ 
        'id', 
        'nome', 
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
        return $this->hasMany('App\Book', 'editora_id');
    }
}
