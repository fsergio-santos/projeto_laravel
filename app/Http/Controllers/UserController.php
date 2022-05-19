<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Role;
use App\Service\PermissionService;
use App\User;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;

class UserController extends Controller
{
   
    private $repository;

    public function __construct(User $usuario)
    {
        $this->repository = $usuario;
    }

    public function index(Request $request){

        if ( !PermissionService::hasPermission('USUARIO','CONSULTAR') ) {
            abort(403,"Não autorizado!");
        };
        
        $items = $request->items ?? 10;
        $registros = $this->repository->sortable()->paginate($items);

        return view('usuario.index',[
            'registros' => $registros,
            'items'=> $items,
        ]);
    }

    public function search(Request $request){
       
        $filters = $request->all();

        $registros = $this->repository->search($request->nome);

        return view('usuario.index', [ 
            'registros' => $registros,
            'filters' => $filters,
        ]);
    }

    public function new(){
        return view('usuario.incluir');
    }

    public function create(UserRequest $request){
        
       $data = $request->all();
       $this->repository->create($data);
       return redirect()->route('usuario.listar')->with('success','Registro Cadastrado com sucesso! ');

    }

    public function update($id){

        $registro = $this->repository->find($id);

        if ( !$registro ){
            return redirect()->back();
        }

        return view('usuario.alterar',[
            'registro' => $registro, 
        ]);
    }


    public function save(UserRequest $request, $id){
      
        $data = $request->all();

        $registro = $this->repository->find($id);
      
        $registro->update($data);

        return redirect()->route('usuario.listar')->with('success','Registro Alterado com sucesso! ');
    }


    public function delete($id){

        $registro = $this->repository->find($id);
        return view('usuario.excluir', [
            'registro' => $registro,
        ]);
    }

    public function excluir($id){

        if ( Auth::user()->id == $id ){
            return redirect()->route('usuario.listar')->with('fail','Você não pode ser excluído! '); 
        }

        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('usuario.listar')->with('success','Registro Excluído com sucesso! ');    
    }

    public function view($id){

        $registro = $this->repository->find($id);
        return view('usuario.consultar', [
            'registro' => $registro 
        ]);
    }

    public function cancel(){
        return redirect()->route('usuario.listar');
    }

    public function roles($id){
        
        $usuario = $this->repository->find($id);
        
        $registros = Role::paginate(5);

        return view('usuario.role',[
            'registros' => $registros,
            'user'=> $usuario,
        ]);
    }


    public function salvarRoles(Request $request){
        $user_id = $request->get('user_id');
   
        $registros = $request['registros'];
   
        $usuario = $this->repository->find($user_id);
        
        for( $i = 0; $i < sizeof($registros); $i++){
            $role = Role::find($registros[$i]);
            if (!$usuario->existeRoles($role->id)) {
                 $usuario->roles()->attach($role);
            }
        }
        return redirect()->back()->with('success',' papéis adicionados com sucesso!');
   
    }


    public function deletarRoles($user_id, $role_id){
        $usuario = $this->repository->find($user_id)->first();
        $role = Role::find($role_id);
        $usuario->roles()->detach($role);
        return redirect()->back()->with('success',' Papel removido com sucesso!');

    }

    

}
