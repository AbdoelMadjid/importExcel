@extends('layouts.app')
@section('content')

<!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de Empleados</h3>

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
            <div class="box-body table-responsive">
              <table class="table table-hover">
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
                  <th>Puesto-Descripcion</th>
                  <th>Ubicación</th>
                  <th>Opciones</th>
                </tr>
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
                    <td>{{ $employee->job_description }}</td>
                    <td>{{ $employee->location }}</td>
                    <td><a class="btn btn-success" href="{{ route('employee.edit',$employee->id) }}"> <span class="fa fa-eye"></span> </a></td>

	                  <td><a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}"> <span class="fa fa-pencil"></span> </a></td>
	                  
                    <td><a class="btn btn-danger" href="#"> <span class="fa fa-trash"></span></td>

	                </tr>

                @empty
                	<tr>	                  
	                  <td>Sin Empleados</td>
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