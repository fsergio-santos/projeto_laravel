<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\User;
use App\RolePermissao;

class Role extends Model
{
    use Notifiable;
    use Sortable;

    protected $table='roles';

    public $sortable = [ 
        'id', 
        'nome', 
    ];
   
    protected $fillable = [
    	'nome',
    	'descricao'
    ];

    public function users(){
        return $this->belongsToMany(User::class,'user_role')->withTimestamps();
    }

    public function role_permissao(){
        return $this->hasMany(RolePermissao::class,'role_id');
    }


}
