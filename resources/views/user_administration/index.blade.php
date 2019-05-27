@extends('layouts.app')
@section('content')

      @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
      @endif

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
                  <th></th>
                  <th>Permisos</th>
                </tr>
                @forelse($users as $user)

	                <tr>
	                  <td>{{ $user->id }}</td>
	                  <td>{{ $user->name }}</td>
	                  <td>{{ $user->email }}</td>
	                  <td><a class="btn btn-primary" href="{{ route('user.administrator.edit',$user->id) }}"> <span class="fa fa-pencil"></span> </a></td>
	                  
                    @if(is_null($user->deleted_at))
                    <td>
                    <form action="{{ route('user.administrator.destroy',$user->id) }}" method="POST">
                      @csrf
                      @method('DELETE')


                      <button class="btn btn-danger" type="submit"> <span class="fa fa-trash"></span></button>
                    
                    </form>
                    
                    </td>
                    @else


                    <td><a class="btn btn-success" href="{{ route('user.administrator.restore',$user->id) }}"> <span class="fa fa-recycle"></span></td>

                    @endif
                    

                    @if($user->hasPermissionTo('create'))
                      <td><a class="btn btn-danger" href="{{ route('delete.permission',[$user->id,'create']) }}"> <span class="fa fa-plus"></span></td>
                    @else
                      <td><a class="btn btn-success" href="{{ route('add.permission',[$user->id,'create']) }}"> <span class="fa fa-plus"></span></td>
                    @endif


                    @if($user->hasPermissionTo('edit'))
                      <td><a class="btn btn-danger" href="{{ route('delete.permission',[$user->id,'edit']) }}"> <span class="fa fa-pencil"></span></td>
                    @else
                      
                      <td><a class="btn btn-success" href="{{ route('add.permission',[$user->id,'edit']) }}"> <span class="fa fa-pencil"></span></td>
                    @endif


                    @if($user->hasPermissionTo('delete'))
                      <td><a class="btn btn-danger" href="{{ route('delete.permission',[$user->id,'delete']) }}"> <span class="fa fa-trash"></span></td>
                    @else
                      <td><a class="btn btn-success" href="{{ route('add.permission',[$user->id,'delete']) }}"> <span class="fa fa-trash"></span></td>
                    @endif                    
                    
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