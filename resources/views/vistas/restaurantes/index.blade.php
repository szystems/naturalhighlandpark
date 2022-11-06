@extends('layouts.app')

@section('content')
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{asset('hltemplate/images/fondos/restaurante.jpg')}});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner slider-text-inner2 text-center">
				   					<h2>Casa Antonieta &amp; Tzununah Bistro ¡Tu Paladar decide!</h2>
									   <h1>Restaurantes</h1>
									   
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		{{-- Restaurantes --}}

		<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<div class="row">

					<div class="col-md-6 room-wrap animate-box">
						<a href="{{asset('hltemplate/images/atracciones/CasaAntonietaweb.png')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/atracciones/CasaAntonietaweb.png')}});"></a>
						<div class="desc text-center">
							<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i></span>
							<h3><a href="rooms-suites.html">Casa Antonieta</a></h3>
							{{-- <p class="price">
								<span class="currency">$</span>
								<span class="price-room">199</span>
								<span class="per">/ per night</span>
							</p>
							<ul>
								<li><i class="icon-check"></i> Perfect for traveling couples</li>
								<li><i class="icon-check"></i> Breakfast included</li>
								<li><i class="icon-check"></i> Price does not include VAT &amp; services fee</li>
							</ul> --}}
							<p><a href="{{ url('/vistas/casaantonieta') }}" class="btn btn-primary">Ver Menu</a></p>
						</div>
					</div>

					<div class="col-md-6 room-wrap animate-box">
						<a href="{{asset('hltemplate/images/atracciones/Bistroweb.png')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/atracciones/Bistroweb.png')}});"></a>
						<div class="desc text-center">
							<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i></span>
							<h3><a href="rooms-suites.html">Tzununah Bistro</a></h3>
							{{-- <p class="price">
								<span class="currency">$</span>
								<span class="price-room">149</span>
								<span class="per">/ per night</span>
							</p>
							<ul>
								<li><i class="icon-check"></i> Only 10 rooms are available</li>
								<li><i class="icon-check"></i> Breakfast included</li>
								<li><i class="icon-check"></i> Price does not include VAT &amp; services fee</li>
							</ul> --}}
							<p><a href="{{ url('/vistas/tzununah') }}" class="btn btn-primary">Ver Menu</a></p>
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