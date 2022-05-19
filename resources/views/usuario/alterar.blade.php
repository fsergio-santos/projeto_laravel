@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Cadastro de Usuário</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ url('/usuario/listar')}}">Pesquisa
                        de Usuário</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">
                <div class="container">
                    @include('layouts.alert')
                </div>
                <form >
                    @csrf
                    @include('usuario.__form')
                    <div class="center">
                    <button type="button" id="showModal" class="btn btn-primary btn-lg">
                        Alterar Dados do Usuário
                    </button>
                    <a href="{{ url('/usuario/cancelar') }}" class="btn btn-secondary ml-3 btn-lg">
                        Cancelar Alteração do Usuário
                    </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-success modal-save" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center">Confirme a Alteração do Registro!</h4>
                </div>
                <form action="{{ url('/usuario/atualizar', $registro->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p class="text-center">
                            Você tem certeza do que está fazendo?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnCancel" class="btn btn-success" data-dismiss="modal">Não, Cancelar</button>
                        <button type="submit" class="btn btn-danger">Sim, Alterar</button>
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
		$('#btnCancel').click(function(){
			window.location = "{{ url('/usuario/listar')}}"
		})

 	</script>		
@endsection
