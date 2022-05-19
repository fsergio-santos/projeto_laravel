@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Cadastro de Autor</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/author/listar') }}">Pesquisa
                        de Autores</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">
                <form>
                    @include('author.__form')
                    <div class="center">
                        <a href="{{ url('/author/cancelar') }}" class="btn btn-secondary btn-lg">
                            Cancelar Consulta do Autor
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
            window.location = "{{ url('/author/listar') }}"
        })

    </script>
@endsection
