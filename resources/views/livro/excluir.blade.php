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
                        <button type="button" id="showModal" class="btn btn-primary btn-lg">Excluir Dados do Livro</button>
                        <a href="{{ url('/livro/cancelar') }}" class="btn btn-secondary btn-lg ml-3">
                            Cancelar Exclusão do Livro
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-danger fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirme a Exclusão do Registro!</h4>
                </div>
                <form action="{{ url('/livro/excluir', $registro->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p class="text-center">
                            Você tem certeza do que está fazendo?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCancel" class="btn btn-success" data-dismiss="modal">Não,
                            Cancelar</button>
                        <button type="submit" class="btn btn-danger">Sim, Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $("#showModal").click(function() {
            $("#myModal").modal();
        });
        $('#btnCancel').click(function() {
            window.location = "{{ url('/livro/listar') }}"
        })

    </script>
@endsection
