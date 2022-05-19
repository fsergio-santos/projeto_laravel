<?php

namespace App\Http\Controllers;

use App\Action;
use App\Permissao;
use App\Role;
use App\RolePermissao;
use Illuminate\Http\Request;

class RolePermissaoController extends Controller
{
    private $repository;

    public function __construct(RolePermissao $rolePermissao)
    {
        $this->repository = $rolePermissao;
    }


    public function permissoes($id){
                

        $role = Role::find($id);
        $acoes = Action::all();       
        $registros = Permissao::paginate(5);

        return view('role.permissao',[
            'registros' => $registros,
            'role'=> $role,
            'acoes'=>$acoes,
        ]);
    }



    public function salvarPermissoes(Request $request){
      
        $dados = $request->all();

        $role_id = $request->get('role_id');

        $verdadeiro = isset($dados['permission']);
        if ($verdadeiro) {
            $permissao = $dados['permission'];
            for ($p = 0; $p < sizeof($permissao); $p++ ){
                 $verdadeiro = isset($dados[$permissao[$p].'_acao']);
                 if ($verdadeiro){
                    $acao = $dados[$permissao[$p].'_acao'];
                  
                    for ($a = 0; $a < sizeof($acao); $a++ ){ 
                    
                        if (!$this->repository->hasRolePermissaoAction($role_id, $permissao[$p], $acao[$a]) ) {

                            $role_permissao = new RolePermissao([
                                'role_id' => $role_id,
                                'permissao_id' => $permissao[$p],
                                'action_id' => $acao[$a],
                            ]); 
               
                            $role_permissao->save();
                        }
                      
                    } 
         
                 }
              
            }
            
        }
        return redirect()->back()->with('success',' permissões adicionada com sucesso!');
    }


    public function deletarPermissoes($role_id, $permissao_id, $acao){
        //$role = $this->repository->find($role_id)->first();
        //$permissao = Permissao::find($permissao_id);
        //$role->permissaos()->detach($permissao);
        return redirect()->back()->with('success',' permissão removida com sucesso!');
    }

}
