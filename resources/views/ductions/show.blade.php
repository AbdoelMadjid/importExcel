@extends('layouts.app')
@section('content')

<!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Editar Empleados {{ $duction->description }}</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
            <form action="{{ route('ductions.massive.update',$duction->id) }}" method="post">
             
              @if($duction->description == 802)

              <div class="row">

                <div class="col-md-6">
                  
                  <div class="form-group">
                      
                      <label>Porcentaje</label>

                      <input class="form-control" type="number" name="porcentaje">

                    </div>

                </div>
                                
              </div>

              @else

              <div class="row">

                <div class="col-md-6">
                  
                  <div class="form-group">
                      
                      <label>Importe</label>

                      <input class="form-control" type="number" name="import">

                    </div>

                </div>
                                
              </div>

              @endif
              

              @csrf


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

