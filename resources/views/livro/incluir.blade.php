'@extends('layouts.app')
@section('content')
		<div class="container">
			<div class="app-title">
				<h1>
					<i class="fa fa-edit">Cadastro de Livros</i>
				</h1>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="{{ url('/livro/listar')}}">Pesquisa
							de Livros</a></li>
				</ul>
			</div>
			<div class="tile">
				<div class="tile-body">
					<form action=" {{ url('/livro/salvar') }}" method="POST" >
						@csrf
						@include('livro.__form')
						<div class="tile-footer">
							<button type="submit" class="btn btn-primary">Salvar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
@endsection'