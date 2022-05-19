'@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Cadastro de Ações para Permissão</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/acao/listar') }}">Pesquisa
                        de Ações para Permissões</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">
                <form action=" {{ url('/acao/salvar') }}" method="POST">
                    @csrf
                    @include('acao.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">Salvar Dados da Ação</button>
                        <a href="{{ url('/acao/cancelar') }}" class="btn btn-secondary btn-lg ml-3">
                            Cancelar Inclusão da Ação para Permissão
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection'
