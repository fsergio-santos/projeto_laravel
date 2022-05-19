@extends('layouts.sec')

@section('content')
    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Registro de Usuários</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('/login') }}">Login</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="tile-body">
                <div class="container">
                    @include('layouts.alert')
                </div>
                <form method="POST" action="{{ url('/usuario/registrar') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Nome:</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail:</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="sexo" class="col-md-4 col-form-label text-md-right ">Sexo:</label>
                        <div class="col-md-6">
                            <select type="text" name="sexo" id="sexo"
                                class="form-control @error('sexo') is-invalid @enderror ">
                                <option value="">Selecione o Sexo</option>
                                <option value="F">Feminino</option>
                                <option value="M">Masculino</option>
                            </select>
                            @error('sexo')
                            <div class="invalid-feedback">
                                <span><strong>{{ $message }}</strong></span>
                            </div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Senha:</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password">

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
                            <input id="password-confirm" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" autocomplete="new-password">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button type="submit" class="btn btn-primary">
                            Registrar Usuário
                        </button>
                    </div>

                </form>
            </div>

        </div>

    </div>
@endsection
