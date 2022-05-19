@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Lista de Permissões para {{ $role->nome }}</i>
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
            <form action=" {{ url('/role/permissao/salvar') }}" method="POST">  
                @csrf
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group form form-inline">
                        <label class="control-label col-sm-1">Papel:</label> <input type="text"
                            class="form-control col-sm-9" id="nomeShow" name="nomeShow" value="{{ $role->nome }}"
                            disabled />
                    </div>
                    
                </div>
                <div class="tile">
                    <div class="tile-body">
                        <div id="no-more-tables">
                            <table class="table table-stripped table-bordered table-hover cf">
                                <thead class="cf">
                                    <tr>
                                        <th style="font-weight: bold; text-align: center;">Recurso</th>
                                        <th style="font-weight: bold; text-align: center;">Selecione o Recurso</th>
                                        @foreach ($acoes as $acao)
                                        <td style="font-weight: bold; text-align: center;">
                                            {{ $acao->nome }}</option>
                                        </td>
                                        @endforeach 
                                        <th style="font-weight: bold; text-align: center;">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registros as $registro)
                                         <tr>
                                            <td data-title="Permissão" style="text-align: center">{{ $registro->nome }}</td>
                                            <td style="font-weight: bold; text-align: center; ">
                                                <input type="checkbox" name="permission[]" value="{{ $registro->id }}"
                                                @if( $registro->existePermissao($registro->id)) checked @endif  />
                                            </td>
                                            @foreach ($acoes as $acao)
                                                <td style="font-weight: bold; text-align: center;">
                                                    <input type="checkbox" class="form-check-input" value="{{ $acao->id }}" name="{{ $registro->id }}_acao[]" 
                                                    @if ( $acao->existePermissaoAction($registro->id, $acao->id)) checked @endif/>
                                                </td>
                                            @endforeach 
  
                                            <td data-title="Remover" style="text-align: center">
                                                <a class="btn btn-info btn-sm"
                                                      href="{{ url('/role/permissao/alterar', [ $role->id, $registro->id, $acoes]) }}"><i
                                                    class="fa fa-trash"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ url('/role/permissao/deletar', [ $role->id, $registro->id, $acoes]) }}"><i
                                                    class="fa fa-trash"></i>
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
                <input type="hidden" id="role_id" name="role_id" value="{{ $role->id }}"/>
                <div class="center">
                    <button type="submit" class="btn btn-primary btn-lg">Salvar Dados do Papel</button>
                    <a href="{{ url('/role/cancelar') }}" class="btn btn-secondary btn-lg ml-3">
                        Cancelar Inclusão da Permissão
                    </a>
                </div>
            </form>
        </div>

    </div>
@endsection
