<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Book;
use App\Author;
use App\Editora;
use Carbon\Carbon;

class BookController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Book $livro)
    {
        //$this->middleware('auth');

        $this->repository = $livro;
        $this->request = $request;
    }

    public function index(){
        
        $registros = $this->repository->paginate(5);

        return view('livro.index',[
            'registros' => $registros,
        ]);
    }

    public function search(Request $request){
       
        $filters = $request->all();

        $registros = $this->repository->search($request->nome);

        return view('livro.index', [ 
            'registros' => $registros,
            'filters' => $filters,
        ]);
    }

    public function new(){
        $editoras = Editora::all();
        $authores = Author::all();
        return view('livro.incluir', [
            'editoras' => $editoras,
            'authores' => $authores,
        ]);
    }

    public function create(BookRequest $request){
        
       $data = $request->all();
       $data['data_cadastro'] = Carbon::createFromFormat('d/m/Y',$request['data_cadastro'])->format('Y-m-d');
       $this->repository->create($data);
       return redirect()->route('livro.listar')->with('success','Registro Cadastrado com sucesso! ');

    }

    public function update($id){

        $editoras = Editora::all();
        $authores = Author::all();

        $registro = $this->repository->find($id);

        if ( !$registro ){
            return redirect()->back();
        }

        return view('livro.alterar',[
            'registro' => $registro, 
            'editoras' => $editoras,
            'authores' => $authores,
        ]);
    }


    public function save(BookRequest $request, $id){
      
        $data = $request->all();
        $data['data_cadastro'] = Carbon::createFromFormat('d/m/Y',$request['data_cadastro'])->format('Y-m-d');
        $registro = $this->repository->find($id);
      
        $registro->update($data);

        return redirect()->route('livro.listar')->with('success','Registro Alterado com sucesso! ');
    }


    public function delete($id){
        $editoras = Editora::all();
        $authores = Author::all();
        $registro = $this->repository->find($id);
        return view('livro.excluir', [
            'registro' => $registro,
            'editoras' => $editoras,
            'authores' => $authores,
        ]);
    }

    public function excluir($id){

        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('livro.listar')->with('success','Registro Excluído com sucesso! ');;    
    }

    public function view($id){
        $editoras = Editora::all();
        $authores = Author::all();
        $registro = $this->repository->find($id);
        return view('livro.consultar', [
            'registro' => $registro,
            'editoras' => $editoras,
            'authores' => $authores, 
        ]);
    }

    public function cancel(){
        return redirect()->route('livro.listar');
    }
}