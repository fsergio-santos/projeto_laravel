<?php

namespace App\Service;
use App\Author;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\ConsoleOutput;



class AuthorService
{
    private $repository;
    private $out;

    public function __construct(Author $author, ConsoleOutput $out)
    {
        $this->repository = $author;
        $this->out = $out; 
    }

    public function index($paginaAtual, $pageSize, $dir, $props, $search ){

        if (empty($search)){
            $query = DB::table('authors')->select('*')->orderBy($props,$dir);
        } else {
            $query = DB::table('authors')->where($props, 'LIKE','%'.$search.'%')->orderBy($props,$dir);
			
			//orWhere($props, 'LIKE','%'.$search.'%')
        }
       
        $total = $query->count();

        $registros = $query->offset(($paginaAtual - 1) * $pageSize )->limit($pageSize)->get();

        return([
            'data' => $registros,
            'current_page'=>$paginaAtual-1,
            'per_page'=>$pageSize,
            'last_page'=>ceil($total/$pageSize),
            'total'=>$total,
        ]);
    }

    
    public function searchName($data){
       
        $registros = $this->repository->search($data->nome);

        return( [ 
            'registros' => $registros,
        ]);
    }

    public function create($data){
     
       $data['data_nascimento'] = Carbon::createFromFormat('d/m/Y',$data['data_nascimento'])->format('Y-m-d');
     
       $this->repository->create($data);

       return ([
           'mensagem' => 'Registro Cadastrado com sucesso! '
       ]);

    }

    public function search($id){
        $registro = $this->repository->find($id);
        return ([
            'registro' => $registro, 
        ]);
    }


    public function update( $id, $data ){
      
        $registro = $this->repository->find($id);

        //$data['data_nascimento'] = Carbon::createFromFormat('d/m/Y',$mydata)->format('Y-m-d');
      
        $registro->update($data);

        return ( [
            'success' => 'Registro Alterado com sucesso! '
        ]);
    }


    public function delete($id){

        $registro = $this->repository->find($id);
        $registro->delete();
        return ([
            'success' => 'Registro Excluído com sucesso! '
        ]);    
    }

    public function view($id){

        $registro = $this->repository->find($id);
        return ( [
            'registro' => $registro 
        ]);
    }

   
    public function books($id){
        $registros = $this->repository->find($id)->livros()->paginate(5);
        if ( count($registros) == 0 ){
            return ([
                'fail'=>'Editora não tem Livros cadastrados! '
            ]);
        }
        $registro = $this->repository->find($id);
        return ([
            'registros' => $registros,
            'nome'=> $registro['nome'],
        ]);
    }
}