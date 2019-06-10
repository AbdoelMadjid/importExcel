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

              <div class="row">
                
                <div class="col-md-6">
                  
                  <label>Correo:</label>

                  <div class="field-wrapper-mail">
                    
                    <input class="form-control" type="email" name="email[]" required>

                  </div>

                  <button class="add-button-mail btn btn-success" type="button" style="margin-top: 10px;">Añadir Email</button>
                  
                  <button class="delete-button-mail btn btn-danger" type="button" style="margin-top: 10px;">Eliminar Email</button>

                  @error('email')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  
                  <label>Telefono:</label>

                  <div class="field-wrapper">
                                          
                      
                    <input class="form-control" type="text" name="phone[]" required placeholder="telefono">
                    
                  
                  </div>


                  <button class="add-button btn btn-success" type="button" style="margin-top: 10px;">Añadir telefono</button>
                  
                  <button class="delete-button btn btn-danger" type="button" style="margin-top: 10px;">Eliminar telefono</button>

                  @error('phone')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>
                                  
              </div>


              <div class="row" style="margin-top: 10px;">
                
                <div class="col-md-6">
                  <label>Fecha de afiliacion:</label>

                  <input class="form-control" type="date" name="date-affiliated" value="{{ old('date-affiliated') }}">

                  @error('date-affiliated')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  <label>Fecha de Desafiliacion:</label>

                  <input class="form-control" type="date" name="date-desaffiliated" value="{{ old('date-desaffiliated') }}">

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

                  <input class="form-control" type="numeric" name="monto_802" value="{{ old('monto_802') }}">

                  @error('monto_802')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  <label>Monto-804:</label>

                  <input class="form-control" type="numeric" name="monto_804" value="{{ old('monto_804') }}">

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

                  <input class="form-control" type="numeric" name="monto_806" value="{{ old('monto_806') }}">

                  @error('monto_806')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  <label>Monto-807:</label>

                  <input class="form-control" type="numeric" name="monto_807" value="{{ old('monto_807') }}">

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

                  <input class="form-control" type="numeric" name="monto_808" value="{{ old('monto_808') }}">

                  @error('monto_808')
                    
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>

                  @enderror

                </div>

                <div class="col-md-6">
                  <label>Memo:</label>

                  <input class="form-control" type="text" name="memo" value="{{ old('memo') }}">

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
                      <input type="checkbox" name="secretary[]" class="required_group" value="{{$secretary->id}}" >
                      {{$secretary->description}}
                    </label>
                  </div>                 
                 @endforeach
              </div>

              <div style="margin-top: 30px;">
              
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
$(document).ready(function(){

    var maxField = 5; //Input fields increment limitation
    var addButton = $('.add-button'); //Add button selector
    var deleteButton = $('.delete-button'); //Add button selector
    var wrapper = $('.field-wrapper'); //Input field wrapper
    var x = 1; //Initial field counter is 1
   
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

      var fieldHTML = '<div style="margin-top:10px;" class=" phone-'+x+'">\
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
    var x = 1; //Initial field counter is 1
   
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
</script>

@endsection