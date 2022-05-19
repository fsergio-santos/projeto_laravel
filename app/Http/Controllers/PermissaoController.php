<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissaoRequest;
use Illuminate\Http\Request;
use App\Permissao;

class PermissaoController extends Controller
{
    private $repository;

    public function __construct(Permissao $permissao)
    {
        $this->repository = $permissao;
    }

    public function index(){
        
        $registros = $this->repository->sortable()->paginate(5);

        return view('permissao.index',[
            'registros' => $registros,
        ]);
    }

    public function search(Request $request){
       
        $filters = $request->all();

        $registros = $this->repository->search($request->nome);

        return view('permissao.index', [ 
            'registros' => $registros,
            'filters' => $filters,
        ]);
    }

    public function new(){
        return view('permissao.incluir');
    }

    public function create(PermissaoRequest $request){
        
       $data = $request->all();
       $this->repository->create($data);
       return redirect()->route('permissao.listar')->with('success','Registro Cadastrado com sucesso! ');

    }

    public function update($id){

        $registro = $this->repository->find($id);

        if ( !$registro ){
            return redirect()->back();
        }

        return view('permissao.alterar',[
            'registro' => $registro, 
        ]);
    }


    public function save(PermissaoRequest $request, $id){
      
        $data = $request->all();

        $registro = $this->repository->find($id);
      
        $registro->update($data);

        return redirect()->route('permissao.listar')->with('success','Registro Alterado com sucesso! ');
    }


    public function delete($id){

        $registro = $this->repository->find($id);
        return view('permissao.excluir', [
            'registro' => $registro,
        ]);
    }

    public function excluir($id){

        if ( Auth::user()->id == $id ){
            return redirect()->route('permissao.listar')->with('fail','Você não pode ser excluído! '); 
        }

        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('permissao.listar')->with('success','Registro Excluído com sucesso! ');    
    }

    public function view($id){

        $registro = $this->repository->find($id);
        return view('permissao.consultar', [
            'registro' => $registro 
        ]);
    }

    public function cancel(){
        return redirect()->route('permissao.listar');
    }


    

}
