<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use App\Author;
use App\Book;
use Carbon\Carbon;

class AuthorController extends Controller
{
    private $repository;
    protected $request;

    public function __construct(Request $request, Author $author)
    {
        //$this->middleware('auth');

        $this->repository = $author;
        $this->request = $request;
    }

    public function index(){
        
        //$registros = Author::paginate(5);

        $registros = $this->repository->paginate(5);

        return view('author.index',[
            'registros' => $registros,
        ]);
    }

    public function search(Request $request){
       
        $filters = $request->all();

        $registros = $this->repository->search($request->nome);

        return view('author.index', [ 
            'registros' => $registros,
            'filters' => $filters,
        ]);
    }

    public function new(){
        return view('author.incluir');
    }

    public function create(AuthorRequest $request){
        
       $data = $request->all();
       $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y',$request['data_nascimento'])->format('Y-m-d');
       $this->repository->create($data);

       return redirect()->route('author.listar')->with('success','Registro Cadastrado com sucesso!');
    }

    public function update($id){
        $registro = $this->repository->find($id);

        if ( !$registro ){
            return redirect()->back();
        }

        return view('author.alterar',[
            'registro' => $registro, 
        ]);
    }


    public function save(AuthorRequest $request, $id){
        
        $data = $request->all();

        $registro = $this->repository->find($id);

        $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y',$request['data_nascimento'])->format('Y-m-d');
       
        $registro->update($data);
        
        return redirect()->route('author.listar')->with('success','Registro Alterado com sucesso!');
    }


    public function delete($id){
        $registro = $this->repository->find($id);
        return view('author.excluir', [
            'registro' => $registro,
        ]);
    }

    public function excluir($id){
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('author.listar')->with('success','Registro Excluído com sucesso!');;    
    }

    public function view($id){
        $registro = $this->repository->find($id);
        return view('author.consultar', [
            'registro' => $registro 
        ]);
    }
    

    public function books($id){
        $registros = $this->repository->find($id)->livros()->paginate(5);
        if ( count($registros) == 0 ) {
            return redirect()->back()->with('fail','Autor não possui livros cadastrados!');
        }

        $registro = $this->repository->find($id);

        return view('author.livros', [
            'registros' => $registros,
            'registro' =>$registro['nome'],
        ]);
    }
}
