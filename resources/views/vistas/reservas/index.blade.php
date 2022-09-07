@extends('layouts.app')

@section('content')
	<!--Mensaje de abono correcto-->
		<div class="flash-message">
			@foreach (['danger', 'warning', 'success', 'info'] as $msg)
				@if(Session::has('alert-' . $msg))

				<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
				@endif
			{{session()->forget('alert-' . $msg)}}
			@endforeach
			
		</div> <!-- fin .flash-message -->
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{asset('hltemplate/images/portada/3.jpg')}});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner slider-text-inner2 text-center">
				   					<h2>Historias para el recuerdo</h2>
									   <h1>Historial de Reservaciones</h1>
									   
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		
		
		
		<div id="colorlib-reservation">
			<div class="container">
				<div class="row">
					<div class="col-md-12 search-wrap">
						<div class="colorlib-form">
							<div class="row">
								<div class="colorlib-form">
									{!! Form::open(array('url'=>'vistas/reservaciones','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
									<div class="col-md-2">
										<div class="form-group">
											<label for="date">Entrada:</label>
											<div class="form-field">
												<i class="icon icon-calendar2"></i>
												<input type="text" id="entrada" name="entrada" class="form-control datepicker" placeholder="Check-in date">
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label for="date">Salida:</label>
											<div class="form-field">
												<i class="icon icon-calendar2"></i>
												<input type="text" id="salida" name="salida" class="form-control datepicker" placeholder="Check-out date">
												
											</div>
										</div>
									</div>
									<?php
										$tiposInmueble=DB::table('tipo_inmueble')
										->where('estado_tipoinmueble','=','Activo')
										->where('estado','=','Habilitado')
										->get();
									?>
									<div class="col-md-2">
										<div class="form-group">
											<label for="date">Tipo Hospedaje:</label>
											<div class="form-field">
												<font color="Blue">
													<select name="idtipo_inmueble" class="form-control" id="idtipo_inmueble" data-live-search="true">
														<option selected="selected" value="">Todos</option>
														@foreach ($tiposInmueble as $tipo)
															<option value="{{$tipo->idtipo_inmueble}}">{{$tipo->nombre}}</option>
														@endforeach		
													</select>											
												</font>
											</div>
											
										</div>
									</div>
								</div>
							
								<div class="col-md-2">
									<input type="submit" name="submit" id="submit" value="Reservar" class="btn btn-primary btn-block">
								</div>
								{{Form::close()}}
								{{Form::open(array
									(
										'action' => 'ReservacionClienteController@showReserva',
										'method' => 'GET',
										'role' => 'form',
									))
								}}
								{{Form::token()}}
		                		<div class="col-md-2">
		                  			<div class="form-group">
		                    			<label for="date">Codigo:</label>
		                    			<div class="form-field">
		                      				<i class=""></i>
		                      				<input type="text" id="codigo" name="codigo" class="form-control" placeholder="RES-XXXXXXXXXX">
		                    			</div>
		                  			</div>
		                		</div>
		                		<div class="col-md-2">
		                  			<input type="submit" name="submit" id="submit" value="Buscar " class="btn btn-primary btn-block">
								</div>
								{{Form::close()}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<!--Inicio Collapse-->
				<h2>Historial de Reservas</h2>
				<p><strong>Nota:</strong> Aquí vera todo su historial de reservaciones en Natural Highland Park, viendo los detalles y estados de las mismas.</p>

				<div class="panel-group" id="accordion">
					@foreach($reservas as $reserva)
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<!--Titulo-->
									<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$reserva->idreservacion}}"><span class="badge badge-success">Abrir </span><font color="LimeGreen"><strong><u>{{$reserva->fecha}}</u> </strong></font> <strong>Codigo: {{$reserva->codigo}} </strong><span class="badge badge-success"><font color="white"><strong> Estado:</strong></font> <font color="yellow">{{$reserva->estado_reservacion}}</font>, <font color="white"><strong>Total:</strong></font> <font color="lightblue">{{ $config->moneda }}{{number_format($reserva->total,2, '.', ',')}} </font>, <font color="white"><strong>Saldo:</strong></font> <font color="Red">{{ $config->moneda }}{{number_format(($reserva->total - $reserva->abonado),2, '.', ',')}} </font><font color="white">({{$reserva->estado_saldo}})</font></span></a>
								</h4>
							</div>
						<div id="collapse{{$reserva->idreservacion}}" class="panel-collapse collapse">
							<div class="panel-body">
								<!--Contenido-->
								<?php
									$detalles=DB::table('detalle_reservacion as dr')
									->join('inmueble as i','dr.idinmueble','=','i.idinmueble')
									->join('temporada as t','dr.idtemporada','=','t.idtemporada')
									->where('dr.idreservacion','=',$reserva->idreservacion)
									->get();
								?>
                                
                                <h3>Detalles de Reservacion</h3>
									
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                            <thead style="background-color:#A9D0F5">
                                                
                                                <th><p><strong>Hospedaje</strong></p></th>
                                                <th><p><strong>Entrada/Salida</strong></p></th>
                                                <th><p><strong>Promocion</strong></p></th>
                                                <th><p><strong>Mayores</strong></p></th>
                                                <th><p><strong>Menores</strong></p></th>
												<th><p><strong>Mascotas</strong></p></th>
                                                <th><p><strong>Sub-Total</strong></p></th>
                                            </thead>
                                            <tfoot>
												<th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <!--<th></th>
                                                <th></th>-->
                                                <th><h4 align="right"><strong>Total: </strong></h4></th>
                                                <th ><h4 id="total" align="right"><strong>{{ $config->moneda }}{{ number_format($reserva->total,2, '.', ',')}}</strong></th>
                                            </tfoot>
                                            <tbody>
                                                @foreach($detalles as $detalle)
                                                <tr>
                                                <td align="left"><p><strong>{{$detalle->nombre}}</strong></p></td>
												<?php
													$detalleFEntrada = date("d-m-Y", strtotime($detalle->fecha_entrada));
													$detalleFSalida = date("d-m-Y", strtotime ($detalle->fecha_salida."+ 1 days")); 
												?>
												<td align="center"><p><font color="limegreen">{{$detalleFEntrada}}</font> / <font color="red">{{$detalleFSalida}}</font></p></td>
                                                <td align="left"><p>{{$detalle->comentarios}}</p></td>
                                                <td align="left"><p><font color="orange"> {{$detalle->cant_mayores}} * {{ $config->moneda }}{{number_format($detalle->precio_mayores,2, '.', ',')}} = {{ $config->moneda }}{{number_format($detalle->cant_mayores * $detalle->precio_mayores,2, '.', ',')}}</font></p></td>
                                                <td align="center"><p><font color="orange">{{$detalle->cant_menores}} * {{ $config->moneda }}{{number_format($detalle->precio_menores,2, '.', ',')}} = {{ $config->moneda }}{{number_format($detalle->cant_menores * $detalle->precio_menores,2, '.', ',')}}</font></p></td>
                                                <td align="center"><p><font color="orange">{{$detalle->cant_mascotas}} * {{ $config->moneda }}{{number_format($detalle->preciomascotas,2, '.', ',')}} = {{ $config->moneda }}{{number_format($detalle->cant_mascotas * $detalle->preciomascotas,2, '.', ',')}}</font></p></td>
                                            	<td align="left"><p><font color="Blue">{{ $config->moneda }}{{number_format(($detalle->cant_mayores * $detalle->precio_mayores) + ($detalle->cant_menores * $detalle->precio_menores) + ($detalle->cant_mascotas * $detalle->preciomascotas),2, '.', ',')}}</font></p></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
									{{Form::close()}}
									{{Form::open(array
										(
											'action' => 'ReservacionClienteController@showReserva',
											'method' => 'GET',
											'role' => 'form',
										))
									}}
									{{Form::token()}}
												
									<div class="col-md-12">
										<input type="hidden" id="codigo" name="codigo" class="form-control" value="{{$reserva->codigo}}">
										<input type="submit" name="submit" id="submit" value="Ver Detalles o Subir No.Transaccion " class="btn btn-primary btn-block">
									</div>
									{{Form::close()}}
                                </div>
								
									
							</div>
							</div>
						</div>
					@endforeach
				</div> 
				<!--Fin Collapse-->

				
			</div>
		</div>

		<div id="colorlib-subscribe" style="background-image: url({{asset('hltemplate/images/pie/pie.jpg')}});">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2>Contáctanos</h2>
						<p>Estamos a tus ordenes, contáctanos para saber de ofertas y eventos a los que te podría interesar asistir.</p>
						<form class="form-inline qbstp-header-subscribe">
							<div class="row">
								<div class="col-md-12 col-md-offset-0">
									<div class="form-group">
										<p><a href="{{ url('/vistas/contacto') }}" class="btn btn-primary btn-demo"></i> Contacto</a> </p>
									</div>
								</div>
							</div>
						</form>
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
        $( '#entrada' ).datepicker( optSimple );

        $( '#salida' ).datepicker( optSimple );

        $( '#entrada' ).datepicker( 'setDate', today );
        $( '#salida' ).datepicker( 'setDate', tomorrow );

	</script>	
	
@endsection
