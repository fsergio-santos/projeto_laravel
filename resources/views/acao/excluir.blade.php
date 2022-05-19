@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Cadastro de Ações para Permissão</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/acao/listar') }}">Pesquisa
                        de Ações para Permissões</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">
                <form>
                    @include('acao.__form')
                    <div class="center">
                        <button type="button" class="btn btn-danger btn-lg" id="showModal">Excluir Dados da
                        Ação</button>
                        <a href="{{ url('/acao/cancelar') }}" class="btn btn-secondary ml-3 btn-lg">
                            Cancelar Exclusão da Ação
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal modal-danger fade" id="myModal" tabindex="-1" acao="dialog">
        <div class="modal-dialog" acao="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirme a Exclusão do Registro!</h4>
                </div>
                <form action="{{ url('/acao/excluir', $registro->id) }}" method="POST">
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
            window.location = "{{ url('/acao/listar') }}"
        })

    </script>
@endsection
