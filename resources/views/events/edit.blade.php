@extends('layouts.app')
@section('content')

<!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Editar Evento</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
            <form action="{{ route('event.administrator.update',$event->id) }}" method="post">
              
              <div class="row">
                
                <div class="col-md-12">
                  <label>Nombre:</label>

                  <input class="form-control" type="" name="name" value="{{ old('name') ? old('name') : $event->title  }}" required placeholder="Ingrese un Nombre">

                  @error('name')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

              </div>

              <div class="row">
                
                <div class="col-md-6">

                  <label>Fecha de inicio:</label>
                  
                  <input class="form-control" name="start_date" type="date" placeholder="Fecha de inicio" required value="{{ old('start_date') ? old('start_date') : $event->start_date }}">

                  @error('password')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror


                </div>

                <div class="col-md-6">

                  <label>Fecha de final:</label>
                  
                  <input class="form-control" type="date" name="end_date" placeholder="Confirme su contraseña" required value="{{ old('end_date') ? old('end_date') : $event->end_date }}">

                </div>

                @csrf

                @method('PUT')

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