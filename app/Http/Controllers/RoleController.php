<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{

    private $repository;

    public function __construct(Role $role)
    {
        $this->repository = $role;
    }

    public function index(){
        
        $registros = $this->repository->sortable()->paginate(5);

        return view('role.index',[
            'registros' => $registros,
        ]);
    }

    public function search(Request $request){
       
        $filters = $request->all();

        $registros = $this->repository->search($request->nome);

        return view('role.index', [ 
            'registros' => $registros,
            'filters' => $filters,
        ]);
    }

    public function new(){
        return view('role.incluir');
    }

    public function create(RoleRequest $request){
        
       $data = $request->all();
       $this->repository->create($data);
       return redirect()->route('role.listar')->with('success','Registro Cadastrado com sucesso! ');

    }

    public function update($id){

        $registro = $this->repository->find($id);

        if ( !$registro ){
            return redirect()->back();
        }

        return view('role.alterar',[
            'registro' => $registro, 
        ]);
    }

    
    public function save(RoleRequest $request, $id){
      
        $data = $request->all();

        $registro = $this->repository->find($id);
      
        $registro->update($data);

        return redirect()->route('role.listar')->with('success','Registro Alterado com sucesso! ');
    }


    public function delete($id){

        $registro = $this->repository->find($id);
        return view('role.excluir', [
            'registro' => $registro,
        ]);
    }

    public function excluir($id){
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('role.listar')->with('success','Registro Excluído com sucesso! ');    
    }

    public function view($id){

        $registro = $this->repository->find($id);
        return view('role.consultar', [
            'registro' => $registro 
        ]);
    }

    public function cancel(){
        return redirect()->route('role.listar');
    }

    
}
