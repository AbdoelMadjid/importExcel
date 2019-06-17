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
              <h3 class="box-title">Lista de Eventos</h3>

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
                  <th>Fecha de Inicio</th>
                  <th>Fecha de Fin</th>
                  <th>Opciones</th>
                </tr>
                @forelse($events as $event)

	                <tr>
	                  <td>{{ $event->id }}</td>
	                  <td>{{ $event->title }}</td>
	                  <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>
	                  <td><a class="btn btn-primary" href="{{ route('event.administrator.edit',$event->id) }}"> <span class="fa fa-pencil"></span> </a></td>

                    <td>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger-{{ $event->id }}">
                        <span class="fa fa-trash"></span>
                      </button>                      
                    </td>

                     <!-- modal -->


                  <div class="modal modal-danger fade" id="modal-danger-{{ $event->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">¡Alerta!</h4>
                        </div>
                        <div class="modal-body">
                          <p>Esta seguro de que desea eliminar el registro de {{ $event->title }}?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>

                          <form id="delete-form-{{$event->id}}" action="{{ route('event.administrator.destroy',$event->id) }}" method="POST">
                            <button type="submit" class="btn btn-outline" onclick="event.preventDefault();
                            document.getElementById('delete-form-{{$event->id}}').submit();">Eliminar</button>
                         
                          @csrf
                          @method('DELETE')
                         
                         </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
	                                   
                    
	                </tr>

                @empty
                	<tr>	                  
	                  <td>Sin eventos</td>
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