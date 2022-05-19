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
						<a href="{{ url('/usuario/cancelar') }}" class="btn btn-secondary btn-lg">
							Cancelar Cadastro do Usuário
						</a>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection
@section('javascript')
	<script type="text/javascript">
		$('#btnCancel').click(function(){
			window.location = "{{ url('/usuario/listar')}}"
		})
 	</script>		
@endsection