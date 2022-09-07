{!! Form::open(array('url'=>'reportes/bitacora','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

	<div>
    	<div class="card mb-4">
            <header class="card-header">
				  <h5 class="h3 card-header-title"><strong>Filtrar por: </strong></h5>
				  <h6><font color="orange"> Puedes usar solo uno o varios campos de búsqueda para filtrar los datos.</font></h6>
				  <h6><font color="orange"> Campos Obligatorios *</font></h6>
            </header>
            <div class="card-body">
                <div class="row">
					<?php
					
					?>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="fecha"></label><font color="orange">*</font>Fecha:</label>
							<span class="form-icon-wrapper">
								<span class="form-icon form-icon--right">
									<i class="fas fa-calendar-alt form-icon__item"></i>
								</span>
								<input type="text" id="datepickerfecha" class="form-control datepicker" name="fecha" value="">
							</span>
						</div>
					</div>

					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="usuario"></label>Usuario:</label>
							<select name="usuario" class="form-control" value="{{ old('usuario') }}">
								<option value="">Todos</option>
								@foreach ($usuarios as $usu)
                                <option value="{{$usu->id}}">{{$usu->name}}</option>
                              	@endforeach
							</select>
						</div>
					</div>
					
					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="tipo"></label>Tipo:</label>
							<select name="tipo" class="form-control" value="{{ old('tipo') }}">
								<option value="">Todos</option>
								<option value="Seguridad">Seguridad</option>
								<option value="Inmuebles">Inmuebles</option>
								<option value="Reservaciones">Reservaciones</option>
								<option value="Huesped">Huesped</option>
								<option value="Configuracion">Configuracion</option>

							</select>
						</div>
					</div>
				</div>
            </div>
                
                     
            <footer class="card-footer">
                <div class="form-group">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-info">
									<i class="fas fa-search"></i> Buscar
								</button>
							</span>
				</div>
            </footer>
    	</div>
	</div>

<script>
	var date = new Date();
	var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

	var optSimple = {
		format: "dd-mm-yyyy",
    	language: "es",
    	autoclose: true,
		todayHighlight: true,
		todayBtn: "linked",
	};
	$( '#datepickerfecha' ).datepicker( optSimple );

	$( '#datepickerfecha' ).datepicker( 'setDate', today );
</script>

    

{{Form::close()}}

	