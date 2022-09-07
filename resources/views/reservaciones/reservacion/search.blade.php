{!! Form::open(array('url'=>'reservaciones/reservacion','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

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
							<label for="desde"></label><font color="orange">*</font>Fecha Desde:</label>
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
							<label for="hasta"></label><font color="orange">*</font>Fecha Hasta:</label>
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
							<label for="huesped"></label>Huesped:</label>
							<select name="huesped" class="form-control" value="{{ old('huesped') }}">
								<option value="">Todos</option>
								@foreach ($huespedes as $huesped)
                                <option value="{{$huesped->id}}">{{$huesped->name}}</option>
                              	@endforeach
							</select>
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
							<label for="estado_saldo"></label>Saldo:</label>
							<select name="estado_saldo" class="form-control" value="{{ old('estado_saldo') }}">
								<option value="">Todos</option>
								<option value="Pendiente">Pendiente</option>
								<option value="Pagado">Pagado</option>
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="estado_reservacion"></label>Estado:</label>
							<select name="estado_reservacion" class="form-control" value="{{ old('estado_reservacion') }}">
								<option value="">Todos</option>
								<option value="Pendiente">Pendiente</option>
								<option value="Confirmada">Confirmada</option>
								<option value="Check In">Check In</option>
								<option value="Finalizada">Finalizada</option>
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="tipo_pago"></label>Tipo Pago:</label>
							<select name="tipo_pago" class="form-control" value="{{ old('tipo_pago') }}">
								<option value="">Todos</option>
								<option value="Efectivo">Efectivo</option>
								<option value="Tarjeta">Tarjeta</option>
								<option value="Cheque">Cheque</option>
								<option value="Credito">Credito</option>
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