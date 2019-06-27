@extends('layouts.app')
@section('content')

<!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Editar Fecha</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
            <form action="{{ route('ductions.date.update') }}" method="post">
             


              <div class="row">

                <div class="col-md-6">
                  
                  <div class="form-group">
                      
                      <label>Fecha</label>

                      <input class="form-control" type="date" name="date">

                    </div>

                </div>
                                
              </div>

             
              

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

