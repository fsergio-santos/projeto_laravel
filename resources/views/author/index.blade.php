@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="app-title">
            <h1>
                <i class="fa fa-edit">Lista de Autores</i>
            </h1>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Menu Principal</a></li>
            </ul>
        </div>
        <div class="container">
            @include('layouts.alert')
        </div>

        <div class="tile">
            <div class="tile-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="table_author"
                            class="table table-stripped table-bordered table-hover display nowrap"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nome</th>
                                    <th>Data Nascimento</th>
                                    <th>Email</th>
                                    <th>Celular</th>
                                    <th>Fixo</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <a class="btn btn-success btn-lg" href="{{ url('/author/incluir') }}">Incluir Novo Autor
                            <i class="fa fa-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
@section('javascript')
    <script>
        moment.locale('pt-br');
        $(document).ready(function() {

            var table = $('#table_author').DataTable({

                processing: true,
                serverSide: true,
                responsive: true,
                lengthMenu: [5, 10, 15, 20, 25],
                ajax: '{{ url('/author/listar') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nome',
                        name: 'nome'
                    },
                    {
                        data: 'data_nascimento',
                        name: 'data_nascimento',
                        render: function(data_nascimento) {
                            return moment(data_nascimento).format('DD/MM/YYYY');
                        }
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'telefone_celular',
                        name: 'telefone_celular'
                    },
                    {
                        data: 'telefone_fixo',
                        name: 'telefone_fixo'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },

                ],
                language: {
                    url: '{{ asset('lib/js/datatable/Portuguese-Brasil.json') }}',
                },

            });

            table.draw();
            table.columns.adjust();
            table.responsive.recalc();

            $("#table_author thead").on('click', 'tr', function() {
                table.buttons().disable();
            });

            $("#table_author tbody").on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                    table.buttons().disable();
                } else {
                    $('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                    table.buttons().enable();
                }
            });
        });

    </script>

@endsection
