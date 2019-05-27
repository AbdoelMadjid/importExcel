@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $employee->name }}</h3>              
              <div class="row">
              	
              	<div class="col-md-6">
              		
              		<ul class="list-group list-group-unbordered">
		                <li class="list-group-item">
		                  <b>Cedula:</b> <a class="pull-right">{{ $employee->cedula }}</a>
		                </li>
		                <li class="list-group-item">
		                  <b>Fecha de Nacimiento:</b> <a class="pull-right">{{ $employee->birthday }}</a>
		                </li>
		                <li class="list-group-item">
		                  <b>Ubicacion:</b> <a class="pull-right">{{ $employee->location }}</a>
		                </li>
		            </ul>



              	</div>

              	<div class="col-md-6">
              		
              		<ul class="list-group list-group-unbordered">
		                <li class="list-group-item">
		                  <b>Fecha de Admision</b> <a class="pull-right">{{ $employee->date_admission }}</a>
		                </li>
		                <li class="list-group-item">
		                  <b>Following</b> <a class="pull-right">543</a>
		                </li>
		                <li class="list-group-item">
		                  <b>Friends</b> <a class="pull-right">13,287</a>
		                </li>
		            </ul>


              	</div>

              </div>              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>

              <p class="text-muted">{{ $employee->location }}</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->

@endsection