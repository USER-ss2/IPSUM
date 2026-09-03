@extends('adminlte::page')

@section('title', 'Telecom')


@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Ajouter un utilisateur</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="users">Utilisateurs</a></li>
                    <li class="breadcrumb-item active">Ajouter</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@stop


@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Nouveau Utilisateur</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/admin/insert_user" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                    <span class=" alert text-danger">
                        @error('name')
                        {{$message}}

                        @enderror
                    </span>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" required>
                  <span class=" alert text-danger">
                    @error('email')
                    {{$message}}

                    @enderror
                </span>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required >
                  <span class=" alert text-danger">
                    @error('password')
                    {{$message}}

                    @enderror
                </span>

                </div>

                <div class="form-group">
                    <label for="InputConfirmPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="InputConfirmPassword1" placeholder="Password" name="confirm_password" required >
                    <span class=" alert text-danger">
                      @error('confirm_password')
                      {{$message}}

                      @enderror
                  </span>

                  </div>

                <div class="form-group">
                  <label for="profile">Profile</label>
                  <select class="custom-select form-control-border" id="profile" name="profil" required>
                    <option value='Administrateur'>Administrateur</option>
                    <option value='Superviseur Fixe'>Superviseur Fixe</option>

                  </select>
                </div>

              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div></div></div></section>


@stop

@section('css')
<link rel=" icon" type="icon" href="vendor/adminlte/dist/img/LOGO.png" />



@stop
@section('js')


@stop
