@extends('layouts.app')

@section('content')
	
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{asset('hltemplate/images/portada/3.jpg')}});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner slider-text-inner2 text-center">
				   					<h2>Escoge lo Mejor</h2>
									   <h1>Carrito &amp; Reservacion</h1>
									   
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
				<h2>Carrito de Reservacion:</h2>
				<p><strong>Nota:</strong> Aquí vera todos los hospedajes que agrego a su carrito de reservación, revise su reservación y confirmela.</p>
				@if (Auth::guest())
					<p>Para confirmar su reservación debe registrarse como usuario o inicie sesión.</p>
					<p><a href="{{ url('/register') }}" class="btn btn-primary">Registrarse</a><a href="{{ url('/login') }}" class="btn btn-success">Login</a></p>
				@endif 
				<!--Mensaje de abono correcto-->
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                    {{session()->forget('alert-' . $msg)}}
                    @endforeach
                    
                </div> 
                <!-- fin .flash-message -->
                <!--Inicio carrito-->
				@if($carrito->count() != 0)
                <div class="card mb-4">
                    <header class="card-header">
                        <h5 class="h3 card-header-title"><strong>Detalles de Reservacion: </strong></h5>
                    </header>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if(Cart::isEmpty() != 1)
                                <div align="right">
                                    <a href="" data-target="#modal-vaciar" data-toggle="modal">
                                        <button class="genric-btn danger circle" style="pointer-events: none;" type="button">
                                            <i class="far fa-minus-square"></i> Vaciar Carrito
                                        </button>
                                    </a>
                                </div>
                            @endif
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th><p><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
                                    <th><p><strong>Hospedaje</strong></p></th>
                                    <th><p><strong>Entrada/Salida</strong></p></th>
                                    <th><p><strong>Promocion</strong></p></th>
                                    <th><p><strong>Mayores</strong></p></th>
                                    <th><p><strong>Menores</strong></p></th>
									<th><p><strong>Mascotas</strong></p></th>
                                    <th><p><strong>Sub-Total</strong></p></th>
                                    
                                </thead>
                                <?php
                                    $total=0;
                                ?>
                            @foreach ($carrito as $detalle)
                                <tr>
                                    <?php
                                        $total=$total + (($detalle->quantity * $detalle->price)+($detalle->quantity2 * $detalle->price2)+($detalle->quantity3 * $detalle->price3));
                                        $detalleFEntrada = date("d-m-Y", strtotime($detalle->fecha_entrada));
                                        $detalleFSalida = date("d-m-Y", strtotime ($detalle->fecha_salida."+ 1 days"));

                                        
                                    ?>
                                    <td align="left">
                                        <a href="" data-target="" data-toggle="modal">
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Hospedaje">
                                                <a href="" data-target="#modal-det-{{$detalle->id}}" data-toggle="modal">
                                                    <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
                                                        <i class="far fa-minus-square"></i>
                                                    </button>
                                                </a>
                                            </span>
                                        </a>
                                        <a href="" data-target="" data-toggle="modal">
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Hospedaje">
                                                <a href="" data-target="#modal-precio-{{$detalle->id}}" data-toggle="modal">
                                                    <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                                </a>
                                            </span>
                                        </a>
                                    </td>
                                    <td align="left"><p><strong>{{$detalle->name}}</strong></p></td>
                                    <td align="center"><p><font color="limegreen">{{$detalleFEntrada}}</font> / <font color="red">{{$detalleFSalida}}</font></p></td>
                                    <td align="left"><p>{{$detalle->comentario}}</p></td>
                                    <td align="left"><p><font color="orange"> {{$detalle->quantity}} * {{ $datosConfig->moneda }}{{number_format($detalle->price,2, '.', ',')}} = {{ $datosConfig->moneda }}{{number_format($detalle->quantity * $detalle->price,2, '.', ',')}}</font></p></td>
                                    <td align="center"><p><font color="orange">{{$detalle->quantity2}} * {{ $datosConfig->moneda }}{{number_format($detalle->price2,2, '.', ',')}} = {{ $datosConfig->moneda }}{{number_format($detalle->quantity2 * $detalle->price2,2, '.', ',')}}</font></p></td>
									<td align="center"><p><font color="orange">{{$detalle->quantity3}} * {{ $datosConfig->moneda }}{{number_format($detalle->price3,2, '.', ',')}} = {{ $datosConfig->moneda }}{{number_format($detalle->quantity3 * $detalle->price3,2, '.', ',')}}</font></p></td>
                                    <td align="left"><p><font color="Blue">{{ $datosConfig->moneda }}{{number_format(($detalle->quantity * $detalle->price) + ($detalle->quantity2 * $detalle->price2) + ($detalle->quantity3 * $detalle->price3),2, '.', ',')}}</font></p></td>
                                    
                                </tr>
                                @include('vistas.vcarrito.detalle.detmodal')
								@include('vistas.vcarrito.vaciar.vaciarcarritomodal')
								@include('vistas.vcarrito.detprecio.detmodalprecio')
                            @endforeach
                            <tr>
							<td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td align="right"><p><font color="Black"><strong>Total:<s/trong></font></p></td>
                                    <td><p><strong><font color="limegreen">{{ $datosConfig->moneda }}{{number_format($total,2, '.', ',')}}</font></strong></p></td>
                                    
                                </tr>
                            </table>
                        </div>
                        
                    </div>
                    <footer class="card-footer">
                        
                    </footer>
                </div>
					@if (Auth::guest())
							
					@elseif(Auth::user()->tipo_usuario == "Huesped")
						<p><a href="{{ url('/vistas/vcarrito/create') }}" class="btn btn-primary">Confirmar Reservación</a></p>
					@endif  
				@endif
                <!--Fin Carrito-->   
				         
				
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

	</script>	
	
@endsection
