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
									   <h1>Hospedaje &amp; Espacios</h1>
									   
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i></span>
						<h2><strong>{{$inmueble->nombre}}</strong></h2>
						<p>{{$inmueble->descripcion}}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel owl-carousel2">
							@foreach($inmuebleImagenes as $img)
							<div class="item">
								<a href="{{url('imagenes/inmuebles', $img->imagen)}}" class="room image-popup-link"><img src="{{url('imagenes/inmuebles', $img->imagen)}}" style="max-width:100%;width:auto;height:auto;"></a>
								
							</div>
							@endforeach
						</div>
					</div>
					<div class="desc text-center">
						<h3><a href="rooms-suites.html"><strong>Tipo Hospedaje: <font color="green">{{$inmueble->Tipo}}</font></strong></a></h3><br>
						<ul>
						<p>
							<strong><font color="green"><i class="icon-users"></i></font> Capacidad: </strong><font color="orange">{{$inmueble->minpersonas}} a {{$inmueble->maxpersonas}} Personas</font></span><br>
							@if($inmueble->menoresxpareja > 0)	
							<strong><font color="green"><i class="fa fa-child"></i></font> Menores a 12 años gratis por 1ra. Pareja: </strong><font color="orange">{{$inmueble->menoresxpareja}}</font><br>
							@endif
							@foreach($caracteristicas as $caracteristica)
							<strong><font color="green"><i class="fas fa-check-double"></i></font> {{$caracteristica->nombre}}</strong>@if($caracteristica->descripcion != null): <font color="orange">{{$caracteristica->descripcion}}</font>@endif<br>
							@endforeach
							</p>
							{{-- <p><a href="{{ url('/vistas/reservaciones') }}" target="_blank" class="btn btn-success">Reservar ahora!</a></p> --}}
						</ul>
						
						@foreach($temporadas as $temporada)
						<?php  
							$user=DB::table('users')->first();
						?>
							
							<?php
								$hoy = date('Y-m-d');
								
								$finicial = $temporada->fecha_inicial;
								$ffinal = $temporada->fecha_final;
							?>
							@if (($hoy >= $finicial) && ($hoy <= $ffinal))
							<!--<h3><a href="rooms-suites.html"><strong>Temporada:</strong></a></h3><br>
							<ul>
								<?php
									$finicialVista = date("d-m-Y", strtotime($temporada->fecha_inicial));
									$ffinalVista = date("d-m-Y", strtotime($temporada->fecha_final));
								?>
								<li><i class="icon-target3"></i><strong>Temporada: </strong> <font color="orange">{{$finicialVista}} / {{$ffinalVista}}</font></li>
								@if($temporada->promopersonagratis = "Habilitado")
								<li><i class="icon-users"></i><strong>Persona(s) gratis al pagar minimo 3: <font color="orange">{{$temporada->promonumpersonas}} Persona(s).</font></strong> </li>
								@endif
							</ul>
							
							<h3><a href="rooms-suites.html"><strong>Precio</strong></a></h3>
							
							 <p class="price">
								
								Precio Mayores a 12 años: <span class="currency">{{ $user->moneda }}</span>
										
								<span class="price-room"> {{number_format($temporada->precio,2, '.', ',')}} </span>
										
							</p>
							<p class="price">
								
								Precio Menores a 12 años: <span class="currency">{{ $user->moneda }}</span>
										
								<span class="price-room"> {{number_format($temporada->preciomenor,2, '.', ',')}} </span>
										
							</p>
							
							<p><a href="{{ url('/vistas/reservaciones') }}" target="_blank" class="btn btn-success btn-book">Reservar ahora</a></p>
							<div class="col-md-12 text-center animate-box">
								<a href="{{ url('/vistas/inmuebles') }}">Ver todos los inmuebles <i class="icon-arrow-right3"></i></a>
							</div>-->
							@endif
						@endforeach
						
					</div>

				</div>
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
@endsection