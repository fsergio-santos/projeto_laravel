@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Cadastro de Usuário</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/usuario/listar') }}">Pesquisa
                        de Usuário</a></li>
            </ul>
        </div>

        <div class="tile">
            <div class="tile-body">
                <div class="container">
                    @include('layouts.alert')
                </div>
                <form method="POST" action="{{ url('/usuario/salvar') }}" id="myform">
                    @csrf
                    @include('usuario.__form')
                    <div class="center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Incluir Dados do Usuário
                        </button>
                        <a href="{{ url('/usuario/cancelar') }}" class="btn btn-secondary ml-3 btn-lg">
                            Cancelar Cadastro do Usuário
                        </a>
                    </div>          
                </form>
            </div>
        </div>
        

    </div>
@endsection
