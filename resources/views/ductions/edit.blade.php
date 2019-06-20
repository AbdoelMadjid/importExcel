@extends('layouts.app')
@section('content')

<!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Editar Empleado</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
            <form action="{{ route('ductions.update',$employee->id) }}" method="post">
              
              <div class="row">
                
                <div class="col-md-12">
                  <label>Nombre:</label>

                  <input class="form-control" type="" name="name" value="{{ old('name') ? old('name') : $employee->name  }}" required readonly placeholder="Ingrese un Nombre">

                  @error('name')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

              </div>

              

                <div class="form-group ">
                   
                   @foreach($ductions as $duction)
                   
                     <div class="checkbox">
                   
                      <label>
                   
                        <input id="checkbox-{{ $duction->id }}" type="checkbox" name="ductions[]" class="required_group" value="{{$duction->id}}" >
                        
                        {{$duction->description}}
                   
                      </label>
                      
                      <div class="row">
                        
                        <div class="col-md-6">
                          <input class="form-control" type="text" name="import[]" placeholder="importe {{ $duction->description }}" value="{{ is_null($employee->ductions->where('id',$duction->id)->first()) ? "" : $employee->ductions->where('id',$duction->id)->first()->pivot->import }}">
                        </div>

                      </div>
                      
                    </div>                 
                   
                   @endforeach
                    

                      <div class="row">
                        
                        <div class="col-md-6">
                          
                          <div class="form-group">

                            <label>Fecha de inicio</label>
                            <input class="form-control" type="date" name="start_date" value="{{ $employee->start_date }}" required>

                             @error('start_date')
                    
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>

                            @enderror
                            
                          </div>
                          
                        </div>

                      </div>                
                
                

              </div>

              @csrf

              @method('PUT')

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

@section('scripts')

<script type="text/javascript">
  
@forelse($employee->ductions as $duction)
 
  $('#checkbox-{{$duction->id}}').prop('checked', true);

@empty


@endforelse

</script>

@endsection

