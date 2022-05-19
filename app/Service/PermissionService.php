<?php

namespace App\Service;

use App\Permissao;
use Illuminate\Support\Facades\Auth;

Class PermissionService {


    public static function hasPermission($permission, $action){

        $permissoes = Permissao::with('role_permissao')->get();
        $user = User::find(Auth::user()->id);
        if ($user->roles()->contains($permission)){
            foreach($permissoes as $permissao) {
                foreach( $permissao->role_permissao as $role_permissao ) {
                    $role_id = $role_permissao->role_id;
                    $permissao_id = $role_permissao->permissao_id; 
                    $action_id = $role_permissao->action_id;
                } 
            }
        } 
        return false;
    }
    
    

}
