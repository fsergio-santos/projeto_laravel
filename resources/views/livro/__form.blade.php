@include('layouts.validacao')
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="ano_edicao" class="control-label">Ano Edição:</label>
            <input type="text" name="ano_edicao" id="ano_edicao"
                value="{{ isset($registro->ano_edicao) ? $registro->ano_edicao : '' }}"
                class="form-control @error('ano_edicao') is-invalid @enderror " />
            @error('ano_edicao')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="data_cadastro" class="control-label">Data Cadastro:</label>
            <input type="text" name="data_cadastro" id="data_cadstro"
                value="{{ isset($registro->data_cadastro) ? date('d/m/Y', strtotime($registro->data_cadastro)) : '' }}"
                class="form-control @error('data_cadastro') is-invalid @enderror " />
            @error('data_cadastro')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="titulo" class="control-label">Titulo:</label>
            <input type="text" name="titulo" id="titulo" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}"
                class="form-control @error('titulo') is-invalid @enderror " />
            @error('titulo')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="author_id">Autor:</label>
            <select class="form-control" name="author_id" required>
                @foreach ($authores as $author)
                    <option value="{{ $author->id }}">{{ $author->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="editora_id">Editora:</label>
            <select class="form-control" name="editora_id" required>
                @foreach ($editoras as $editora)
                    <option value="{{ $editora->id }}">{{ $editora->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
