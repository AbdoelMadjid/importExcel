@extends('layouts.app')
@section('content')

<!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Editar Empleados</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
            <form action="{{ route('employee.update',$employee->id) }}" method="post">
              
              @csrf

              @method('PUT')

              <div class="row">
                
                <div class="col-md-6">
                  <label>Cedula:</label>

                  <input class="form-control" type="" name="cedula" value="{{ $employee->cedula ? $employee->cedula : old('cedula')  }}" required placeholder="Cedula" readonly>

                  @error('cedula')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  
                  <label>Nombre:</label>

                  <input class="form-control" type="text" name="name" value="{{ $employee->name ? $employee->name : old('name')  }}" required placeholder="Ingrese un Nombre">

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
                  
                  <input class="form-control" name="date_admission" type="date" required value="{{ $employee->date_admission ? $employee->date_admission : old('date_admission') }}">

                  @error('date_admission')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror


                </div>

                <div class="col-md-6">

                  <label>Fecha de nacimiento:</label>
                  
                  <input class="form-control" type="date" name="birthday" value="{{ $employee->birthday ? $employee->birthday : old('birthday') }}" required>

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

                  <select id="sex_id" class="form-control" name="sex" required>
                   
                    @foreach($sexes as $sex)
                  
                    <option {{ old('sex') == $sex->id ? 'selected' :'' }} value="{{ $sex->id }}">{{ $sex->description }}</option>
                  
                    @endforeach
                  
                  </select>

                  @error('sex')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  
                  <label>Tipo:</label>

                  <input class="form-control" type="text" name="type" value="{{ $employee->type ? $employee->type : old('type')  }}" required placeholder="Ingrese un tipo">

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

                  <input class="form-control" type="text" name="cost" value="{{ $employee->cost ? $employee->cost : old('cost') }}" required>

                  @error('cost')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  
                  <label>Descripción costo:</label>

                  <input class="form-control" type="text" name="cost_description" value="{{ $employee->cost_description ? $employee->cost_description : old('cost_description')  }}" required>

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

                  <input class="form-control" type="text" name="sap" value="{{ $employee->sap ? $employee->sap : old('sap') }}" required>

                  @error('sap')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  
                  <label>Descripción sap:</label>

                  <input class="form-control" type="text" name="sap_description" value="{{ $employee->sap_description ? $employee->sap_description : old('sap_description')  }}" required>

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

                  <input class="form-control" type="text" name="job" value="{{ $employee->job ? $employee->job : old('job') }}" required>

                  @error('job')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  
                  <label>Descripción job:</label>

                  <input class="form-control" type="text" name="job_description" value="{{ $employee->job_description ? $employee->job_description : old('job_description')  }}" required>

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

                  <input class="form-control" type="text" name="location" value="{{ $employee->location ? $employee->location : old('location') }}" required>

                  @error('location')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  <label>Afiliado:</label>

                  <select id="affiliate" class="form-control" name="affiliate">
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

              <div class="row">
                
                <div class="col-md-6">
                  
                  <label>Correo:</label>

                  <div class="field-wrapper-mail">
                    
                    <input class="form-control" type="email" name="email[]" required value="{{ isset($employee->emails->first()->email) ? $employee->emails->first()->email : ""}}">

                    @forelse($employee->emails as $key => $email)

                      @if($key > 0)

                        <div style="margin-top:10px;" class="email-{{ $key + 1 }}">

                          <input class="form-control" type="email" name="phone[]" required placeholder="Correo" value="{{ $email->email }}" required>
                        
                        </div>

                      @endif

                    @empty

                    @endforelse


                  </div>

                  <button class="add-button-mail btn btn-success" type="button" style="margin-top: 10px;">Añadir Email</button>
                  
                  <button class="delete-button-mail btn btn-danger" type="button" style="margin-top: 10px;">Eliminar Email</button>

                  @error('email')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                  @error('email.*')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror                  

                </div>

                <div class="col-md-6">
                  
                  <label>Telefono:</label>

                  <div class="field-wrapper">
                    
                    
                      
                    <input class="form-control" type="text" name="phone[]" required placeholder="telefono" value="{{ isset($employee->phones->first()->phone) ? $employee->phones->first()->phone : ""}}">


                    @forelse($employee->phones as $key => $phone)

                      @if($key > 0)

                        <div style="margin-top:10px;" class="phone-{{ $key + 1 }}">

                          <input class="form-control" type="text" name="phone[]" required placeholder="telefono" value="{{ $phone->phone }}">
                        
                        </div>

                      @endif

                    @empty

                    @endforelse


                    
                    
                  
                  </div>


                  <button class="add-button btn btn-success" type="button" style="margin-top: 10px;">Añadir telefono</button>
                  
                  <button class="delete-button btn btn-danger" type="button" style="margin-top: 10px;">Eliminar telefono</button>

                  @error('phone')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                  @error('phone.*')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>
                                  
              </div>


              <div class="row" style="margin-top: 10px;">
                
                <div class="col-md-6">
                  <label>Fecha de afiliacion:</label>

                  <input class="form-control" type="date" name="date-affiliated" value="{{ $employee->affiliated_date ? $employee->affiliated_date : old('date-affiliated') }}">

                  @error('date-affiliated')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  <label>Fecha de Desafiliacion:</label>

                  <input class="form-control" type="date" name="date-desaffiliated" value="{{ $employee->disaffiliated_date ? $employee->disaffiliated_date : old('date-desaffiliated') }}">

                  @error('date-desaffiliated')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

              </div>

              <div class="row" style="margin-top: 10px;">
                
                <div class="col-md-6">
                  <label>Monto-802:</label>

                  <input class="form-control" type="numeric" name="monto_802" value="{{ $employee->monto_802 ? $employee->monto_802 :  old('monto_802') }}">

                  @error('monto_802')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  <label>Monto-804:</label>

                  <input class="form-control" type="numeric" name="monto_804" value="{{ $employee->monto_804 ? $employee->monto_804 :  old('monto_804') }}">

                  @error('monto_804')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

              </div>

              <div class="row" style="margin-top: 10px;">
                
                <div class="col-md-6">
                  <label>Monto-806:</label>

                  <input class="form-control" type="numeric" name="monto_806" value="{{ $employee->monto_806 ? $employee->monto_806 :  old('monto_806') }}">

                  @error('monto_806')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  <label>Monto-807:</label>

                  <input class="form-control" type="numeric" name="monto_807" value="{{ $employee->monto_807 ? $employee->monto_807 :  old('monto_807') }}">

                  @error('monto_807')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

              </div>

              <div class="row" style="margin-top: 10px;">
                
                <div class="col-md-6">
                  <label>Monto-808:</label>

                  <input class="form-control" type="numeric" name="monto_808" value="{{ $employee->monto_808 ? $employee->monto_808 :  old('monto_808') }}">

                  @error('monto_808')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  <label>Memo:</label>

                  <input class="form-control" type="text" name="memo" value="{{ $employee->memo ? $employee->memo : old('memo') }}">

                  @error('memo')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

              </div>

              <div class="form-group">
                 @foreach($secretaries as $secretary)
                   <div class="checkbox">
                    <label>
                      <input id="checkbox-{{ $secretary->id }}" type="checkbox" name="secretary[]" class="required_group" value="{{$secretary->id}}" >
                      {{$secretary->description}}
                    </label>
                  </div>                 
                 @endforeach
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

@section('scripts')

  <script type="text/javascript">
      

      $('#sex').val('{{ $employee->sex }}');
      
      $('#affiliate').val('{{ $employee->affiliated }}');


      $(document).ready(function(){

    var maxField = 5; //Input fields increment limitation
    var addButton = $('.add-button'); //Add button selector
    var deleteButton = $('.delete-button'); //Add button selector
    var wrapper = $('.field-wrapper'); //Input field wrapper
    var x = {{ $employee->phones_count }}; //Initial field counter is 1
   
   $(deleteButton).click(function(){
      if(x > 1)
      {
        $('.phone-'+x).remove();
        x--;    
      }
   });

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter

      var fieldHTML = '<div style="margin-top:10px;" class="phone-'+x+'">\
                      \
                      \
                      <input class="form-control" type="text" name="phone[]" required placeholder="telefono">\
                      \
                    </div>\
                    ';
            
//            <span class='input-group-append'>\
//              <button class='btn btn-light remove-button' type='button'>Eliminar tel.</button>\
//            </span>\
    
            $(wrapper).append(fieldHTML); //Add field html

            $('.select-search').select2({
              templateResult: iconFormat,
              minimumResultsForSearch: Infinity,
              templateSelection: iconFormat,
              escapeMarkup: function(m) { return m; }
          });
        }
    });
    
    //Once remove button is clicked
    //$(wrapper).on('click', '.remove-button', function(e){
    //    e.preventDefault();
    //    $(this).parent('div').remove(); //Remove field html
    //    x--; //Decrement field counter
    //});
});

$(document).ready(function(){

    var maxField = 5; //Input fields increment limitation
    var addButton = $('.add-button-mail'); //Add button selector
    var deleteButton = $('.delete-button-mail'); //Add button selector
    var wrapper = $('.field-wrapper-mail'); //Input field wrapper
    var x = {{ $employee->emails_count }}; //Initial field counter is 1
   
   $(deleteButton).click(function(){
      if(x > 1)
      {
        $('.email-'+x).remove();
        x--;    
      }
   });

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter

      var fieldHTML = '<input style="margin-top:10px;" class="form-control email-'+x+'" type="email" name="email[]" required>';
            
//            <span class='input-group-append'>\
//              <button class='btn btn-light remove-button' type='button'>Eliminar tel.</button>\
//            </span>\
    
            $(wrapper).append(fieldHTML); //Add field html

            $('.select-search').select2({
              templateResult: iconFormat,
              minimumResultsForSearch: Infinity,
              templateSelection: iconFormat,
              escapeMarkup: function(m) { return m; }
          });
        }
    });
    
    //Once remove button is clicked
    //$(wrapper).on('click', '.remove-button', function(e){
    //    e.preventDefault();
    //    $(this).parent('div').remove(); //Remove field html
    //    x--; //Decrement field counter
    //});
});

$(document).ready(function(){
    $("form").submit(function(){
    if ($('input:checkbox').filter(':checked').length < 1){
        alert("Tiene que seleccionar al menos un rol de secretari@!");
    return false;
    }
    });
});
@forelse($employee->secretaries as $secretary)
$('#checkbox-{{$secretary->id}}').prop('checked', true);
@empty

@if (!old('sex'))
  $('#sex_id').val({{ $employee->sex_id }});
@endif

@endforelse
  </script>

@endsection