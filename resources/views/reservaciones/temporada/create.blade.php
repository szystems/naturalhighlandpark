@extends ('layouts.admin')
@section ('contenido')


<div class="col-md-6 mb-4">
      <div class="card">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Crear Temporada </strong></h2>
            </header>

            <div class="card-body">
                  <h5 class="h4 card-title">Ingrese los datos que se le piden:</h5>
                  <h6><font color="orange"> Campos Obligatorios *</font></h6>
                  @if (count($errors)>0)
                        <div class="alert alert-danger">
                              <ul>
                                    @foreach ($errors->all() as $error)
                                          <li>{{$error}}</li>
                                    @endforeach
                              </ul>
                        </div>
                  @endif

                  {!!Form::open(array('url'=>'reservaciones/temporada','method'=>'POST','autocomplete'=>'off'))!!}
                  {{Form::token()}}
                  <div class="form-group">
                        <label for="idtipo_inmueble">
                              <font color="orange">*</font>Tipo Hospedaje
                              <a href="{{url('inmuebles\tipoinmueble\create')}}">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear Nuevo Hospedaje">
                                          <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                                                <i class="far fa-plus-square"></i>
                                          </button>
                                    </span>
                              </a>
                        </label>
                        <select id="idtipo_inmueble" type="text" class="form-control" name="idtipo_inmueble" value="{{ old('idtipo_inmueble') }}">
                              <option selected="selected" value="{{ old('idtipo_inmueble') }}">{{ old('idtipo_inmueble') }}</option>
                              @foreach ($tiposInmueble as $tipo)
                                <option value="{{$tipo->idtipo_inmueble}}">{{$tipo->nombre}}</option>
                              @endforeach
                                    
                        </select>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group mb-2">
                              <label for="fecha_inicial"></label><font color="orange">*</font>Fecha Inicial:</label>
                                    <span class="form-icon-wrapper">
                                          <span class="form-icon form-icon--right">
                                                <i class="fas fa-calendar-alt form-icon__item"></i>
                                          </span>
                                          <input type="text" id="fecha_inicial" class="form-control datepicker" name="fecha_inicial" value="{{old('fecha_inicial')}}">
                                    </span>
                         </div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group mb-2">
                              <label for="fecha_final"></label><font color="orange">*</font>Fecha Final:</label>
                                    <span class="form-icon-wrapper">
                                          <span class="form-icon form-icon--right">
                                                <i class="fas fa-calendar-alt form-icon__item"></i>
                                          </span>
                                    <input type="text" id="fecha_final" class="form-control datepicker" name="fecha_final" value="{{old('fecha_final')}}">
                              </span>
                        </div>
                  </div>
                  <div class="form-group">
                        <label for="precio"><font color="orange">*</font>Precio x Adulto</label>
                        <input type="text" name="precio" class="form-control" value="0.00" onkeypress="return validardecimal(event,this.value)">
                        
                  </div>
                  <div class="form-group">
                        <label for="preciomenor"><font color="orange">*</font>Precio x Menor</label>
                        <input type="text" name="preciomenor" class="form-control" value="0.00" onkeypress="return validardecimal(event,this.value)">
                        
                  </div>
                  <div class="form-group">
                        <label for="preciomascota"><font color="orange">*</font>Precio x Mascota</label>
                        <input type="text" name="preciomascota" class="form-control" value="0.00" onkeypress="return validardecimal(event,this.value)">
                        
                  </div>
                  <div class="form-group">
                        <label for="promopersonagratis">Promocion Persona(s) Gratis</label>
                        <select type="text" class="form-control" name="promopersonagratis">
                              <option selected="selected" value="Inhabilitado">Inhabilitado</option>
                              <option value="Habilitado">Habilitado</option>
                                    
                        </select>
                  </div>
                  <div class="form-group">
                        <label for="promonumpersonas">Numero de Personas Gratis</label>
                        <select type="text" class="form-control" name="promonumpersonas">
                              <option selected="selected" value="1">1</option>
                              @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                              @endfor      
                        </select>
                  </div>
                  <div class="form-group">
                        <label for="estado_temporada">Estado Temporada</label>
                        <select type="text" class="form-control" name="estado_temporada" value="{{ old('estado_temporada') }}">
                              <option selected="selected" value="Activo">Activo</option>
                              <option value="Inactivo">Inactivo</option>
                                    
                        </select>
                  </div>
            </div>

            <footer class="card-footer">
                  <div class="form-group">
                        <button class="btn btn-danger" type="reset"><i class="fas fa-ban"></i> Borrar</button>
                        <button class="btn btn-info" type="submit"><i class="far fa-save"></i> Guardar</button>
                  </div>

                  {!!Form::close()!!}
            </footer>
      </div>
</div>
<script>
	var date = new Date();
	var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
	var tomorrow = new Date(today);
	tomorrow.setDate(tomorrow.getDate() + 1);
	var optSimple = {
		format: "dd-mm-yyyy",
    	language: "es",
    	autoclose: true,
		todayHighlight: true,
		todayBtn: "linked",
	};

	$( '#fecha_inicial' ).datepicker( optSimple );

	$( '#fecha_final' ).datepicker( optSimple );

	$( '#fecha_inicial').datepicker( 'setDate', today );
	$( '#fecha_final').datepicker( 'setDate', tomorrow );
</script>
@push ('scripts')
    <script>
        

        function validardecimal(e,txt) 
        {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            if (tecla==46 && txt.indexOf('.') != -1) return false;
            patron = /[\d\.]/;
            te = String.fromCharCode(tecla);
            return patron.test(te); 
        }  

        function validarentero(e,txt) 
        {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla==8)
            {
                return true;
            }
        
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final); 
        }
    </script>
@endpush
@endsection