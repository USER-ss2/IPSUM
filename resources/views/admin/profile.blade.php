@extends('adminlte::page')

@section('title', 'IPSUM')


@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
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
              <h3 class="card-title">Modifier les Données </h3>
            </div>
            <div class="col-md-5"> @if(session('error'))
                <br><br>
                <div class="alert alert-danger alert-dismissible">
                    <h5>
                        <i class="icon fas fa-ban"> Alert!</i>
                    </h5>
                    {{ session('error')}}

                </div>
                @endif
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action=" {{URL::to('/admin/update_user/'.$edit->id)}}" method="POST">
                @csrf
              <div class="card-body">
                <div class="form-group">

                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$edit->name}}">
                    <span class=" alert text-danger">
                        @error('name')
                        {{$message}}

                        @enderror
                    </span>

                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{$edit->email}}">
                  <span class=" alert text-danger">
                    @error('email')
                    {{$message}}

                    @enderror
                </span>

                </div>

                <div class="form-group">
                  <label for="profile">Profile</label>
                  <select class="custom-select form-control-border" id="profile" name="profil" >
                    <option value='Administrateur' {{'Administrateur' == $edit->profil ? 'selected' : ''}}>Administrateur</option>
                    <option value='Superviseur Fixe' {{'Superviseur Fixe' == $edit->profil ? 'selected' : ''}}>Superviseur Fixe</option>

                  </select>
                </div>

              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div></div></div>

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Changer Le Mot de Passe</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="col-md-5">
                 @if(session('error'))
                <br><br>
                <div class="alert alert-danger alert-dismissible">
                    <h5>
                        <i class="icon fas fa-ban"> Alert!</i>
                    </h5>
                    {{ session('error')}}

                </div>
                @endif
              </div>
              <form action=" {{URL::to('/admin/changePassword/'.$edit->id)}}" method="POST">
                  @csrf
                <div class="card-body">
                  <div class="form-group">

                      <label for="CurrPass">Current Password</label>
                      <input type="password" class="form-control" id="CurrPass" name="CurrPass" placeholder="Enter Current Password" >
                      <span class=" alert text-danger">
                        @error('CurrPass')
                        {{$message}}

                        @enderror
                    </span>
                    </div>
                  <div class="form-group">
                    <label for="NewPass">New Password</label>
                    <input type="password" class="form-control" id="NewPass" placeholder="Enter New Password" name="NewPass" >
                    <span class=" alert text-danger">
                        @error('NewPass')
                        {{$message}}

                        @enderror
                    </span>
                  </div>

                  <div class="form-group">
                    <label for="ConfirmPass">Confirm New Password</label>
                    <input type="password" class="form-control" id="ConfirmPass" placeholder="Confirm New Password" name="ConfirmPass" >
                    <span class=" alert text-danger">
                        @error('ConfirmPass')
                        {{$message}}

                        @enderror
                    </span>


                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div></div></div>


    </section>
@stop

@section('css')
<link rel=" icon" type="icon" href="vendor/adminlte/dist/img/logo_p.png" />

    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')



@stop
