@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Cadastro de Papel</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/role/listar') }}">Pesquisa
                        de Papéis</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">
                <form>
                    @include('role.__form')
                    <div class="center">
                        <a href="{{ url('/role/cancelar') }}" class="btn btn-secondary btn-lg">
                            Cancelar Consulta do Papel
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $('#btnCancel').click(function() {
            window.location = "{{ url('/role/listar') }}"
        })

    </script>
@endsection
