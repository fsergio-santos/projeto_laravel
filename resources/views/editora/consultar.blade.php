@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Cadastro de Editora</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/editora/listar') }}">Pesquisa
                        de Editoras</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">
                <form action=" {{ url('/editora/cancelar') }}" method="POST">
                    @include('editora.__form')
                    <div class="center">
                        <a href="{{ url('/editora/cancelar') }}" class="btn btn-secondary btn-lg">
                            Cancelar Consulta da Editora
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
