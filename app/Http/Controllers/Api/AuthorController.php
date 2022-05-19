<?php


//if ($s = $request->input('s')) {
//            $query->whereRaw("title LIKE '%" . $s . "%'")
//                ->orWhereRaw("description LIKE '%" . $s . "%'");
        
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use Illuminate\Http\Request;
use App\Service\AuthorService;
use Symfony\Component\Console\Output\ConsoleOutput;

class AuthorController extends Controller
{

    private $service;
    private $out;

    public function __construct(AuthorService $authorService, ConsoleOutput $out){
        $this->service = $authorService;
        $this->out = $out; 
    }

    public function index(Request $request)
    { 
        $paginaAtual = $request->get('paginaAtual') ? $request->get('paginaAtual') : 1;
        $pageSize    = $request->get('pageSize') ? $request->get('pageSize') : 5;
        $dir         = $request->get('dir') ? $request->get('dir') : "asc";
        $props       = $request->get('props') ? $request->get('props') : "id";
        $search      = $request->get('search') ? $request->get('search') : "";

        $registros = $this->service->index( $paginaAtual,$pageSize,$dir,$props,$search);
        
        return response()->json($registros);
    }

    public function search($id)
    {
       // $this->out->writeln("passando pelo controller  ");
        $registro = $this->service->search($id);
        if (!$registro){
            return response()->json(['mensagem' => "Registro não localizado!"]);
        }
        return  response()->json(['autor' => $registro]);
    }

    public function create(AuthorRequest $request)
    {
        $data = $request->all();
        $mensagem = $this->service->create($data);
        return response()->json([
            'mensagem'=> $mensagem
        ]);
    }

    public function update(AuthorRequest $request, $id){
        $data = $request->all();
        $mensagem = $this->service->update($id, $data);
        return response()->json([
            'mensagem'=>$mensagem,
        ]);
    }


    public function delete($id){
        $mensagem = $this->service->delete($id);
        return response()->json([
           'mensagem'=>$mensagem,
        ]);  
    }

}
