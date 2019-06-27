@extends('layouts.app')
@section('content')

<!-- /.row -->
  <div class="row">
    <div class="col-xs-12">
          

       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista Empleados</h3>
            </div>
            <div class="box-body">
              <div>
                <a href="{{ route('ductions.date.edit') }}" class="btn btn-primary">Cambiar Fecha <span class="fa fa-calendar"></span></a>
                <button id="descarga-802" class="btn btn-primary">Descargar 802 <span class="fa fa-download"></span></button>
                <button id="descarga-804" class="btn btn-primary">Descargar 804 <span class="fa fa-download"></span></button>
                <button id="descarga-806" class="btn btn-primary">Descargar 806 <span class="fa fa-download"></span></button>
                <button id="descarga-807" class="btn btn-primary">Descargar 807 <span class="fa fa-download"></span></button>
                <button id="descarga-808" class="btn btn-primary">Descargar 808 <span class="fa fa-download"></span></button>
              </div>
              <div style="margin-top: 10px;">
                <a href="{{ route('ductions.show',802) }}" id="cambiar-802" class="btn btn-success">Cambia 802 <span class="fa fa-download"></span></a>
                <a href="{{ route('ductions.show',804) }}" id="cambiar-804" class="btn btn-success">Cambia 804 <span class="fa fa-download"></span></a>
                <a href="{{ route('ductions.show',806) }}" id="cambiar-806" class="btn btn-success">Cambia 806 <span class="fa fa-download"></span></a>
                <a href="{{ route('ductions.show',807) }}" id="cambiar-807" class="btn btn-success">Cambia 807 <span class="fa fa-download"></span></a>
                <a href="{{ route('ductions.show',808) }}" id="cambiar-808" class="btn btn-success">Cambia 808 <span class="fa fa-download"></span></a>
              </div>
            </div>
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                
                <thead>
                <tr>
                  <th>Cedula</th>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>802</th>
                  <th>Porcentaje</th>                  
                  <th>804</th>
                  <th>Importe</th>
                  <th>806</th>
                  <th>Importe</th>
                  <th>807</th>
                  <th>Importe</th>
                  <th>808</th>
                  <th>Importe</th>
                  <th>Editar</th>
                </tr>
                </thead>
                @forelse($employees as $employee)

                  <tr>
                    <td>{{ $employee->cedula }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->start_date }}</td>
                    <td>{{ is_null($employee->ductions->where('description','802')->first()) ? "NO" : "SI" }}</td>

                    <td>{{ $employee->porcentages }}%</td>
                    
                    <td>{{ is_null($employee->ductions->where('description','804')->first()) ? "NO" : "SI" }}</td>
                    
                    <td>{{ is_null($employee->ductions->where('description','804')->first()) ? "" : $employee->ductions->where('description','804')->first()->pivot->import }}</td>
                    
                    <td>{{ is_null($employee->ductions->where('description','806')->first()) ? "NO" : "SI" }}</td>
                    
                    <td>{{ is_null($employee->ductions->where('description','806')->first()) ? "" : $employee->ductions->where('description','806')->first()->pivot->import }}</td>

                    <td>{{ is_null($employee->ductions->where('description','807')->first()) ? "NO" : "SI" }}</td>
                    
                    <td>{{ is_null($employee->ductions->where('description','807')->first()) ? "" : $employee->ductions->where('description','807')->first()->pivot->import }}</td>

                    <td>{{ is_null($employee->ductions->where('description','808')->first()) ? "NO" : "SI" }}</td>
                    
                    <td>{{ is_null($employee->ductions->where('description','808')->first()) ? "" : $employee->ductions->where('description','808')->first()->pivot->import }}</td>

                    <td> 
                      <a class="btn btn-primary" href="{{ route('ductions.edit',$employee->id) }}">
                        <i class="fa fa-pencil"></i>
                      </a> 
                    </td>
                         
                  </tr>
                    
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
                  <th>Fecha</th>
                  <th>802</th>
                  <th>Porcentaje</th>                  
                  <th>804</th>
                  <th>Importe</th>
                  <th>806</th>
                  <th>Importe</th>
                  <th>807</th>
                  <th>Importe</th>
                  <th>808</th>
                  <th>Importe</th>
                  <th>Editar</th>
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
      if(c <= 12){

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


$('#descarga-802').on('click', function() {
    
    //filtered rows data as arrays
    //console.log(table.rows( { filter : 'applied'} ).data());

    var employees = JSON.parse(JSON.stringify(table.rows( { filter : 'applied'} ).data()));

    var urlDownload = "{{ asset('storage/public/export/') }}";

    console.log(employees);

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: "POST",
      url: "{{ route('employee.download.duction',802) }}", 
      dataType: false,
      data:{
        'employees': employees,
      },
      success: function(result){
        console.log(result);
        window.location = result;
      },
    });                                  
});

$('#descarga-804').on('click', function() {
    
    //filtered rows data as arrays
    //console.log(table.rows( { filter : 'applied'} ).data());

    var employees = JSON.parse(JSON.stringify(table.rows( { filter : 'applied'} ).data()));

    var urlDownload = "{{ asset('storage/public/export/') }}";

    console.log(employees);

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: "POST",
      url: "{{ route('employee.download.duction',804) }}", 
      dataType: false,
      data:{
        'employees': employees,
      },
      success: function(result){
        console.log(result);
        window.location = result;
      },
    });                                  
});

$('#descarga-806').on('click', function() {
    
    //filtered rows data as arrays
    //console.log(table.rows( { filter : 'applied'} ).data());

    var employees = JSON.parse(JSON.stringify(table.rows( { filter : 'applied'} ).data()));

    var urlDownload = "{{ asset('storage/public/export/') }}";

    console.log(employees);

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: "POST",
      url: "{{ route('employee.download.duction',806) }}", 
      dataType: false,
      data:{
        'employees': employees,
      },
      success: function(result){
        console.log(result);
        window.location = result;
      },
    });                                  
});

$('#descarga-807').on('click', function() {
    
    //filtered rows data as arrays
    //console.log(table.rows( { filter : 'applied'} ).data());

    var employees = JSON.parse(JSON.stringify(table.rows( { filter : 'applied'} ).data()));

    var urlDownload = "{{ asset('storage/public/export/') }}";

    console.log(employees);

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: "POST",
      url: "{{ route('employee.download.duction',807) }}", 
      dataType: false,
      data:{
        'employees': employees,
      },
      success: function(result){
        console.log(result);
        window.location = result;
      },
    });                                  
});

$('#descarga-808').on('click', function() {
    
    //filtered rows data as arrays
    //console.log(table.rows( { filter : 'applied'} ).data());

    var employees = JSON.parse(JSON.stringify(table.rows( { filter : 'applied'} ).data()));

    var urlDownload = "{{ asset('storage/public/export/') }}";

    console.log(employees);

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      method: "POST",
      url: "{{ route('employee.download.duction',808) }}", 
      dataType: false,
      data:{
        'employees': employees,
      },
      success: function(result){
        console.log(result);
        window.location = result;
      },
    });                                  
});

} );




</script>
@endsection