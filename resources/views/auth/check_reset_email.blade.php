@extends('layouts.sec')

@section('content')
<div class="container">
        <div class="app-title">
				<h1>
					<i class="fa fa-edit">Alterar Senha</i>
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
                    <form method="POST" action="{{ url('/usuario/recuperar/senha')}}">
                        @csrf
                       <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                             <div class="tile-footer">
                                <button type="submit" class="btn btn-primary">
                                    Alterar Senha
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