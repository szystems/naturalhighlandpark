<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Highland Natural Park</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="HOTEL, PARK, NATURAL, NATURAL PARK, RESTAURANTE, RESTAURANT, BIKE" />
	<meta name="author" content="" />
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"   integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script  src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet"   href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.  css" integrity="sha384-  Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"   crossorigin="anonymous">
	<!--<script     src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.  min.js" integrity="sha384-   ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"        crossorigin="anonymous"></script>

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('hltemplate/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('hltemplate/css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('hltemplate/css/bootstrap.css')}}">
	
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('hltemplate/css/magnific-popup.css')}}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{asset('hltemplate/css/flexslider.css')}}">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('hltemplate/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('hltemplate/css/owl.theme.default.min.css')}}">
	<!-- iconos -->
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{asset('hltemplate/css/bootstrap-datepicker.css')}}">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{asset('hltemplate/fonts/flaticon/font/flaticon.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('hltemplate/css/style.css')}}">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

			<!-- datepicker  https://styde.net/formulario-con-datepicker-en-laravel/   https://uxsolutions.github.io/bootstrap-datepicker/?markup=range&format=&weekStart=&startDate=&endDate=&startView=0&minViewMode=0&maxViewMode=4&todayBtn=true&clearBtn=false&language=es&orientation=auto&multidate=&multidateSeparator=&autoclose=on&keyboardNavigation=on&forceParse=on#sandbox-->
				<!-- Jquery -->
				<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
				<!-- Datepicker Files -->
				<link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
				<link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-standalone.css')}}">
				<script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
				<!-- Languaje -->
				<script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
			<!-- datepicker end -->

			<!-- Web Fonts -->
			<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

			<!-- Components Vendor Styles -->
			<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/all.min.css')}}">
	</head>
	<body>
		
	<!-- telefono -->
    <style>
    .btn-telefono {
           display:block;
           width:70px;
           height:70px;
           color:#fff;
           position: fixed;
           right:150px;
           bottom:25px;
           border-radius:50%;
           line-height:80px;
           text-align:center;
           z-index:999;
    }
    </style>

    <div class="btn-telefono">
      <a  href="tel:+50232056298">
        <img src="{{asset('hltemplate/images/tel.png')}}" alt="" style="width: 90px;">
      </a>
    </div>

    <!-- Fin telefono -->

    <!-- whatsappt -->
    <style>
    .btn-whatsapp {
           display:block;
           width:70px;
           height:70px;
           color:#fff;
           position: fixed;
           right:90px;
           bottom:25px;
           border-radius:50%;
           line-height:80px;
           text-align:center;
           z-index:999;
    }
    </style>

    <div class="btn-whatsapp">
      <a href="http://wpp-redirect.herokuapp.com/go/?p=50232056298&m=" target="_blank">
        <img src="{{asset('hltemplate/images/logow.png')}}" alt="" style="width: 90px;">
      </a>
    </div>

    <!-- Fin whatsappt -->


	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<a href="{{ url('/') }}"><p class="site">www.naturalhighlandpark.com</p></a>
						</div>
						<div class="col-xs-8 text-right">
							<!--<p class="num">Telefono: <a href="tel:+50232056298">+(502) 3205-6298</a></p>-->
							<ul class="colorlib-social">
								<li><a href="https://www.facebook.com/HighlandNaturalPark"><img src="{{asset('hltemplate/images/redes/Fb.png')}}" alt="Facebook"  height="32"></a></li>
								<li><a href="https://www.instagram.com/naturalhiglandpark/"><img src="{{asset('hltemplate/images/redes/Insta.png')}}" alt="Instagram"  height="32"></a></li>
								<li><a href="#"><img src="{{asset('hltemplate/images/redes/youtube.png')}}" alt="Youtube" height="32"></a></li>
								<li><a href="#"><img src="{{asset('hltemplate/images/redes/waze.png')}}" alt="Waze" width="32" height="32"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<div id="colorlib-logo"><a href="{{ url('/') }}"><img src="{{asset('hltemplate/images/logo/logo.png')}}" alt="Highland Natural Park" height="100"></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="active"><a href="{{ url('/') }}">Inicio</a></li>
								<!--<li><a href="{{ url('/vistas/historia') }}">Historia</a></li>-->
								<li><a href="{{ url('/vistas/inmuebles') }}">Hospedaje</a></li>
								<li><a href="{{ url('/vistas/restaurantes') }}">Restaurantes</a></li>
								<li><a href="{{ url('/vistas/servicios') }}">Parque</a></li>
								<!--<li><a href="{{ url('/vistas/granjita') }}">Granjita</a></li>-->
								<li><a href="{{ url('/vistas/eventos') }}">Eventos</a></li>
								<li><a href="{{ url('/vistas/galeria') }}">Galeria</a></li>
								{{-- <li><a href="{{ url('/vistas/reservaciones') }}">Reservaciones</a></li> --}}
								<li><a href="{{ url('/vistas/contacto') }}">Contacto</a></li>
								<li class="has-dropdown">
									@if (Auth::guest())
									<a href="{{ url('/login') }}"> <i class="fa fa-user"></i><span class="caret"></span></a>
									<ul class="dropdown">
										<li><a href="{{ url('/login') }}">Login</a></li>
										<li><a href="{{url('/register')}}">Registrarse.</a></li>
									</ul>
									@elseif(Auth::user()->tipo_usuario == "Administrador")
									<?php
                                            $usuario = Auth::user()->name; $nombre = explode(' ',trim($usuario));
                                    ?>
									<a href="{{ url('/login') }}"> <i class="fa fa-user"></i><span class="caret"></span></a>
									<ul class="dropdown">
										<li>{{ ucwords($nombre[0]) }}</li>
										<li><a href="{{url('/panel/')}}"><i class="fa fa-cogs"></i> Admin.</a></li>
										<li><a href="{{url('/logout')}}"><i class="	fa fa-ban"></i> Salir</a></li>
									</ul>
									@elseif(Auth::user()->tipo_usuario == "Huesped")
									<?php
                                            $usuario = Auth::user()->name; $nombre = explode(' ',trim($usuario));
                                    ?>
									<a href=""> <i class="fa fa-user"></i><span class="caret"></span></a>
									<ul class="dropdown">
										<li><strong>Hola {{ ucwords($nombre[0]) }}!</strong></li>
										<li><a href="{{URL::action('VistaHuespedController@edit',Auth::user()->id)}}"><i class="fa fa-address-book"></i> Perfil</a></li>
										{{-- <li><a href="{{url('/vistas/reservas')}}"><i class="fa fa-book"></i> Reservas</a></li> --}}
										<li><a href="{{url('/logout')}}"><i class="	fa fa-ban"></i> Salir</a></li>
									</ul>
									@endif
								</li>
								<!-- <li>
									<?php
										$carrito = Cart::getContent();
										$numarticulos = $carrito->count();
									?>
									<a  href="{{ url('/vistas/vcarrito') }}" >
										<i class="fas fa-cart-plus content: 7"></i><span class="badge badge-pill badge-primary">{{$numarticulos}}</span>
									</a>
								</li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
        </nav>
            @yield('content')
        <footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-5 colorlib-widget">
						<a href="{{ url('/') }}"><img src="{{asset('hltemplate/images/redes/logoblanco.png')}}" alt="Highland Natural Park" height="100"></a>
						<br><br>
						<p>Redes Sociales</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="https://www.facebook.com/HighlandNaturalPark"><img src="{{asset('hltemplate/images/redes/Fbblanco.png')}}" alt="Facebook"  height="32"></a></li>
								<li><a href="https://www.instagram.com/naturalhiglandpark/"><img src="{{asset('hltemplate/images/redes/Instagramblanco.png')}}" alt="Instagram"  height="32"></i></a></li>
								<li><a href="#"><img src="{{asset('hltemplate/images/redes/youtubeblanco.png')}}" alt="Youtube"  height="32"></a></li>
								<li><a href="#"><img src="{{asset('hltemplate/images/redes/wazeblanco.png')}}" alt="Waze"  height="32"></a></li>
							</ul>
						</p>
					</div>
					
					

					<div class="col-md-4 colorlib-widget">
						<h4>Contacto</h4>
						<ul class="colorlib-footer-links">
							<li>Los esperamos en el Km 232, San Martín Chile Verde, Sacatepequez, Quetzaltenango, donde podrán encontrar nuestro Parque, Hotel, y Restaurantes rodeados de naturaleza y color!</li>
							<!--<li>Aldea Miramar, <br> Km. 232, San Martín Chile Verde</li>-->
							<li><a href="32056298">+(502) 3205-6298</a></li>
							<li><a href="{{ url('/vistas/contacto') }}">reservaciones@naturalhighlandpark.com</a></li>
							<li><a href="http://naturalhighlandpark.com">www.naturalhighlandpark.com</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-md-push-1">
						<h4>Links</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="{{ url('/') }}">Inicio</a></li>
								<!--<li><a href="{{ url('/vistas/historia') }}">Historia</a></li>-->
								<li><a href="{{ url('/vistas/inmuebles') }}">Hospedaje</a></li>
								<li><a href="{{ url('/vistas/restaurantes') }}">Restaurantes</a></li>
								<li><a href="{{ url('/vistas/servicios') }}">Parque</a></li>
								<li><a href="{{ url('/vistas/eventos') }}">Eventos</a></li>
								<!--<li><a href="{{ url('/vistas/granjita') }}">Granjita</a></li>-->
								<li><a href="{{ url('/vistas/galeria') }}">Galeria</a></li>
								{{-- <li><a href="{{ url('/vistas/reservaciones') }}">Reservaciones</a></li> --}}
								<li><a href="{{ url('/vistas/contacto') }}">contacto</a></li>

					
							</ul>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							<small class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Pagina y AppWeb creada por:  <a href="https://szystems.com" target="_blank">Szystems</a> y <a href="https://szystems.com" target="_blank">Rivera All Design</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small> 
							
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="{{asset('hltemplate/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('hltemplate/js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('hltemplate/js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('hltemplate/js/jquery.waypoints.min.js')}}"></script>
	<!-- Flexslider -->
	<script src="{{asset('hltemplate/js/jquery.flexslider-min.js')}}"></script>
	<!-- Owl carousel -->
	<script src="{{asset('hltemplate/js/owl.carousel.min.js')}}"></script>
	<!-- Magnific Popup -->
	<script src="{{asset('hltemplate/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('hltemplate/js/magnific-popup-options.js')}}"></script>
	<!-- Date Picker -->
	<script src="{{asset('hltemplate/js/bootstrap-datepicker.js')}}"></script>
	<!-- Main -->
	<script src="{{asset('hltemplate/js/main.js')}}"></script>


	<!-- Global Vendor -->
		
    	@stack('scripts')
		
        

	</body>
</html>