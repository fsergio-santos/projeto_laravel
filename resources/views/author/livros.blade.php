@extends('layouts.app')
@section('content')
<div class="container">
    <div class="app-title">
        <h1>
            <i class="fa fa-edit">Lista de Livros por Autor</i>
        </h1>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Menu Principal</a></li>
        </ul>
    </div>
    <div class="container">
        @include('layouts.alert')
    </div>
    <div class="container">
        <div class="col-xs-12 col-sm-12">
            <div class="form-group form form-inline">
                <label class="control-label col-sm-1">Autor:</label> <input type="text"
                    class="form-control col-sm-9" id="nomeShow" name="nomeShow"
                    value="{{ $nome }}" disabled/>
            </div>
        </div>
        <div class="tile">
            <div class="tile-body">
                <div id="no-more-tables">
                    <table class="table table-stripped table-bordered table-hover cf">
                        <thead class="cf">
                            <tr>
                                <th style="font-weight: bold; text-align: center;">Id</th>
                                <th style="font-weight: bold; text-align: center;">Edição</th>
                                <th style="font-weight: bold; text-align: center;">Data Cadastro</th>
                                <th style="font-weight: bold; text-align: center;">Titulo</th>
                                <th style="font-weight: bold; text-align: center;">Editora</th>
                                <th style="font-weight: bold; text-align: center;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registros as $registro)

                                <tr>
                                    <td data-title="Id" style="text-align: center">{{ $registro->id }}</td>
                                    <td data-title="Ano Edição" style="text-align: center">{{ $registro->ano_edicao}}</td>
                                    <td data-title="Data Cadastro" style="text-align: center">
                                        {{ date('d/m/Y', strtotime($registro->data_cadastro)) }}</td>
                                    <td data-title="Titulo" style="text-align: center">{{ $registro->titulo }}</td>
                                    <td data-title="Editora" style="text-align: center">{{ $registro->editora->nome }}</td>
                                    <td data-title="Ação" style="text-align: center">
                                        <a class="btn btn-info btn-sm"
                                            href="{{ url('/livro/alterar', $registro->id) }}"><i
                                                class="fa fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ url('/livro/deletar', $registro->id) }}"><i
                                                class="fa fa-trash"></i>
                                        </a>
                                        <a class="btn btn-info btn-sm"
                                            href="{{ url('/livro/consultar', $registro->id) }}"><i
                                                class="fa fa-address-book"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $registros->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
