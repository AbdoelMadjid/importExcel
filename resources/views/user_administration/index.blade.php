@extends('layouts.app')
@section('content')

<!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Usuarios</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Opciones</th>
                </tr>
                @forelse($users as $user)

	                <tr>
	                  <td>{{ $user->id }}</td>
	                  <td>{{ $user->name }}</td>
	                  <td>{{ $user->email }}</td>
	                  <td><a class="btn btn-primary" href="{{ route('user.administrator.edit',$user->id) }}"> <span class="fa fa-pencil"></span> </a></td>
	                  <td><a class="btn btn-danger" href="#"> <span class="fa fa-trash"></span></td>
	                </tr>

                @empty
                	<tr>	                  
	                  <td>Sin usuarios</td>
	                </tr>
                @endempty                                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection