@extends ('layouts.admin')
@section ('contenido')
<div class="card mb-4">
	<!--Mensaje de abono correcto-->
		<div class="flash-message">
			@foreach (['danger', 'warning', 'success', 'info'] as $msg)
			@if(Session::has('alert-' . $msg))

			<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
			@endif
			@endforeach
		</div> <!-- fin .flash-message -->
	<!-- Card Header -->
	<header class="card-header d-md-flex align-items-center">
		
					<?php
                    if (isset($mensaje))
                    {
                    ?> 
                        <div class="alert alert-warning">
                            <ul>
                                {{$mensaje}}
                            </ul>
                        </div>
                    <?php
                    }
                    ?> 
		{!!Form::open(array('url'=>'reservaciones/reservacion','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
		<h4><strong>Crear Reservación </strong>
			<div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                      	<div class="form-group">
                            <label for="huesped"><font color="orange">*</font>Huesped</label>
								<a href="{{url('seguridad\huesped\create')}}">
										<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear nuevo Huesped">
											<button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
													<i class="far fa-plus-square"></i>
											</button>
										</span>
								</a>
                            <select name="idhuesped" id="idhuesped" class="form-control selectpicker"  data-live-search="true" required>
                                  <option value="">Buscar Huesped Nombre/Telefono/Email</option>
                                  @foreach($huespedes as $huesped)
                                  <option value="{{$huesped->id}}">{{$huesped->name}} - {{$huesped->telefono}} - {{$huesped->email}}</option>
                                  @endforeach

                            </select>
                        </div>
                    </div>
					<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
						<div class="form-group">
							<label for="idtipo_inmueble"></label>
								Tipo Hospedaje
								<a href="{{url('inmuebles\tipoinmueble\create')}}">
										<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear Nuevo Tipo Hospedaje">
											<button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
													<i class="far fa-plus-square"></i>
											</button>
										</span>
								</a>
							
							<select id="idtipo_inmueble" type="text" class="form-control selectpicker" name="idtipo_inmueble" data-live-search="true">
								<option selected="selected" value="">Todos</option>
								@foreach ($tiposInmueble as $tipo)
									<option value="{{$tipo->idtipo_inmueble}}">{{$tipo->nombre}}</option>
								@endforeach
										
							</select>
						</div>
					</div>
					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="entrada"></label><font color="orange">*</font>Entrada:</label>
							<span class="form-icon-wrapper">
								<span class="form-icon form-icon--right">
									<i class="fas fa-calendar-alt form-icon__item"></i>
								</span>
								<input type="text" id="dpentrada" class="form-control datepicker" name="entrada" value="">
							</span>
						</div>
					</div>

					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="salida"></label><font color="orange">*</font>Salida:</label>
							<span class="form-icon-wrapper">
								<span class="form-icon form-icon--right">
									<i class="fas fa-calendar-alt form-icon__item"></i>
								</span>
								<input type="text" id="dpsalida" class="form-control datepicker" name="salida" value="">
							</span>
						</div>
					</div>
					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<span class="input-group-btn"><br>
								<button type="submit" class="btn btn-success">
									<i class="far fa-plus-square"></i> Nueva Reservacion
								</button>
							</span>
						</div>
					</div>
				</div>
            </div>
			<!--datos ocultos-->
			<input type="hidden" name="idusuario" value="{{Auth::user()->id}}">
			<input type="hidden" name="fecha" value="{{$hoy}}">
			<input type="hidden" name="estado_reservacion" value="Confirmada">
			<input type="hidden" name="tipo_pago" value="Efectivo">
			<input type="hidden" name="abonado" value="0">
			<input type="hidden" name="total" value="0">
		</h4>
		{{Form::close()}}
		
	</header>

	<div class="card-body">
		<div class="row">
			<h4><strong>Listado de Reservación </strong></h4>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
				@include('reservaciones.reservacion.search')
				@include('reservaciones.reservacion.searchCodigo')
				<?php
								$desde = date("d-m-Y", strtotime($desde));
								$hasta = date("d-m-Y", strtotime($hasta));
								if($desde == '01-01-1970' or $hasta == '01-01-1970')
								{
									$desde = null;
									$hasta = null;
								}
								
							?>
				<h6><strong>Filtros:</strong><font color="Blue"> <strong>Desde:</strong> '{{ $desde}}', <strong>Hasta:</strong> '{{ $hasta}}', <strong>Huesped:</strong> ''@foreach($huespedfiltro as $huespedf){{$huespedf->nombre}}@endforeach', <strong>Usuario:</strong> '@foreach($usufiltro as $usuf){{$usuf->name}}@endforeach', <strong>Saldo:</strong> '{{ $estado_saldo}}', <strong>Estado:</strong> '{{ $estado_reservacion}}', <strong>Tipo Pago:</strong> '{{ $tipo_pago}}'</font></h6>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th><h5><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
							<th><h5><strong>Fecha</strong></h5></th>
							<th><h5><strong>Codigo</strong></h5></th>
							<th><h5><strong>Huesped</strong></h5></th>
							<th><h5><strong>Total</strong></h5></th>
							<th><h5><strong>Saldo</strong></h5></th>
							<th><h5><strong>Estado Reservacion</strong></h5></th>
							<th><h5><strong>Tipo Pago</strong></h5></th>
							<th><h5><strong>Usuario</strong></h5></th>
							
						</thead>
		               @foreach ($reservaciones as $res)
						<tr>
							<td align="left">
							@if ($res->estado_reservacion != 'Cancelada')
								@if ($res->estado == 'Habilitado')
		                        <a href="" data-target="#modal-delete-{{$res->idreservacion}}" data-toggle="modal">
									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Reservacion">
		                        		<button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
		                        			<i class="far fa-minus-square"></i>
										</button>
									</span>
		                        </a>
		                        @endif
								<a href="{{URL::action('ReservacionController@show',$res->idreservacion)}}">
									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Ver Reservacion">
										<button class="btn btn-sm btn-primary" style="pointer-events: none;" type="button">
											<i class="far fa-eye"></i>
										</button>
									</span>
								</a>
								
								<a href="{{URL::action('ReservacionController@edit',$res->idreservacion)}}">
									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Reservacion">
										<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
												<i class="far fa-edit"></i> / <i class="fas fa-donate"></i> / <i class="far fa-calendar-check"></i>
										</button>
									</span>
								</a>
							@endif
							</td>
							<?php
								$fecha = date("d-m-Y", strtotime($res->fecha));
							?>
							<td align="center"><h5>{{ $fecha}}</h5></td>
							<td align="left"><h5>{{ $res->codigo}}</h5></td>
							<td align="left"><h5>{{ $res->huesped}} @if($res->comentario != null) <i class="fas fa-comment"> @endif </i></h5></td>
							<td align="right"><h5>{{ Auth::user()->moneda }}{{number_format($res->total,2, '.', ',')}}</h5></td>
							<td align="right"><h5> 
								@if (($res->total - $res->abonado) == 0)<font color="green">{{ Auth::user()->moneda }}{{ number_format(($res->total - $res->abonado),2, '.', ',')}}</font> @endif 
								@if (($res->total - $res->abonado) != 0)<font color="Red">{{ Auth::user()->moneda }}{{ number_format(($res->total - $res->abonado),2, '.', ',')}}</font> @endif
							</h5></td>
							<td align="center"><h5>
								@if ($res->estado_reservacion == "Finalizada")<font color="green">{{ $res->estado_reservacion}} </font> @endif
								@if ($res->estado_reservacion == "Confirmada")<font color="orange">{{ $res->estado_reservacion}} </font> @endif
								@if ($res->estado_reservacion == "Check In")<font color="yellow">{{ $res->estado_reservacion}} </font> @endif
								@if ($res->estado_reservacion == "Pendiente")<font color="red">{{ $res->estado_reservacion}} </font> @endif
								@if ($res->estado_reservacion == "Cancelada")<font color="red">{{ $res->estado_reservacion}} </font> @endif
							</h5></td>
							<td align="left"><h5>{{ $res->tipo_pago}}</h5></td>
							<td align="center"><h5>{{ $res->name}}</h5></td>
						</tr>
						@include('reservaciones.reservacion.modal')
				@endforeach
					</table>
				</div>
				
				{{$reservaciones->render()}}
			</div>
		</div>
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
	$( '#datepickerdesde' ).datepicker( optSimple );

	$( '#datepickerhasta' ).datepicker( optSimple );

	$( '#dpentrada' ).datepicker( optSimple );

	$( '#dpsalida' ).datepicker( optSimple );

	$( '#datepickerdesde,#datepickerhasta,#dpentrada').datepicker( 'setDate', today );
	$( '#dpsalida').datepicker( 'setDate', tomorrow );
</script>
@endsection