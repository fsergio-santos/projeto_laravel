<?php

namespace App\Service;
use App\Editora;


class EditoraService
{
    private $repository;

    public function __construct(Editora $editora)
    {
        //$this->middleware('auth');

        $this->repository = $editora;
    }

    public function index(){

        $registros = $this->repository->sortable()->paginate(5);

        return([
            'registros' => $registros,
        ]);
    }

    public function search($data){
       
        $registros = $this->repository->search($data->nome);

        return( [ 
            'registros' => $registros,
        ]);
    }

    public function create($data){
        
       $this->repository->create($data);
       return ([
           'success' => 'Registro Cadastrado com sucesso! '
       ]);

    }

    public function update($id){

        $registro = $this->repository->find($id);

        return ([
            'registro' => $registro, 
        ]);
    }


    public function save($data, $id){
      
        $registro = $this->repository->find($id);
      
        $registro->update($data);

        return ( [
            'success' => 'Registro Alterado com sucesso! '
        ]);
    }


    public function delete($id){

        $registro = $this->repository->find($id);
        return ( [
            'registro' => $registro,
        ]);
    }

    public function excluir($id){

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
