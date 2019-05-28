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
		                  <b>Edad:</b> <a class="pull-right">{{ Carbon\Carbon::parse($employee->birthday)->age }}</a>
		                </li>
                    <li class="list-group-item">
                      <b>Tipo:</b> <a class="pull-right">{{ $employee->type }}</a>
                    </li>
		            </ul>



              	</div>

              	<div class="col-md-6">
              		
              		<ul class="list-group list-group-unbordered">
		                <li class="list-group-item">
		                  <b>Fecha de Admision:</b> <a class="pull-right">{{ $employee->date_admission }}</a>
		                </li>
		                <li class="list-group-item">
		                  <b>Sexo:</b> <a class="pull-right">{{ $employee->sex == true ? "M" : "F" }}</a>
		                </li>
		                <li class="list-group-item">
		                  <b>Afiliado:</b> <a class="pull-right">{{ $employee->affiliate == true ? 'Si' : 'No' }}</a>
		                </li>
                    <li class="list-group-item">
                      <b>SAP:</b> <a class="pull-right">{{ $employee->sap}}</a>
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
              <h3 class="box-title">Mas informacion</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <hr>
              
              <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>

              <p class="text-muted">{{ $employee->location }}</p>

              <hr>

              <strong><i class="fa fa-envelope margin-r-5"></i> Emails</strong>

              @forelse($employee->emails as $email)
              <p>
                <span class="label label-primary">{{$email->email}}</span>
              </p>
              @empty
              <p>Sin emails</p>
              @endforelse

              <hr>

              <strong><i class="fa fa-phone margin-r-5"></i> Telefonos</strong>

              @forelse($employee->phones as $phone)
              <p>
                <span class="label label-info">{{$phone->phone}}</span>
              </p>
              @empty
              <p>Sin Telefono</p>
              @endforelse

              <hr>

              <strong><i class="fa fa-phone margin-r-5"></i> Roles</strong>

              @forelse($employee->secretaries as $secretary)
              <p>
                <span class="label label-warning">{{$secretary->description}}</span>
              </p>
              @empty
              <p>Sin roles</p>
              @endforelse

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->

@endsection