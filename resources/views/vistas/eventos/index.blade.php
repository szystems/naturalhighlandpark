@extends('layouts.app')

@section('content')
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{asset('hltemplate/images/fondos/eventos.jpg')}});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner slider-text-inner2 text-center">
				   					<h2>¡Disfruta de los mejores eventos!</h2>
									   <h1>Eventos</h1>
									   
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span class="icon">
							<img src="{{asset('hltemplate/images/atracciones/eventosweb.png')}}" alt="Facebook"  height="200">
						</span>
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
						<h2>Eventos</h2>
						<p><strong>¡Celebra tu momento especial con nosotros!</strong></p>
						<p>Disfruta de los mejores eventos en un ambiente natural donde el  entorno siempre será verde y fresco; lleno de color en un clima agradable. </p>
						<h2>Contáctanos</h2>
						<p>Estamos para servirle, somos una empresa que se dedica a la satisfacción de nuestros clientes dándoles una experiencia única para compartir con sus seres queridos. </p>
						<strong><p>Numero de PBX 7910 6868 </p>
						<p>Numero de telefono directo +(502) 5056 5519</p></strong>
					</div>
				</div>
				
			</div>
		</div>

		<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel owl-carousel2">

							<div class="item">
								<a href="{{asset('hltemplate/images/Eventos/1.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Eventos/1.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Eventos/2.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Eventos/2.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Eventos/3.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Eventos/3.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Eventos/4.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Eventos/4.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Eventos/5.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Eventos/5.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Eventos/6.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Eventos/6.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Eventos/7.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Eventos/7.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Eventos/8.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Eventos/8.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
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