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
									   <h1>Cabañas &amp; Glampings</h1>
									   
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		@foreach($tipo_inmuebles as $tipo)
		<?php  
			$inmuebles=DB::table('inmueble')
			->where ('idtipo_inmueble','=',$tipo->idtipo_inmueble)
			->where ('estado_inmueble','=','Activo')
			->where ('estado','=','Habilitado')
			->orderBy('nombre','asc')
			->get();

			$caracteristicas=DB::table('caracteristica')
			->where ('idtipo_inmueble','=',$tipo->idtipo_inmueble)
			->orderBy('idcaracteristica','asc')
			->get();			
		?>
		<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   	<div class="slider-text-inner slider-text-inner2 text-center">
					   	<span class="icon">
							<img src="{{asset('hltemplate/images/logo/Hotelweb.png')}}" alt="Facebook"  height="150"><br>
						</span>
					   <font color="gold"><span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i></font></span>
						<h1>{{$tipo->nombre}}</h1>
						<p><span class="currency"><strong>{{$tipo->descripcion}}</strong>
						<p>
							<strong><font color="green"><i class="icon-users"></i></font> Capacidad: </strong><font color="orange">{{$tipo->minpersonas}} a {{$tipo->maxpersonas}} Personas</font></span><br>
						@if($tipo->menoresxpareja > 0)	
						<strong><font color="green"><i class="fa fa-child"></i></font> Menores a 12 años gratis por 1ra. Pareja: </strong><font color="orange">{{$tipo->menoresxpareja}}</font><br>
						@endif
						<!--@foreach($caracteristicas as $caracteristica)
						<strong><font color="green"><i class="fas fa-check-double"></i></font> {{$caracteristica->nombre}}</strong>@if($caracteristica->descripcion != null): <font color="orange">{{$caracteristica->descripcion}}</font>@endif<br>
						@endforeach-->
						</p>
						<p><a href="{{ url('/vistas/reservaciones') }}" target="_blank" class="btn btn-success">Reservar ahora!</a></p>
					</div>
				</div>
				<div class="row">
					
					@foreach($inmuebles as $inmueble)
						<div class="col-md-4 room-wrap animate-box">
							<?php  
								$imgsinmueble = DB::table('inmueble_img')
								->where('idinmueble', '=', $inmueble->idinmueble)
								->take(1)
								->get();
							?>
							<div class="desc text-center">
								
								
								@foreach($imgsinmueble as $img)
									<a href="{{url('imagenes/inmuebles/', $img->imagen)}}" class="room image-popup-link" ><img src="{{url('imagenes/inmuebles/', $img->imagen)}}" style="max-width:100%;width:auto;height:auto;"></a>
								@endforeach
								<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i></span>
								<h3><a href="{{URL::action('VistaInmuebleController@show',$inmueble->idinmueble)}}"><strong>{{$inmueble->nombre}}</strong></a></h3><br>
								
								<ul>
									
									<li><strong> {{$inmueble->descripcion}}</strong></li>
								</ul>
								<p><a href="{{ url('/vistas/reservaciones') }}" target="_blank" class="btn btn-success">Reservar ahora!</a></p>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
		@endforeach
	
		<div id="colorlib-subscribe" style="background-image: url({{asset('hltemplate/images/pie/pie.jpg')}});">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->						<h2>Contáctanos</h2>
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