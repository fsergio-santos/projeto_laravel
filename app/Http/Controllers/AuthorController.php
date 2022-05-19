<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use App\Author;
use Carbon\Carbon;
use DataTables;

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

    public function index(Request $request){
        //$items = $request->items ?? 10;
        //$registros = Author::all();
       //$registros = $this->repository->sortable()->paginate($items);
        if ($request->ajax()){
            $data = Author::latest()->get();
            return Datatables::of($data)->addIndexColumn()->addColumn('action', function($row){
                    $action = '<a href='.\URL::route('author.alterar', $row->id).' class="btn btn-info btn-sm">
                               <i class="fa fa-pencil" ></i></a>';
                    $action = $action.'<a href='.\URL::route('author.deletar', $row->id).' class="btn btn-danger btn-sm">
                                       <i class="fa fa-trash"></i></a>';
                    $action = $action.'<a href='.\URL::route('author.consultar', $row->id).' class="btn btn-warning btn-sm"> 
                                       <i class="fa fa-address-book"></i></a>';    
                        
                    return $action;
            })->rawColumns(['action'])->make(true);
        }
        return view('author.index');
    }

   



    public function search(Request $request){
        $filters = $request->all();
        $items = $request->items;
        $registros = $this->repository->search($request->nome, $request->items);

        return view('author.index', [ 
            'registros' => $registros,
            'filters' => $filters,
            'items'=>$items,
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

    public function cancel(){
        return redirect()->route('author.listar');
    }

    public function view($id){
        $registro = $this->repository->find($id);
        return view('author.consultar', [
            'registro' => $registro 
        ]);
    }


    public function books($id){
        $registros = $this->repository->find($id)->livros()->paginate(5);
        if ( count($registros) == 0 ){
            return redirect()->back()->with('fail','Autor não tem Livros cadastrados! ');
        }
        $registro = $this->repository->find($id);
        return view('author.livros',[
            'registros' => $registros,
            'nome'=> $registro['nome'],
        ]);
    }

    

}
