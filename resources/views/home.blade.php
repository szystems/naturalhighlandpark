@extends('layouts.app')

@section('content')
<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(hltemplate/images/portada/1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Bienvenido a </h2>
				   					<h1>Highland Natural Park</h1>
										<!--<p><a href="{{ url('/vistas/reservaciones') }}" class="btn btn-primary btn-demo"></i> Reservar</a> <a href="{{ url('/vistas/habitaciones') }}" class="btn btn-primary btn-learn">ver Habitaciones</a></p>-->
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(hltemplate/images/portada/2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Descubre &amp; Disfruta</h2>
				   					<h1>Todo lo que necesitas en Highland Natural Park</h1>
										<!--<p><a href="{{ url('/vistas/reservaciones') }}" class="btn btn-primary btn-demo"></i> Reservar</a> <a href="{{ url('/vistas/habitaciones') }}" class="btn btn-primary btn-learn">ver Habitaciones</a></p>-->
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(hltemplate/images/portada/3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluids">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Estas invitado</h2>
				   					<h1>Conocemos lo que te gusta</h1>
										<!--<p><a href="{{ url('/vistas/reservaciones') }}" class="btn btn-primary btn-demo"></i> Reservar</a> <a href="{{ url('/vistas/habitaciones') }}" class="btn btn-primary btn-learn">ver Habitaciones</a></p>-->
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(hltemplate/images/portada/4.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Ven &amp; disfruta de d??as inolvidables</h2>
				   					<h1>En el coraz??n de Highland Natural Park</h1>
										<!--<p><a href="{{ url('/vistas/reservaciones') }}" class="btn btn-primary btn-demo"></i> Reservar</a> <a href="{{ url('/vistas/habitaciones') }}" class="btn btn-primary btn-learn">ver Habitaciones</a></p>-->
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>	   	
			  	</ul>
		  	</div>
		</aside>

		<!--<div id="colorlib-reservation">
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
												<input type="text" id="entrada" name="entrada" class="form-control datepicker" placeholder="Check-in date">
											</div>
										</div>
									</div>
									<div class="col-md-2">
										<div class="form-group">
											<label for="date">Salida:</label>
											<div class="form-field">
												<i class="icon icon-calendar2"></i>
												<input type="text" id="salida" name="salida" class="form-control datepicker" placeholder="Check-out date">
												
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
		</div>-->

		<div id="colorlib-services">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						
						<div class="services">
							<span class="icon">
								<img src="hltemplate/images/logo/Hotelweb.png" alt="Facebook"  height="150">
							</span>
							<h3><strong>Highland Natural Park</strong></h3>
							<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
							<p>??Ven y disfruta de nuestro hospedaje! Nuestro hotel cuenta con dos opciones de hospedaje: nuestras caba??itas y glampings.  </p>
							<p>Las caba??as cuentan con un dise??o rustico y acogedor; llena de acabados finos y dise??os distintos en cada una de ellas, haciendo de cada caba??a ??nicas en su interior y exterior. Nuestro hotel cuenta con deiciocho caba??as donde nuestra prioridad es la satisfacci??n de nuestros clientes.   </p>
							<p>Glamping Monarca, ofrece una experiencia ??nica en cinco carpas equipadas con todas las comodidades en medio del bosque nuboso. Adem??s de ofrecer un ambiente tranquilo en medio de la naturaleza, tiene una area exclusiva donde el huesped cuenta con una sala en el exterior, servicio de ba??o y ducha privada. Es una experencia donde la comodidad y la naturaleza se vuelven uno.   </p>
						</div>
					</div>
					<!--<div class="col-md-3 animate-box text-center">
						<div class="services">
							<span class="icon">
								<img src="hltemplate/images/servicios/Granjita.png" alt="Facebook" width="128" height="128">
							</span>
							<h3>Granjita Highland</h3>
							<p>Un lugar magn??fico para los peque??os de casa y toda la familia, ven a disfrutar la granjita con animales dom??sticos amigables, conoce al verdadero Joaqu??n el Burro y sus amigos, Puedes alimentarlos y tomarte fotograf??as con ellos.</p>
						</div>
					</div>
					<div class="col-md-3 animate-box text-center">
						<div class="services">
							<span class="icon">
								<img src="hltemplate/images/servicios/Piscinas.png" alt="Facebook" width="128" height="128">
							</span>
							<h3>Piscinas</h3>
							<p>Ven y divi??rtete con nuestras piscinas climatizadas tanto en la ma??ana como en la noche.</p>
						</div>
					</div>
					<div class="col-md-3 animate-box text-center">
						<div class="services">
							<span class="icon">
								<img src="hltemplate/images/servicios/MountainBike.png" alt="Facebook" width="128" height="128">
							</span>
							<h3>Mountain Bike</h3>
							<p>Para los extremos tenemos nuestras pistas profesionales de mountain bike, ven a divertirte y practicar un deporte muy original.</p>
						</div>
					</div>-->
				
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Historia</h2>
						<p>Eramos una finca agricola dedicada a la producci??n de caf?? y aguacate Haz, en el a??o 2017 buscando nuevas oportunidades tanto para la finca como para las personas que en ella laboran se visualiz?? la oportunidad de desarrollar un proyecro turistico que empleria diez y seis  hectareas de terreno, conviertiendo parte de ella en un destino tur??stico sin igual, se trabajo  con mucho esfuerzo y dedicaci??n durante tres a??os,  para transformar desde el ingreso a la comunidad hasta citurarla en el mapa, adem??s de recombertir las competencias de los colaboradores de la misma y que pudieran trabajar en la atenci??n a turistas. M??s que una finca, ahora somos una empresa que acerca la naturaleza en nuestras instalaciones de hoteler??a, restuarantes, y parque.</p>
						<p>Este espacio fue pensado y dise??ado para encontrar paz y tranquilidad. La visi??n de este proyecto viene de muchos a??os atr??s ya que desde ni??os los propietarios disfrutaron del campo junto a su familia. El sue??o de que m??s familias tuvieran la oportunidad de tener esta experiencia, hizo realidad el proyecto.  </p>
						<h2>Misi??n </h2>
						<p>Somos una empresa de servicios turisticos rurales que ofrece experienicas ??nicas e inolvidables en un ambiente natural y seguro cuyo principal inter??s es la satisfacci??n de nuestros clientes. </p>
						<h2>Vision </h2>
						<p>Ser reconocidos en el sur occidente del pa??s como una empresa de servicios turisticos innovadora, basada en principios y valores como: el respeto, la honestidad, la responsabilidad, la resiliencia, el trabajo en equipo, la comunicaci??n asertiva, y el desarrollo del talento humano que promueve el desarrollo local, mediante la generaci??n de oportunidades laborales. </p>
						<h2>Lo que somos </h2>
						<p>En Natural Highland Park, podri??n encontrar un sitio perfecto para disfrutar con amigos y familia adqueriendo de una experiencia agradable en medio de la naturaleza, dejando a un lado la vida cotidiana y encontrando la paz de la naturaleza que nos rodea. Cuenta con una infinidad de espacios al aire libre, dise??ador para disfrutar y crear recuerdos que perduran en el tiempo.
						Podr??n realizar actividades adicionales dentro del parque y elegir entre dos restaurantes distintos dise??ados para hacer de su visita una experiencia ??nica y diferente. 
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


		

		

	
		<div id="colorlib-subscribe" style="background-image: url(hltemplate/images/pie/pie.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
						<h2>Cont??ctanos</h2>
						<p>Estamos a tus ordenes, cont??ctanos para saber de ofertas y eventos a los que te podr??a interesar asistir.</p>
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

        $( '#entrada' ).datepicker( 'setDate', today );
        $( '#salida' ).datepicker( 'setDate', tomorrow );
	</script>
@endsection
