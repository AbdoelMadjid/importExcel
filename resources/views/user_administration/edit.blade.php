@extends('layouts.app')
@section('content')

<!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Editar Usuario</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
            <form action="{{ route('user.administrator.update',$user->id) }}" method="POST">

              @csrf

              @method('PUT')
              
              <div class="row">
                
                <div class="col-md-6">
                  <label>Nombre:</label>

                  <input class="form-control" type="text" name="name" value="{{ $user->name ? $user->name : old('name')  }}" required>

                  @error('name')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  
                  <label>Email:</label>

                  <input class="form-control" type="email" name="email" value="{{ $user->email ? $user->email : old('email')  }}" required>

                  @error('email')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

              </div>

              <div class="row">
                
                <div class="col-md-6">

                  <label>Contraseña:</label>
                  
                  <input class="form-control" name="password" type="password">

                  @error('password')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">

                  <label>Rol:</label>
                  
                  <input class="form-control" value="Rol" disabled>

                </div>

              </div>

              <div style="margin-top: 10px;">
              
                <button class="btn btn-success"> Guardar </button>
              
              </div>

            </form>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection