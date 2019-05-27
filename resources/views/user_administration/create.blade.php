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
              
            <form action="{{ route('user.administrator.store') }}" method="post">
              
              <div class="row">
                
                <div class="col-md-6">
                  <label>Nombre:</label>

                  <input class="form-control" type="" name="name" value="{{ old('name')  }}" required placeholder="Ingrese un Nombre">

                  @error('name')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  
                  <label>Email:</label>

                  <input class="form-control" type="email" name="email" value="{{ old('email')  }}" required placeholder="Ingrese un Email">

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
                  
                  <input class="form-control" name="password" type="password" placeholder="Ingrese una Contraseña" required>

                  @error('password')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror


                </div>

                <div class="col-md-6">

                  <label>Confirmar contraseña:</label>
                  
                  <input class="form-control" type="password" name="password_confirmation" placeholder="Confirme su contraseña" required>

                </div>

                @csrf

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