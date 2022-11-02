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
							<img src="{{asset('hltemplate/images/logo/logo.png')}}" alt="Parque" >
						</span>
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
						<h2>Parque</h2>
						<p></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel owl-carousel2">

							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/1.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/1.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/2.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/2.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/3.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/3.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/4.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/4.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/5.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/5.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/6.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/6.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/7.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/7.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/8.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/8.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/9.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/9.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/10.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/10.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/11.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/11.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/12.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/12.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/13.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/13.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/14.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/14.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/15.png')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/15.png')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/16.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/16.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/17.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/17.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Parque/18.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Parque/18.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
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
							<img src="{{asset('hltemplate/images/atracciones/LogoGranjitaWeb.png')}}" alt="Granjita" width="128" height="128">
						</span>
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
						<h2>Granjita</h2>
						<p>Disfruta de un lugar donde se puede compartir en una granjita de color  roja, llena de amor hacia los pequeños de la casa. Ven a disfrutar de la variedad que nuestros animales domésticos amigables. </p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel owl-carousel2">

							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/1.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/1.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/2.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/2.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/3.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/3.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/4.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/4.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/5.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/5.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/6.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/6.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/7.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/7.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/8.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/8.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/9.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/9.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/10.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/10.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/11.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/11.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/12.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/12.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/13.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/13.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/14.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/14.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/15.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/15.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/16.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/16.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/17.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/17.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Granjita/18.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Granjita/18.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
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
							<img src="{{asset('hltemplate/images/atracciones/Picnicweb.png')}}" alt="Granjita" width="128" height="128">
						</span>
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
						<h2>Picnic</h2>
						<p></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel owl-carousel2">

							<div class="item">
								<a href="{{asset('hltemplate/images/Picnic/1.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Picnic/1.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Picnic/2.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Picnic/2.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Picnic/3.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Picnic/3.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							<div class="item">
								<a href="{{asset('hltemplate/images/Picnic/4.jpg')}}" class="room image-popup-link" style="background-image: url({{asset('hltemplate/images/Picnic/4.jpg')}});"></a>
								{{-- <div class="desc text-center">
									<h3><a href="">Cabañas</a></h3>
								</div> --}}
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>

		

		<div id="colorlib-blog">
			<div class="container">
				<div class="row">
				
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span class="icon">
							
						</span>
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
						
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