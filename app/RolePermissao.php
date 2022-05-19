<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;
use App\Role;
use App\Permissao;
use App\Action;

class RolePermissao extends Model
{
    
    use Notifiable;
    use Sortable;

    protected $table='role_permissao';

    public $sortable = [ 
        'role_id', 
        'permissao_id',
        'action_id', 
    ];
   
    protected $fillable = [
    	'role_id',
        'permissao_id',
        'action_id',
    ];

    protected $hidden = [
        'created_at', 
        'updated_at', 
    ];

    public function roles(){
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function permissoes(){
        return $this->belongsTo(Permissao::class, 'permissao_id');
    }

    public function actions(){
        return $this->belongsTo(Action::class, 'action_id');
    }

    public function hasRolePermissaoAction($role_id, $permissao_id, $action_id){
        return ( boolean ) RolePermissao::where('$role_id', $role_id)->
                                          where('permission_id',$permissao_id)->
                                          where('action_id', $action_id)->first();  
    }


}
