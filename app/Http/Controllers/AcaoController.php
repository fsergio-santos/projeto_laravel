<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;
use App\Http\Requests\AcaoRequest;

class AcaoController extends Controller
{
    private $repository;

    public function __construct(Action $acao)
    {
        $this->repository = $acao;
    }

    public function index(){
        
        $registros = $this->repository->sortable()->paginate(5);

        return view('acao.index',[
            'registros' => $registros,
        ]);
    }

    public function search(Request $request){
       
        $filters = $request->all();

        $registros = $this->repository->search($request->nome);

        return view('acao.index', [ 
            'registros' => $registros,
            'filters' => $filters,
        ]);
    }

    public function new(){
        return view('acao.incluir');
    }

    public function create(AcaoRequest $request){
        
       $data = $request->all();
       $this->repository->create($data);
       return redirect()->route('acao.listar')->with('success','Registro Cadastrado com sucesso! ');

    }

    public function update($id){

        $registro = $this->repository->find($id);

        if ( !$registro ){
            return redirect()->back();
        }

        return view('acao.alterar',[
            'registro' => $registro, 
        ]);
    }


    public function save(AcaoRequest $request, $id){
      
        $data = $request->all();

        $registro = $this->repository->find($id);
      
        $registro->update($data);

        return redirect()->route('acao.listar')->with('success','Registro Alterado com sucesso! ');
    }


    public function delete($id){

        $registro = $this->repository->find($id);
        return view('acao.excluir', [
            'registro' => $registro,
        ]);
    }

    public function excluir($id){

        if ( Auth::user()->id == $id ){
            return redirect()->route('acao.listar')->with('fail','Você não pode ser excluído! '); 
        }

        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('acao.listar')->with('success','Registro Excluído com sucesso! ');    
    }

    public function view($id){

        $registro = $this->repository->find($id);
        return view('acao.consultar', [
            'registro' => $registro 
        ]);
    }

    public function cancel(){
        return redirect()->route('acao.listar');
    }
}
