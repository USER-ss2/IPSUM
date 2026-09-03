@extends('adminlte::page')

@section('title', 'Telecom')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Utilisateurs</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Utilisateurs</li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')
    @include('sweetalert::alert')

    @php
        $heads = ['ID', 'Name', 'email', 'profile', 'crée à', 'modifié à', 'action'];
    @endphp
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class='card'>
                        <div class="card-body ">
                            <div style = "display: flex; justify-content: space-between;">
                                <div>Ajouter un Utilisateur</div>
                                <div class="input-group-prepend">
                                    <a href="/admin/add_user"><button type="button"
                                            class="btn btn-block btn-primary">Ajouter</button></a>
                                </div>
                            </div>
                            <!-- /btn-group -->

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Les utilisateurs existants</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <x-adminlte-datatable class="table table-bordered table-hover" id="table1" :heads="$heads">
                                @foreach ($users as $user)
                                    <tr>
                                        <input type="hidden" class="serdelete_val_id" value="{{ $user->id }}">

                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->profil }}</td>
                                        @if ($user->created_at === null)
                                            <td>_</td>
                                        @else
                                            <td>{{ $user->created_at }}</td>
                                        @endif

                                        @if ($user->updated_at === null)
                                            <td>_</td>
                                        @else
                                            <td>{{ $user->updated_at }}</td>
                                        @endif


                                        @if ($user->profil === 'Administrateur')
                                            <td>
                                                <div style="display: flex; justify-content: space-around;">
                                                    <div class="btn btn-info btn-sm disabled">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </div>
                                                    <div class="btn btn-danger btn-sm disabled">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Delete
                                                    </div>
                                                </div>

                                            </td>
                                        @else
                                            <td>
                                                <div style="display: flex; justify-content: space-around;">
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ URL::to('/admin/edit_user/' . $user->id) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-sm servideletebtn">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Delete
                                                    </button>
                                                </div>
                                        @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </x-adminlte-datatable>

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>

@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
<link rel=" icon" type="icon" href="vendor/adminlte/dist/img/LOGO.png" />
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<!--datatable!-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.servideletebtn').click(function(e) {
                e.preventDefault();
                var delete_id = $(this).closest("tr").find('.serdelete_val_id').val();


                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this Data!!",
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                "id": delete_id,
                            };

                            $.ajax({
                                type: "DELETE",
                                url: '/admin/delete_user/'+delete_id,
                                data: data,

                                success: function(response) {

                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });

                                }
                            });

                        }
                    });
            });

        });
    </script>


@stop
