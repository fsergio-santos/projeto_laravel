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
							de Usuários</a></li>
				</ul>
			</div>
			<div class="tile">
				<div class="tile-body">
					<form >
						@include('usuario.__form')
						<div class="center">
						<button type="button" class="btn btn-danger btn-lg" id="showModal">Excluir Dados do Usuário</button>
						<a href="{{ url('/usuario/cancelar')}}" class="btn btn-secondary btn-lg ml-3">
							Cancelar Exclusão do Usuário
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
					<form action="{{ url('/usuario/excluir', $registro->id) }}" method="POST">
						@csrf
						<div class="modal-body">
							<p class="text-center">
								Você tem certeza do que está fazendo?
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" id="btnCancel" class="btn btn-success" data-dismiss="modal">Não, Cancelar</button>
							<button type="submit" class="btn btn-danger">Sim, Excluir</button>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection
