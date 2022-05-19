@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Cadastro de Livro</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/livro/listar') }}">Pesquisa
                        de Livros</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">
                <form>
                    @include('livro.__form')
                    <div class="center">
                        <a href="{{ url('/livro/cancelar') }}" class="btn btn-secondary btn-lg">
                            Cancelar Consulta do Livro
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
