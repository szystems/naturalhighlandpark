@extends('layouts.app')

@section('content')
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{asset('hltemplate/images/fondos/parque.jpg')}});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner slider-text-inner2 text-center">
				   					<h2>¡Disfruta de la naturaleza!</h2>
									   <h1>Parque</h1>
									   
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
						<span class="icon">
							<img src="{{asset('hltemplate/images/logo/logo.png')}}" alt="Facebook" >
						</span>
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
						<h4>Mapa</h4>
						<p>Guíate hacia la aventura.</p>
					</div>
				</div>
				<div class="row">
					
						
				<div class="wrapper">
					<img src="{{asset('hltemplate/images/atracciones/mapa.jpg')}}" class="img-responsive" alt="Responsive image">
				</div>
			      
			   </div>
			</div>
		</div>

		<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span class="icon">
							<img src="{{asset('hltemplate/images/logo/logo.png')}}" alt="Facebook"  height="128">
						</span>
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
						<h2>Atracciones</h2>
						<p>Las mejores atracciones en medio de la naturaleza para disfrutar con familia y amigos.</p>
						<p> Somos <strong>pet friendly</strong> permitimos acceso a tu mascota de razas pequeñas y medianas al parque y cabañas (No permitido en restaurantes y glamping)</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel owl-carousel2">

							<div class="item">
								<a href="{{asset('hltemplate/images/atracciones/Bistroweb.png')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/atracciones/Bistroweb.png')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Tzununah Bistro</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/atracciones/CasaAntonietaweb.png')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/atracciones/CasaAntonietaweb.png')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Casa Antonieta</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/atracciones/eventosweb.png')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/atracciones/eventosweb.png')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Eventos</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/atracciones/FincaWeb.png')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/atracciones/FincaWeb.png')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Finca Villa Antonieta</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/atracciones/glampingweb.png')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/atracciones/glampingweb.png')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Glampings</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/atracciones/Gotchaweb.png')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/atracciones/Gotchaweb.png')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Gotcha</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/atracciones/LogoGranjitaWeb.png')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/atracciones/LogoGranjitaWeb.png')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Granjita</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/atracciones/PetsWeb.png')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/atracciones/PetsWeb.png')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Mascotas</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/atracciones/Picnicweb.png')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/atracciones/Picnicweb.png')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Picnic</a></h3>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span class="icon">
							<img src="{{asset('hltemplate/images/logo/logo.png')}}" alt="Facebook"  height="128">
						</span>
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
						<h2>Tarifario</h2>
						<p>A continuación veras las tarifas de las actividades y hospedaje de nuestro parque.</p>
					</div>
				</div>
				<div class="row" align="center">
					<div class="col-md-12 animate-box">
						<h2>Actividades</h2>
						<img src="{{asset('hltemplate/images/Tarifario/Tarifario-Actividades.jpg')}}" class="img-responsive" alt="Responsive image">
						<br>
						<h2>Hospedaje de Vienes a Domingo</h2>
						<img src="{{asset('hltemplate/images/Tarifario/Tarfiario-Fin-de-Semana.jpg')}}" class="img-responsive" alt="Responsive image">
						<br>
						<h2>Hospedaje de Lunes a Jueves</h2>
						<img src="{{asset('hltemplate/images/Tarifario/tarifario-de-Hospedaje.jpg')}}" class="img-responsive" alt="Responsive image">
						<br>
						<h2>Hospedaje en Carpas</h2>
						<img src="{{asset('hltemplate/images/Tarifario/Tarifario-Glamping.jpg')}}" class="img-responsive" alt="Responsive image">
					</div>
				</div>
			</div>
		</div>

		
	
		<div id="colorlib-subscribe" style="background-image: url({{asset('hltemplate/images/pie/pie.jpg')}});">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
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