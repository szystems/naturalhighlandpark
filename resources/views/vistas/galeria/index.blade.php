@extends('layouts.app')

@section('content')
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{asset('hltemplate/images/portada/1.jpg')}});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner slider-text-inner2 text-center">
				   					<h2>La mejor vista desde dentro del corazón de la naturaleza.</h2>
									   <h1>Galeria &amp; Fotos</h1>
									   
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
							<img src="{{asset('hltemplate/images/logo/logo.png')}}" alt="Facebook"  height="128">
						</span>
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
						<h2>Galeria &amp; Fotos</h2>
						<p>La mejor vista desde dentro del corazón de la naturaleza.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel owl-carousel2">

							<div class="item">
								<a href="{{asset('hltemplate/images/portada/1.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/portada/1.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Cabañas</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/portada/2.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/portada/2.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Restaurante</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/portada/3.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/portada/3.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Interior de Hospedaje</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/portada/4.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/portada/4.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Area de Fogatas</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/galeria/rest1.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/galeria/rest1.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Restaurante</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/galeria/rest2.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/galeria/rest2.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Restaurante</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/galeria/rest3.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/galeria/rest3.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Restaurante</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/galeria/picnicweb.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/galeria/picnicweb.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Picnic</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/galeria/picnicweb2.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/galeria/picnicweb2.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Picnic</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/galeria/hotel1web.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/galeria/hotel1web.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Hotel</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/galeria/hotelweb2.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/galeria/hotelweb2.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Hotel</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/galeria/granjita1.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/galeria/granjita1.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Granjita</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/galeria/granjita2.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/galeria/granjita2.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Granjita</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/galeria/granjita3.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/galeria/granjita3.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Granjita</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/galeria/gotcha1.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/galeria/gotcha1.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Gotcha</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/galeria/gotcha2.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/galeria/gotchaweb2.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Gotcha</a></h3>
									
								</div>
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/galeria/gotcha3.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/galeria/gotchaweb3.jpg')}});"></a>
								<div class="desc text-center">
									
									<h3><a href="">Gotcha</a></h3>
									
								</div>
							</div>
						</div>
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