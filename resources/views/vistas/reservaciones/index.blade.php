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
			   	<li style="background-image: url({{asset('hltemplate/images/fondos/reservaciones.jpg')}});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner slider-text-inner2 text-center">
				   					<h2>Escoge lo Mejor</h2>
									   <h1>Crear Reservacion &amp; Buscar</h1>
									   
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
												<input type="text" id="entrada" name="entrada" class="form-control datepicker" placeholder="Check-in date" value="{{$entrada}}">
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label for="date">Salida:</label>
											<div class="form-field">
												<i class="icon icon-calendar2"></i>
												<input type="text" id="salida" name="salida" class="form-control datepicker" placeholder="Check-out date" value="{{$salida}}">
												
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
				<h2>Hospedajes disponibles:</h2>
				<p><strong>Nota:</strong> Seleccione la pestaña de acuerdo a la temporada y tipo de hospedaje que desea reservar, se le indicara la fecha de Check-In y Check-Out de acuerdo a las fechas que se buscó en las que los inmuebles estén disponibles.</p>								
				<!--Inicio Collapse-->
					
                    @foreach($temporadas as $temporada)
                        <?php
                            $fi = date("d-m-Y", strtotime($compEntrada));
                            $ff = date("d-m-Y", strtotime($compSalida));
                        ?>
                        @if((($compEntrada >= $temporada->fecha_inicial) && ($compEntrada <= $temporada->fecha_final)) || (($compSalida >= $temporada->fecha_inicial) && ($compSalida <= $temporada->fecha_final)) || (($compEntrada <= $temporada->fecha_inicial) && ($compSalida >= $temporada->fecha_final)))
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <hr>
                                <div class="form-group">
									<?php
										$fechaInicial = date("d-m-Y", strtotime($temporada->fecha_inicial));
										$fechaFinal = date("d-m-Y", strtotime($temporada->fecha_final));

										
										//definir fecha de entrada y salida que se requiere dentro de la temporada
										//fecha inicial de la reservacion dentro de la temporada
										if(($compEntrada >= $temporada->fecha_inicial) && ($compEntrada <= $temporada->fecha_final))
										{
										$ResFechaInicial = $compEntrada;
										}
										else
										{
										$ResFechaInicial = $temporada->fecha_inicial;
										}
										//fecha Final de la reservacion dentro de la temporada
										if(($compSalida >= $temporada->fecha_inicial) && ($compSalida <= $temporada->fecha_final))
										{
										$ResFechaFinal = $compSalida;
										}
										else
										{
										$ResFechaFinal = $temporada->fecha_final;
										}

										$RFI = date("d-m-Y", strtotime($ResFechaInicial));
										$RFF = date("d-m-Y", strtotime($ResFechaFinal));
										$RFF = date("d-m-Y", strtotime ($ResFechaFinal."+ 1 days"));
									?>
                                    
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="heading{{$temporada->idtemporada}}">
                                                <h2 class="mb-0" align="center">
                                                    <?php
                                                        $tipo_inmueble=DB::table('tipo_inmueble')
                                                        ->where('idtipo_inmueble','=',$temporada->idtipo_inmueble)
                                                        ->first();
                                                    ?>
                                                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$temporada->idtemporada}}">
                                                    <span class="badge badge-secondary">
														<h4>
															<strong>
																<u><font color="white">  {{$temporada->nombre}} </font></u><br><br>
																<font color="white" size="1"><strong>Temporada del:</font><font color="white" size="1">{{$fechaInicial}} / {{$fechaFinal}}</font><br>
																<font color="white" size="2"><strong>Entrada:</strong></font> <font color="white" size="2">{{$RFI}},</font> <font color="white" size="2"><strong>Salida:</strong></font> <font color="white" size="2">{{$RFF}}</font><br><br>
																<font color="white"><strong> <u>Ver Disponibles</u> <i class="fas fa-arrow-right"></i></strong></font>
															<strong>
														</h4>
													</span>
                                                    </button>									
                                                </h2>
                                            </div>
                                            <div id="collapse{{$temporada->idtemporada}}" class="collapse" aria-labelledby="heading{{$temporada->idtemporada}}" data-parent="#accordionExample">
                                                <div class="card-body">
                                                  	
														<?php
															$inmuebles=DB::table('inmueble as i')
															->join('tipo_inmueble as ti','i.idtipo_inmueble','=','ti.idtipo_inmueble')
															->select('i.idinmueble','i.idtipo_inmueble','i.nombre','i.descripcion','i.estado_inmueble','i.estado','ti.nombre as Tipo','ti.minpersonas','ti.maxpersonas')
															->where('i.idtipo_inmueble','=',$temporada->idtipo_inmueble)
															->where ('i.estado','=','Habilitado')
															->orderBy('ti.nombre','nombre','asc')
															->get();
														?>
														@foreach($inmuebles as $inmueble)
														<?php
															$DetRes=DB::table('detalle_reservacion')
															->whereBetween('fecha_entrada', [$ResFechaInicial, $ResFechaFinal])
															->where('idinmueble','=',$inmueble->idinmueble)
															->orwhereBetween('fecha_salida', [$ResFechaInicial, $ResFechaFinal])
															->where('idinmueble','=',$inmueble->idinmueble)
															->get();
														?>
														
															@if($DetRes->count() < 1)
																<div class="form-group">
																	<div class="col-md-4 room-wrap animate-box">
																		<div class="desc text-center">
																			{{Form::open(array
																				(
																					'action' => 'CarritoSessionController@add',
																					'method' => 'POST',
																					'role' => 'form'
																				))
																			}}
																			{{ csrf_field() }}
																				<?php  
																					$imginmueble = DB::table('inmueble_img')
																					->where('idinmueble', '=', $inmueble->idinmueble)
																					->first();
																				?>
																				@if(isset($imginmueble))
																					<a href="{{url('imagenes/inmuebles/', $imginmueble->imagen)}}" class="room image-popup-link" ><img src="{{url('imagenes/inmuebles/', $imginmueble->imagen)}}" style="max-width:100%;width:auto;height:auto;"></a>
																				@endif
																				<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i></span>
																				<h3><a href="{{URL::action('VistaInmuebleController@show',$inmueble->idinmueble)}}" target="_blank"><strong><u>{{$inmueble->nombre}}</u></strong></a></h3><br>
																				<p class="price">
																						<?php  
																							$user=DB::table('users')->first();
																						?>
																						<span class="currency"><font color="green">Disponible</font></span>
																				</p>
																				<ul>
																					
																					<li><strong> {{$inmueble->descripcion}}</strong></li>
																					<li><font color="black"><strong>Capacidad:</font> <font color="black">{{$tipo_inmueble->minpersonas}} a {{$tipo_inmueble->maxpersonas}}</strong></font> Personas</li>
																				</ul>
																				<label>Mayores a 12 años <font color="black">{{ $user->moneda }} {{number_format($temporada->precio,2, '.', ',')}} </font> c/u:</label>
																				@if($temporada->promopersonagratis = "Habilitado")
																					<br>
																					<font color="black" size="1"><strong>Si pagan al menos 3 adultos, Gratis:</font> <font color="black">{{$temporada->promonumpersonas}}</strong></font>
																				@endif
																				<select name="cant_mayores" class="form-control">
																					<option selected value="{{$tipo_inmueble->minpersonas}}">{{$tipo_inmueble->minpersonas}}</option>
																					@for ($i = $tipo_inmueble->minpersonas; $i <= $tipo_inmueble->maxpersonas; $i++)
																						<option value="{{$i}}">{{$i}}</option>
																					@endfor
																				</select>
																				<label>Menores a 12 años <font color="black">{{ $user->moneda }} {{number_format($temporada->preciomenor,2, '.', ',')}} </span></font> c/u:</label>
																				@if($tipo_inmueble->menoresxpareja != 0)
																					<br>
																					<font color="black" size="1">Menores gratis por hospedaje:</font> <font color="black">{{$tipo_inmueble->menoresxpareja}}</font>
																				@endif<br>
																				<select name="cant_menores" class="form-control">
																					<option selected value="0">0</option>
																					@for ($i = 0; $i <= $tipo_inmueble->maxpersonas; $i++)
																						<option value="{{$i}}">{{$i}}</option>
																					@endfor
																				</select>
																				@if($temporada->mascotas == "SI")
																					<label>Mascotas <font color="black">{{ $user->moneda }} {{number_format($temporada->preciomascota,2, '.', ',')}} </span></font> c/u:</label>
																					<select name="cant_mascotas" class="form-control">
																						@for ($i = 0; $i <= $tipo_inmueble->maxmascotas; $i++)
																							<option value="{{$i}}">{{$i}}</option>
																						@endfor
																					</select>
																					<font color="black" size="1">- No nos hacemos responsables por daños causados por su mascota.</font><br>
																					<font color="black" size="1">- No es permitido el ingreso de mascotas al restaurante.</font><br>
																					<font color="black" size="1">- Solo se permite el ingreso de razas pequeñas y medianas.</font><br>
																				@else
																					<input type="hidden" name="cant_mascotas" value="0">
																				@endif
																				<button class="btn btn-success" type="submit" id="bt_add"><i class="far fa-calendar-plus"></i> Agregar</button>
																				<!--DATOS OCULTOS-->
																				<input type="hidden" name="idtemporada" value="{{$temporada->idtemporada}}">
																				<input type="hidden" name="idinmueble" value="{{$inmueble->idinmueble}}">
																				<input type="hidden" name="nombre" value="{{$inmueble->nombre}}">
																				<input type="hidden" name="precioadulto" value="{{$temporada->precio}}">
																				<input type="hidden" name="preciomenor" value="{{$temporada->preciomenor}}">
																				<input type="hidden" name="preciomascota" value="{{$temporada->preciomascota}}">
																				<input type="hidden" name="menoresxpareja"  value="{{$temporada->menoresxpareja}}">
																				<input type="hidden" name="promopersonagratis"  value="{{$temporada->promopersonagratis}}">
																				<input type="hidden" name="promonumpersonas"  value="{{$temporada->promonumpersonas}}">
																				<input type="hidden" name="minpersonas"  value="{{$inmueble->minpersonas}}">
																				<input type="hidden" name="maxpersonas"  value="{{$inmueble->maxpersonas}}">
																				<input type="hidden" name="fecha_entrada"  value="{{$ResFechaInicial}}">
																				<input type="hidden" name="fecha_salida"  value="{{$ResFechaFinal}}">
																			{{Form::close()}}
																		</div>
																	</div>
																</div>
															@else
																@foreach($DetRes as $dr)
																	<div class="form-group">
																		<div class="col-md-4 room-wrap animate-box">
																			<div class="desc text-center">
																				<?php  
																					$imginmueble = DB::table('inmueble_img')
																					->where('idinmueble', '=', $inmueble->idinmueble)
																					->first();
																				?>
																				@if(isset($imginmueble))
																					<a href="{{url('imagenes/inmuebles/', $imginmueble->imagen)}}" class="room image-popup-link" ><img src="{{url('imagenes/inmuebles/', $imginmueble->imagen)}}" style="max-width:100%;width:auto;height:auto;"></a>
																				@endif
																				<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i></span>
																				<h3><a href="{{URL::action('VistaInmuebleController@show',$inmueble->idinmueble)}}" target="_blank"><strong><u>{{$inmueble->nombre}}</u></strong></a></h3><br>
																				<p class="price">
																						<?php  
																							$user=DB::table('users')->first();
																						?>
																						<span class="currency"><font color="Red">Reservado</font></span>
																				</p>
																				<?php
																					$resOcuEntrada = date("d-m-Y", strtotime($dr->fecha_entrada));
																					$resOcuSalida = date("d-m-Y", strtotime ($dr->fecha_salida."+ 1 days"));
																				?>
																				<ul>
																					<li><font color="black"><strong>Entrada:</strong></font> <strong>{{$resOcuEntrada}}</strong></li>
																					<li><font color="black"><strong>Salida:</strong></font> <strong>{{$resOcuSalida}}</strong></li>
																				</ul>

																			</div>
																		</div>
																	</div>
																@endforeach
															@endif
														
														@endforeach
                                                  	
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endforeach

				
			</div>
		</div>

		<div id="colorlib-subscribe" style="background-image: url({{asset('hltemplate/images/pie/pie.jpg')}});">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
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

	</script>	
	
@endsection
