@extends('layouts.app')

@section('content')
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{asset('hltemplate/images/portada/4.jpg')}});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner slider-text-inner2 text-center">
				   					<h2>¡Ven y disfruta de nuestro hospedaje! </h2>
									   <h1>Historia</h1>
									   
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
							<img src="{{asset('hltemplate/images/logo/logo.png')}}" alt="Facebook"  height="128">
						</span>
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2>Historia</h2>
						<p>Eramos una finca agricola dedicada a la producción de café y aguacate Haz, en el año 2017 buscando nuevas oportunidades tanto para la finca como para las personas que en ella laboran se visualizó la oportunidad de desarrollar un proyecro turistico que empleria diez y seis  hectareas de terreno, conviertiendo parte de ella en un destino turístico sin igual, se trabajo  con mucho esfuerzo y dedicación durante tres años,  para transformar desde el ingreso a la comunidad hasta citurarla en el mapa, además de recombertir las competencias de los colaboradores de la misma y que pudieran trabajar en la atención a turistas. Más que una finca, ahora somos una empresa que acerca la naturaleza en nuestras instalaciones de hotelería, restuarantes, y parque.</p>
						<p>Este espacio fue pensado y diseñado para encontrar paz y tranquilidad. La visión de este proyecto viene de muchos años atrás ya que desde niños los propietarios disfrutaron del campo junto a su familia. El sueño de que más familias tuvieran la oportunidad de tener esta experiencia, hizo realidad el proyecto.  </p>
						<h2>Misión </h2>
						<p>Somos una empresa de servicios turisticos rurales que ofrece experienicas únicas e inolvidables en un ambiente natural y seguro cuyo principal interés es la satisfacción de nuestros clientes. </p>
						<h2>Vision </h2>
						<p>Ser reconocidos en el sur occidente del país como una empresa de servicios turisticos innovadora, basada en principios y valores como: el respeto, la honestidad, la responsabilidad, la resiliencia, el trabajo en equipo, la comunicación asertiva, y el desarrollo del talento humano que promueve el desarrollo local, mediante la generación de oportunidades laborales. </p>
						<h2>Lo que somos </h2>
						<p>En Natural Highland Park, podrián encontrar un sitio perfecto para disfrutar con amigos y familia adqueriendo de una experiencia agradable en medio de la naturaleza, dejando a un lado la vida cotidiana y encontrando la paz de la naturaleza que nos rodea. Cuenta con una infinidad de espacios al aire libre, diseñador para disfrutar y crear recuerdos que perduran en el tiempo.
						Podrán realizar actividades adicionales dentro del parque y elegir entre dos restaurantes distintos diseñados para hacer de su visita una experiencia única y diferente. 
						</p>
						<h2>Descripción General</h2>
						<p>¡Ven y disfruta de nuestro hospedaje! Nuestro hotel cuenta con dos opciones de hospedaje: nuestras cabañitas y glampings.  </p>
						<p>Las cabañas cuentan con un diseño rustico y acogedor; llena de acabados finos y diseños distintos en cada una de ellas, haciendo de cada cabaña únicas en su interior y exterior. Nuestro hotel cuenta con deiciocho cabañas donde nuestra prioridad es la satisfacción de nuestros clientes.   </p>
						<p>Glamping Monarca, ofrece una experiencia única en cinco carpas equipadas con todas las comodidades en medio del bosque nuboso. Además de ofrecer un ambiente tranquilo en medio de la naturaleza, tiene una area exclusiva donde el huesped cuenta con una sala en el exterior, servicio de baño y ducha privada. Es una experencia donde la comodidad y la naturaleza se vuelven uno.   </p>
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
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
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