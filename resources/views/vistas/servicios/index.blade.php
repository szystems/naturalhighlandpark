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
						<h2>Mapa</h2>
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

		<div id="colorlib-blog">
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
				
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						
						
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
						<h2>Servicios</h2>
						<p>Servicios Generales: <font color="orange"></font></p>
						<p>
							<a href="https://www.szystems.com/naturalhighlandpark/public/tarifarios/Servicios.pdf" class="btn btn-danger" role="button" target="blank">Descargar Tarifario Servicios</a>
							<iframe   width="100%" height="500" src="https://www.szystems.com/naturalhighlandpark/public/tarifarios/Servicios.pdf"></iframe>
						</p>
						<p>Gotcha: <font color="orange"></font></p>
						<p>
							<a href="https://www.szystems.com/naturalhighlandpark/public/tarifarios/Gotcha.pdf" class="btn btn-danger" role="button" target="blank">Descargar Tarifario Gotcha</a>
							<iframe   width="100%" height="500" src="https://www.szystems.com/naturalhighlandpark/public/tarifarios/Gotcha.pdf"></iframe>
						</p>
						<p>Picnic: <font color="orange"></font></p>
						<p>
							<a href="https://www.szystems.com/naturalhighlandpark/public/tarifarios/Picnic.pdf" class="btn btn-danger" role="button" target="blank">Descargar Tarifario Picnic</a>
							<iframe   width="100%" height="500" src="https://www.szystems.com/naturalhighlandpark/public/tarifarios/Picnic.pdf"></iframe>
						</p>
						
					</div>
				</div>
				<!--<div class="blog-flex">
					<div class="video colorlib-video" style="background-image: url({{asset('hltemplate/images/blog-3.jpg')}});">
						<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video"></i></a>
						<div class="overlay"></div>
					</div>
					<div class="blog-entry">
						<div class="row">
							<div class="col-md-12 animate-box">
								<a href="blog.html" class="blog-post">
									<span class="img" style="background-image: url({{asset('hltemplate/images/blog-1.jpg')}});"></span>
									<div class="desc">
										<span class="date">January 14, 2018</span>
										<h3>A Definitive Guide to the Best Dining</h3>
										<span class="cat">Activities</span>
									</div>
								</a>
							</div>
							<div class="col-md-12 animate-box">
								<a href="blog.html" class="blog-post">
									<span class="img" style="background-image: url({{asset('hltemplate/images/blog-2.jpg')}});"></span>
									<div class="desc">
										<span class="date">January 14, 2018</span>
										<h3>How These 5 People Found The Path to Their Dream Trip</h3>
										<span class="cat">Activities</span>
									</div>
								</a>
							</div>
							<div class="col-md-12 animate-box">
								<a href="blog.html" class="blog-post">
									<span class="img" style="background-image: url({{asset('hltemplate/images/blog-3.jpg')}});"></span>
									<div class="desc">
										<span class="date">January 14, 2018</span>
										<h3>Our Secret Island Boat Tour Is just for You</h3>
										<span class="cat">Activities</span>
									</div>
								</a>
							</div>
							<div class="col-md-12 animate-box text-right">
								<a href="#">View all blog post <i class="icon-arrow-right3"></i></a>
							</div>
						</div>
					</div>
				</div>-->
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