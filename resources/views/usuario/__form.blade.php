@include('layouts.validacao')
<div class="row">
    <div class="col-sm-4">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div id="drop-zone">
                        <div id="fotoBanco">
                            <input type="hidden" id="profile_pic" name="profile_pic">
                            @if (isset($registro->profile_pic))
                                <img src="{{ url('/imagem', $registro->profile_pic) }}" class="avatar" />
                            @else
                                <img id="imageUpload" src="{{ url('/imagem', 'boy.png') }}" class="avatar" />
                            @endif
                        </div>
                        <div id="clickHereLeft" style="float:left;">
                            <input type="file" accept=".jpg,.jpeg,.png" id="fileInput"
                                class="form-control hide btn-responsive">
                            <div style="text-align: center;">
                                <label for="fileInput"><i class="fa fa-upload fa-lg" aria-hidden="true"></i></label>
                            </div>
                        </div>
                        <div id="clickHereRight" style="float:right;">
                            <input type="button" id="fileExcluir" class="form-control hide btn-responsive">
                            <div style="text-align: center;">
                                <label for="fileExcluir"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name" class="control-label">Nome:</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ isset($registro->name) ? $registro->name : '' }}" autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="email" class="control-label">E-Mail:</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ isset($registro->email) ? $registro->email : '' }}" autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="sexo" class="control-label">Sexo:</label>
                    <select type="text" name="sexo" id="sexo" class="form-control @error('sexo') is-invalid @enderror ">
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
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="password" class="control-label">Senha:</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="password-confirm" class="control-label">Confirme Senha:</label>
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
        </div>
    </div>
</div>
        @section('javascript')
            <script>
                $("#showModal").click(function() {
                    $("#myModal").modal();
                });
                $('#btnCancel').click(function() {
                    window.location = "{{ url('/usuario/listar') }}"
                });

            </script>
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#fileInput").change(function(event) {
                    event.preventDefault();
                    enviarFoto(this);
                });


                $('#fileExcluir').click(function(event) {
                    event.preventDefault();
                    excluirFoto();
                });

                function enviarFoto(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        var filename = $("#fileInput").val();
                        filename = filename.substring(filename.lastIndexOf('\\') + 1);
                        reader.onload = function(e) {
                            $('#imageUpload').attr('src', e.target.result);
                            $('#imageUpload').hide();
                            $('#imageUpload').fadeIn(500);
                        }
                        reader.readAsDataURL(input.files[0]);
                        sendToServer(input.files[0]);
                    }

                }


                function sendToServer(inputFoto) {
                    var formData = new FormData();
                    formData.append("image", inputFoto);
                    $.ajax({
                        url: "{{ route('imagem.store') }}",
                        method: 'POST',
                        data: formData,
                        datatype: 'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response.nomeArquivo);
                            $("#profile_pic").val(response.nomeArquivo);
                        },
                        error: function(data) {
                            alert(data);
                        },
                    });

                }


                function excluirFoto() {
                    var formData = new FormData();
                    $.ajax({
                        url: "{{ route('imagem.excluir') }}",
                        type: 'POST',
                        data: {
                            myfoto: $('#profile_pic').val(),
                        },
                        beforeSend: function(request) {
                            return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr(
                                'content'));
                        },
                        success: function(response) {
                            $('#profile_pic').val('');
                            document.getElementById("imageUpload").src = "{{ url('/imagem', 'boy.png') }}";
                            $('#profile_pic').val('boy.png');
                        },
                        error: function(data) {
                            document.getElementById("imageUpload").src = "{{ url('/imagem', 'boy.png') }}";
                            $('#profile_pic').val('boy.png');
                        },
                    });
                }

            </script>
        @endsection
