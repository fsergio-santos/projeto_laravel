@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Lista de Papéis para {{ $user->name }}</i>
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
            <form action=" {{ url('/usuario/role/salvar') }}" method="POST">
                @csrf
                <div class="col-xs-12 col-sm-12">
                    <div class="form-group form form-inline">
                        <label class="control-label col-sm-1">Usuário:</label> <input type="text"
                            class="form-control col-sm-9" id="nomeShow" name="nomeShow" value="{{ $user->name }}"
                            disabled />
                    </div>
                </div>
                <div class="tile">
                    <div class="tile-body">
                        <div id="no-more-tables">
                            <table class="table table-stripped table-bordered table-hover cf">
                                <thead class="cf">
                                    <tr>
                                        <th style="font-weight: bold; text-align: center;">Papel</th>
                                        <th style="font-weight: bold; text-align: center;">Descrição</th>
                                        <th style="font-weight: bold; text-align: center;">Atribuída</th>
                                        <th style="font-weight: bold; text-align: center;">Remover</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registros as $registro)
                                        <tr>
                                            <td data-title="Papel" style="text-align: center">{{ $registro->nome }}</td>
                                            <td data-title="Descrição" style="text-align: center">{{ $registro->descricao }}
                                            </td>
                                            <td data-title="Atribuído" style="text-align: center">
                                                <input type="checkbox" class="form-check-input"
                                                    id="role_{{ $registro->id }}" value="{{ $registro->id }}"
                                                    name="registros[]" @if($user->roles->contains($registro)) checked @endif/>
                                            </td>
                                            <td data-title="Remover" style="text-align: center">
                                                @if($user->roles->contains($registro))
                                                    <a class="btn btn-danger btn-sm"
                                                         href="{{ url('/usuario/role/deletar', [ $user->id, $registro->id ]) }}"><i
                                                        class="fa fa-trash"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $registros->links() }}
                        </div>
                    </div>
                </div>
                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}"/>
                <div class="center">
                    <button type="submit" class="btn btn-primary btn-lg">Salvar Papéis do Usuário</button>
                    <a href="{{ url('/usuario/cancelar') }}" class="btn btn-secondary btn-lg ml-3">
                        Cancelar Inclusão do Papel
                    </a>
                </div>
            </form>
        </div>

    </div>
@endsection
