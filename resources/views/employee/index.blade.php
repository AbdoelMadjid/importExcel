@extends('layouts.app')
@section('content')

<!-- /.row -->
  <div class="row">
    <div class="col-xs-12">
          

       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista Empleados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>Cedula</th>
                  <th>Nombre</th>
                  <th>Fecha de Admision</th>
                  <th>Antiguedad</th>
                  <th>Cumpleaños</th>
                  <th>Sexo</th>
                  <th>Tipo</th>
                  <th>Costo-Descripcion</th>
                  <th>SAP-Descripcion</th>
                  <th>Ubicación</th>
                  <th>Afiliado</th>
                  <th>Opciones</th>
                  <th></th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($employees as $employee)

                  <tr>
                    <td>{{ $employee->cedula }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->date_admission }}</td>
                    <td>{{ date('Y') - date('Y',strtotime($employee->date_admission)) }}</td>
                    <td>{{ $employee->birthday }}</td>
                    <td>{{ $employee->sex == true ? "M" : "F" }}</td>
                    <td>{{ $employee->type }}</td>                    
                    <td>{{ $employee->cost_description }}</td>
                    <td>{{ $employee->sap_description }}</td>
                    <td>{{ $employee->location }}</td>
                    <td>{{ $employee->affiliate == true ? 'Si' : 'No' }}</td>
                    <td>
                      <a class="btn btn-success" href="{{ route('employee.edit',$employee->id) }}"> 
                        <span class="fa fa-eye"></span> 
                      </a>
                    </td>

                    <td>
                      <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}"> <span class="fa fa-pencil"></span> 
                      </a>
                    </td>
                    
                    <td>
                      <a class="btn btn-danger" href="#"> 
                        <span class="fa fa-trash"></span>
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
                  <th>Fecha de Admision</th>
                  <th>Antiguedad</th>
                  <th>Cumpleaños</th>
                  <th>Sexo</th>
                  <th>Tipo</th>
                  <th>Costo-Descripcion</th>
                  <th>SAP-Descripcion</th>
                  <th>Ubicación</th>
                  <th>Afiliado</th>
                  <th>Opciones</th>
                  <th></th>
                  <th></th>
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
  

   $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })


</script>
@endsection