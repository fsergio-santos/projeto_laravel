<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use App\RolePermissao;
use phpDocumentor\Reflection\Types\Boolean;

class Action extends Model
{
    use Notifiable;
    use Sortable;

    protected $table='actions';

    public $sortable = [ 
        'id', 
        'nome', 
    ];
   
    protected $fillable = [
    	'nome',
    	'descricao'
    ];

     
    public function role_permissao(){
        return $this->hasMany(RolePermissao::class,'action_id');
    }


    public function existePermissaoAction( $permissao_id, $action_id ) {
        return ( boolean ) RolePermissao::where('permissao_id', $permissao_id )->where('action_id', $action_id )->first();
    }
}
