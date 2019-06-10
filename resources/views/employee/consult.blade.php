@extends('layouts.app')
@section('content')

<!-- /.row -->
  <div class="row">
    <div class="col-xs-12">
          

       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista Empleados</h3>
            </div>
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                
                <thead>
                <tr>
                   <th>Cedula</th>
                  <th>Nombre</th>
                  <th>Fecha de Admision</th>
                  <th>Antiguedad</th>
                  <th>Cumpleaños</th>
                  <th>Edad</th>
                  <th>Sexo</th>
                  <th>Tipo</th>
                  <th>Costo-Descripcion</th>
                  <th>SAP-Descripcion</th>
                  <th>Ubicación</th>
                  <th>Afiliado</th>
                </tr>
                </thead>
                @forelse($employees as $employee)

                  <tr>
                    <td>{{ $employee->cedula }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->date_admission }}</td>
                    <td>{{ date('Y') - date('Y',strtotime($employee->date_admission)) }}</td>
                    <td>{{ $employee->birthday }}</td>
                    <td> {{ Carbon\Carbon::parse($employee->birthday)->age }} </td>
                    <td>{{ $employee->sex->description }}</td>
                    <td>{{ $employee->type }}</td>                    
                    <td>{{ $employee->cost_description }}</td>
                    <td>{{ $employee->sap_description }}</td>
                    <td>{{ $employee->location }}</td>
                    <td>{{ $employee->affiliate == true ? 'Si' : 'No' }}</td>
                  </tr>

                   <!-- modal -->


                  <div class="modal modal-danger fade" id="modal-danger-{{ $employee->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">¡Alerta!</h4>
                        </div>
                        <div class="modal-body">
                          <p>Esta seguro de que desea eliminar el registro de {{ $employee->name }}?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>

                          <form id="delete-form-{{$employee->id}}" action="{{ route('employee.destroy',$employee->id) }}" method="POST">
                            <button type="submit" class="btn btn-outline" onclick="event.preventDefault();
                            document.getElementById('delete-form-{{$employee->id}}').submit();">Eliminar</button>
                         
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
                @empty
                  <tr>                    
                    <td>Sin Empleados</td>
                  </tr>
                @endempty          
                </tbody>
                <tfoot>
                <tr>
                  <th>Cedula</th>
                  <th>Nombre</th>
                  <th>Fecha de Admision</th>
                  <th>Antiguedad</th>
                  <th>Cumpleaños</th>
                  <th>Edad</th>
                  <th>Sexo</th>
                  <th>Tipo</th>
                  <th>Costo-Descripcion</th>
                  <th>SAP-Descripcion</th>
                  <th>Ubicación</th>
                  <th>Afiliado</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
      </div>
    
@endsection

@section('scripts')
<script type="text/javascript">
  

 

  
$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example1 thead tr').clone(true).appendTo( '#example1 thead' );

    var c = 0;

    $('#example1 thead tr:eq(1) th').each( function (i) {
      if(c <= 11){

        var title = $(this).text();
        $(this).html( '<input class="form-control" type="text" placeholder="Buscar por '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );

        c++;

      }
        
    } );

 
   var table = $('#example1').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        language: {
        processing:     "Traitement en cours...",
        search:         "Buscar:",
        lengthMenu:    "Mostrar _MENU_ Entradas",
        info:           "Mostrando de _START_ a _END_ de _TOTAL_ elementos",
        emptyTable:     "Sin registros",
        paginate: {
            first:      "Primero",
            previous:   "Atrás",
            next:       "Seguiente",
            last:       "Ultimo"
        },
    },
    } );
} );



</script>
@endsection