{!! Form::open(array('url'=>'reservaciones/temporada','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

	<div>
    	<div class="card mb-4">
            <header class="card-header">
				  <h5 class="h3 card-header-title"><strong>Filtrar por: </strong></h5>
				  <h6><font color="orange"> Puedes usar solo uno o varios campos de búsqueda para filtrar los datos.</font></h6>
				  <h6><font color="orange"> Campos Obligatorios *</font></h6>
				  <input type="hidden" class="form-control" name="xsearch" placeholder="Buscar por Codigo..." value="xfiltros">
            </header>
            <div class="card-body">
                <div class="row">
					<?php
					
					?>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="desde"></label><font color="orange">*</font>Desde:</label>
							<span class="form-icon-wrapper">
								<span class="form-icon form-icon--right">
									<i class="fas fa-calendar-alt form-icon__item"></i>
								</span>
								<input type="text" id="datepickerdesde" class="form-control datepicker" name="desde" value="">
							</span>
						</div>
					</div>

					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="hasta"></label><font color="orange">*</font>Hasta:</label>
							<span class="form-icon-wrapper">
								<span class="form-icon form-icon--right">
									<i class="fas fa-calendar-alt form-icon__item"></i>
								</span>
								<input type="text" id="datepickerhasta" class="form-control datepicker" name="hasta" value="">
							</span>
						</div>
					</div>

					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="idtipo_inmueble"></label>Tipo Hospedaje:</label>
							<select name="idtipo_inmueble" class="form-control">
								<option selected value="">Todos</option>
								@foreach($tiposInmueble as $inmueble)
								<option value="{{$inmueble->idtipo_inmueble}}">{{$inmueble->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="estado_temporada"></label>Estado:</label>
							<select name="estado_temporada" class="form-control">
								<option value="">Todos</option>
								<option value="Activo">Activo</option>
								<option value="Inactivo">Inactivo</option>
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



    

{{Form::close()}}