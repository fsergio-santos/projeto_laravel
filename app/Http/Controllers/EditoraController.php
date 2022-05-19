<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditoraRequest;
use App\Service\EditoraService;
use Illuminate\Http\Request;


class EditoraController extends Controller
{
    private $editoraService;
 
    public function __construct(EditoraService $editoraService)
    {
        //$this->middleware('auth');

        $this->editoraService = $editoraService;
    }

    public function index(){
        
        $data = $this->editoraService->index();

        return view('editora.index',[
            'registros' => $data['registros'],
        ]);
    }

    public function search(Request $request){
       
        $filters = $request->all();

        $registros = $this->editoraService->search($request->all());

        return view('editora.index', [ 
            'registros' => $registros,
            'filters' => $filters,
        ]);
    }

    public function new(){
        return view('editora.incluir');
    }

    public function create(EditoraRequest $request){
        
       $data = $request->all();
       $this->repository->create($data);
       return redirect()->route('editora.listar')->with('success','Registro Cadastrado com sucesso! ');

    }

    public function update($id){

        $registro = $this->repository->find($id);

        if ( !$registro ){
            return redirect()->back();
        }

        return view('editora.alterar',[
            'registro' => $registro, 
        ]);
    }


    public function save(EditoraRequest $request, $id){
      
        $data = $request->all();

        $registro = $this->repository->find($id);
      
        $registro->update($data);

        return redirect()->route('editora.listar')->with('success','Registro Alterado com sucesso! ');
    }


    public function delete($id){

        $registro = $this->repository->find($id);
        return view('editora.excluir', [
            'registro' => $registro,
        ]);
    }

    public function excluir($id){

        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('editora.listar')->with('success','Registro Excluído com sucesso! ');    
    }

    public function view($id){

        $registro = $this->repository->find($id);
        return view('editora.consultar', [
            'registro' => $registro 
        ]);
    }

    public function cancel(){
        return redirect()->route('editora.listar');
    }

    public function books($id){
        $registros = $this->repository->find($id)->livros()->paginate(5);
        if ( count($registros) == 0 ){
            return redirect()->back()->with('fail','Editora não tem Livros cadastrados! ');
        }
        $registro = $this->repository->find($id);
        return view('editora.livro',[
            'registros' => $registros,
            'nome'=> $registro['nome'],
        ]);
    }

}
