<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\EditoraService;

class EditoraController extends Controller
{

    private $service;

    public function __construct(EditoraService $editoraService){
        header('Access-Control-Allow-Origin: *');

        $this->service = $editoraService;
    }

    public function index()
    {
        $registros = $this->service->index();
        return response()->json($registros);
    }
}
