@extends('layouts.app')
@section('content')

<!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Crear Empleados</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
            <form action="{{ route('employee.store') }}" method="post">
              
              @csrf

              <div class="row">
                
                <div class="col-md-6">
                  <label>Cedula:</label>

                  <input class="form-control" type="" name="cedula" value="{{ old('cedula')  }}" required placeholder="Cedula">

                  @error('cedula')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  
                  <label>Nombre:</label>

                  <input class="form-control" type="text" name="name" value="{{ old('name')  }}" required placeholder="Ingrese un Nombre">

                  @error('name')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

              </div>

              <div class="row">
                
                <div class="col-md-6">

                  <label>Fecha de Admision:</label>
                  
                  <input class="form-control" name="date_admission" type="date" required value="{{ old('date_admission') }}">

                  @error('date_admission')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror


                </div>

                <div class="col-md-6">

                  <label>Fecha de nacimiento:</label>
                  
                  <input class="form-control" type="date" name="birthday" value="{{ old('birthday') }}" required>

                  @error('birthday')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                @csrf

              </div>

               <div class="row">
                
                <div class="col-md-6">
                  <label>Sexo:</label>

                  <select class="form-control" name="sex" required>
                   
                    <option value="1">Mascuino</option>
                   
                    <option value="0">Femenino</option>
                  
                  </select>

                  @error('sex')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  
                  <label>Tipo:</label>

                  <input class="form-control" type="text" name="type" value="{{ old('type')  }}" required placeholder="Ingrese un tipo">

                  @error('type')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

              </div>

              <div class="row">
                
                <div class="col-md-6">
                  <label>Costo:</label>

                  <input class="form-control" type="text" name="cost" value="{{ old('cost') }}" required>

                  @error('cost')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  
                  <label>Descripción costo:</label>

                  <input class="form-control" type="text" name="cost_description" value="{{ old('cost_description')  }}" required>

                  @error('cost_description')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

              </div>

              <div class="row">
                
                <div class="col-md-6">
                  <label>SAP:</label>

                  <input class="form-control" type="text" name="sap" value="{{ old('sap') }}" required>

                  @error('sap')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  
                  <label>Descripción sap:</label>

                  <input class="form-control" type="text" name="sap_description" value="{{ old('sap_description')  }}" required>

                  @error('sap_description')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

              </div>

              <div class="row">
                
                <div class="col-md-6">
                  <label>Puesto:</label>

                  <input class="form-control" type="text" name="job" value="{{ old('job') }}" required>

                  @error('job')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  
                  <label>Descripción job:</label>

                  <input class="form-control" type="text" name="job_description" value="{{ old('job_description')  }}" required>

                  @error('job_description')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

              </div>

              <div class="row">
                
                <div class="col-md-6">
                  <label>Ubicación:</label>

                  <input class="form-control" type="text" name="location" value="{{ old('location') }}" required>

                  @error('location')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  <label>Afiliado:</label>

                  <select class="form-control" name="affiliate">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>

                  @error('affiliate')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

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