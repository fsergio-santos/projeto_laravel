@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Lista de Autores</i>
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
            <div class="tile">
                <div class="tile-body">
                    <form class="form form-inline" action="{{ url('/author/buscar') }}" method="POST">
                        @csrf
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label col-sm-1">Nome:</label> <input type="text"
                                    class="form-control col-sm-9" id="nome" name="nome"
                                    placeholder="Digite um nome para pesquisar" value="{{ $filters['nome'] ?? '' }}" />
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">
                                        Pesquisar <i class="fa fa-search-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="tile">
                <div class="tile-body">
                    <div id="no-more-tables">
                        <table class="table table-stripped table-bordered table-hover cf">
                            <thead class="cf">
                                <tr>
                                    <th style="font-weight: bold; text-align: center;">Id</th>
                                    <th style="font-weight: bold; text-align: center;">Nome</th>
                                    <th style="font-weight: bold; text-align: center;">Data Nascimento</th>
                                    <th style="font-weight: bold; text-align: center;">E-mail</th>
                                    <th style="font-weight: bold; text-align: center;">Celular</th>
                                    <th style="font-weight: bold; text-align: center;">Fixo</th>
                                    <th style="font-weight: bold; text-align: center;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registros as $registro)

                                    <tr>
                                        <td data-title="Id" style="text-align: center">{{ $registro->id }}</td>
                                        <td data-title="Nome" style="text-align: center">
                                            <a href="{{url('/author/livros', $registro->id )}}">{{ $registro->nome }}</a>                                        
                                        </td>
                                        <td data-title="Data Nascimento" style="text-align: center">
                                            {{ date('d/m/Y', strtotime($registro->data_nascimento)) }}</td>
                                        <td data-title="E-mail" style="text-align: center">{{ $registro->email }}</td>
                                        <td data-title="Celular" style="text-align: center">
                                            {{ $registro->telefone_celular }}
                                        </td>
                                        <td data-title="Fixo" style="text-align: center">{{ $registro->telefone_fixo }}</td>
                                        <td data-title="Ação" style="text-align: center">
                                            <a class="btn btn-info btn-sm"
                                                href="{{ url('/author/alterar', $registro->id) }}"><i
                                                    class="fa fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ url('/author/deletar', $registro->id) }}"><i
                                                    class="fa fa-trash"></i>
                                            </a>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ url('/author/consultar', $registro->id) }}"><i
                                                    class="fa fa-address-book"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @if (isset($filters))
                            {{ $registros->appends($filters)->links() }}
                        @else
                            {{ $registros->links() }}
                        @endif
                        <a class="btn btn-success btn-sm" href="{{ url('/author/incluir') }}">Incluir
                            <i class="fa fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
