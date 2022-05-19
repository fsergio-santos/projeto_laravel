@extends('layouts.app')

@section('content')
 <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Lista de Usuários</i>
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
                    <form class="form form-inline" action="{{ url('/usuario/buscar') }}" method="POST">
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
                    <form>
                        <select id="selectPage">
                            <option value="5"  @if($items == 5) selected @endif >5</option>
                            <option value="10" @if($items == 10) selected @endif >10</option>
                            <option value="25" @if($items == 25) selected @endif >25</option>
                        </select>
                    </form>
                    <div id="no-more-tables">
                        <table class="table table-stripped table-bordered table-hover cf">
                            <thead class="cf">
                                <tr>
                                    <th style="font-weight: bold; text-align: center;">Foto</th>
                                    <th style="font-weight: bold; text-align: center;">@sortablelink('id')</th>
                                    <th style="font-weight: bold; text-align: center;">@sortablelink('Name')</th>
                                    <th style="font-weight: bold; text-align: center;">E-mail</th>
                                    <th style="font-weight: bold; text-align: center;">Ações</th>
                                    <th style="font-weight: bold; text-align: center;">Papel</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registros as $registro)

                                    <tr>
                                        <td data-title="Foto">
                                            <img src="{{ url('/imagem', $registro->profile_pic) }}" class="imgthumbnail" />
                                        </td>     
                                        <td data-title="Id" style="text-align: center">{{ $registro->id }}</td>
                                        <td data-title="Ano Edição" style="text-align: center">{{ $registro->name}}</td>
                                        <td data-title="Titulo" style="text-align: center">{{ $registro->email }}</td>
                                         <td data-title="Ação" style="text-align: center">
                                            <a class="btn btn-info btn-sm"
                                                href="{{ url('/usuario/alterar', $registro->id) }}"><i
                                                    class="fa fa-pencil"></i>
                                            </a>
                                            @if ( auth::user()->id == $registro->id )
                                                <a class="btn btn-danger btn-sm isDisabled disabled" 
                                                    aria-disabled="true"
                                                    href="{{ url('/usuario/deletar', $registro->id) }}"><i
                                                        class="fa fa-trash" ></i>
                                                </a>
                                            @endif
                                            @if ( auth::user()->id != $registro->id )
                                                <a class="btn btn-danger btn-sm " 
                                                    href="{{ url('/usuario/deletar', $registro->id) }}"><i
                                                    class="fa fa-trash"></i>
                                                </a>
                                            @endif 
                                            <a class="btn btn-info btn-sm"
                                                href="{{ url('/usuario/consultar', $registro->id) }}"><i
                                                    class="fa fa-address-book"></i>
                                            </a>
                                        </td>
                                        <td data-title="Papel" style="text-align: center">
                                            <a class="btn btn-info btn-sm"
                                                href="{{ url('/usuario/role', $registro->id) }}"><i
                                                    class="fa fa-plus-circle"></i>
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
                        <a class="btn btn-success btn-lg " href="{{ url('/usuario/incluir') }}">Incluir Novos Usuários
                            <i class="fa fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
