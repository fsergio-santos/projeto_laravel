<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\RolePermissao;

class Permissao extends Model
{

    use Notifiable;
    use Sortable;

    protected $table='permissaos';

    public $sortable = [ 
        'id', 
        'nome', 
    ];
   
    protected $fillable = [
    	'nome',
    	'descricao'
    ];

    public function role_permissao(){
        return $this->hasMany(RolePermissao::class,'permissao_id');
    }

    public function existePermissao($permissao_id)
    {   
        return (boolean) RolePermissao::where('permissao_id',$permissao_id)->first();
    }

}
