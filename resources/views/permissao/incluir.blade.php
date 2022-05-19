'@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Cadastro de Permissão</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/permissao/listar') }}">Pesquisa
                        das Permissões</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">
                <form action=" {{ url('/permissao/salvar') }}" method="POST">
                    @csrf
                    @include('permissao.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">Salvar Dados da Permissão</button>
                        <a href="{{ url('/permissao/cancelar') }}" class="btn btn-secondary btn-lg ml-3">
                            Cancelar Inclusão da Permissão
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection'
