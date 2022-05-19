<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table='books';

    protected $fillable = [
        'titulo', 'data_cadastro', 'ano_edicao', 'author_id','editora_id',
    ];

    public function author(){
        return $this->belongsTo('App\Author', 'author_id');
    }

    public function editora(){
        return $this->belongsTo('App\Editora', 'editora_id');
    }
}
