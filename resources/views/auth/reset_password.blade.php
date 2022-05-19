@extends('layouts.sec')

@section('content')
<div class="container">
        <div class="app-title">
				<h1>
					<i class="fa fa-edit">Registro de Usuários</i>
				</h1>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
					<li class="breadcrumb-item"></li>
				</ul>
			</div>
            <div class="tile">
				<div class="tile-body">
                    <div class="container">
                        @include('layouts.alert')
                    </div>
                    <form method="POST" action="{{ url('/usuario/reset/senha')}}">
                        @csrf
                        <input name="reset_token" type="hidden" value="{{app('request')->input('token')}}">
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Senha:</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirme Senha:</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="tile-footer">
                                <button type="submit" class="btn btn-primary">
                                    Salvar
                                </button>
                        </div>
                    </form>
                    </div>
			     </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
