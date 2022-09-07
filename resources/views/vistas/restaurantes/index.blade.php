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

		<div id="colorlib-dining-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span class="icon">
							<img src="{{asset('hltemplate/images/logo/logo.png')}}" alt="Facebook"  height="128">
						</span>
						<!--<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>-->
						
						<h2>Restaurantes</h2>
						<p>En Natural Highland Park, contamos con dos restaurantes; Casa Antonieta que se especializa en el sabor local de nuestro país  haciendolo parte de nuestras raices guatemaltecas. Un lugar contemporaneo, redeado de naturaleza y un paisaje sin igual.</p>
						<span class="icon">
							<img src="{{asset('hltemplate/images/atracciones/CasaAntonietaweb.png')}}" alt="Facebook"  height="200">
						</span>
						<p>Tzununah Bistro, es un resturante fusionado en comida internacional. Un restaurante con espacios al aire libre, rodeada de  una pergola, acceso a la alberca y a un paso del área de nuestras cabañas de colores. </p>
						<span class="icon">
							<img src="{{asset('hltemplate/images/atracciones/Bistroweb.png')}}" alt="Facebook"  height="200">
						</span>
						<p><strong>¡Ambos restaurantes hechos para satisfacer las necesidades de su buen gusto gastronómico! </strong></p>
						<h2>Menus</h2>
						
					</div>
				</div>
				<div class="row">
					<div class="diningbar-flex">
						<div class="half animate-box">
							<ul class="nav nav-tabs text-center" role="tablist">
								<li role="presentation" class="active"><a href="#mains" aria-controls="mains" role="tab" data-toggle="tab">Menu Tzununah Bistro </a></li>
								<!--<li role="presentation"><a href="#desserts" aria-controls="desserts" role="tab" data-toggle="tab">Postres</a></li>
								<li role="presentation"><a href="#drinks" aria-controls="drinks" role="tab" data-toggle="tab">Bebidas</a></li>-->
							</ul>
			            <!-- Tab panes -->
			            <div class="tab-content">
							<p>
								<a href="https://www.naturalhighlandpark.com/menus/Menu_Tzununah_Bistro.pdf" class="btn btn-danger" role="button" target="blank">Descargar Menu</a>
								<iframe   width="100%" height="500" src="https://www.naturalhighlandpark.com/menus/Menu_Tzununah_Bistro.pdf"></iframe>
							</p>
								<!--<div role="tabpanel" class="tab-pane active" id="mains">
									<div class="row">
										<div class="col-md-12">
										<ul class="menu-dish">
							              <li>
							                <figure class="image"><a href="{{asset('hltemplate/images/casaantonieta/Alm1.jpg')}}" class="room image-popup-link" ><img src="{{asset('hltemplate/images/casaantonieta/Alm1.jpg')}}" alt=""></a></figure>
							                <div class="text">
							                  <span class="price">Q25.99</span>
							                  <h3>Desayuno tradicional</h3>
							                  <p class="cat">Huevos revueltos naturales, revueltos tomate y cebolla o estrellados, acompañado con frijoles volteados, plátanos fritos, queso fresco, crema y salsa ranchera.</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><a href="{{asset('hltemplate/images/casaantonieta/Alm2.jpg')}}" class="room image-popup-link" ><img src="{{asset('hltemplate/images/casaantonieta/Alm2.jpg')}}" alt=""></a></figure>
							                <div class="text">
							                  <span class="price">Q30.99</span>
							                  <h3>Desayuno chapín</h3>
							                  <p class="cat">Huevos revueltos naturales, revueltos tomate y cebolla o estrellados, frijoles parados, rellenito de plátano, chorizo o longaniza, crema, queso fresco y salsa ranchera.</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><a href="{{asset('hltemplate/images/casaantonieta/Alm3.jpg')}}" class="room image-popup-link" ><img src="{{asset('hltemplate/images/casaantonieta/Alm3.jpg')}}" alt=""></a></figure>
							                <div class="text">
							                  <span class="price">Q40.00</span>
							                  <h3>Omelet mixto</h3>
							                  <p class="cat">Relleno de jamón y queso acompañado de plátanos fritos, crema  y frijoles volteados.</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><a href="{{asset('hltemplate/images/casaantonieta/Alm4.jpg')}}" class="room image-popup-link" ><img src="{{asset('hltemplate/images/casaantonieta/Alm4.jpg')}}" alt=""></a></figure>
							                <div class="text">
							                  <span class="price">Q20.50</span>
							                  <h3>Desayuno del comal</h3>
							                  <p class="cat">Tortillas rellenas con queso de la casa, acompañado de frijoles volteados, chorizo o longaniza, carne adobada, crema y chirmol de la casa.</p>
							                </div>
							              </li>
										  <li>
							                <figure class="image"><a href="{{asset('hltemplate/images/casaantonieta/Alm5.jpg')}}" class="room image-popup-link" ><img src="{{asset('hltemplate/images/casaantonieta/Alm5.jpg')}}" alt=""></a></figure>
							                <div class="text">
							                  <span class="price">Q20.50</span>
							                  <h3>Cyclist omelet</h3>
							                  <p class="cat">Tortillas rellenas con queso de la casa, acompañado de frijoles volteados, chorizo o longaniza, carne adobada, crema y chirmol de la casa.</p>
							                </div>
							              </li>
										  <li>
							                <figure class="image"><a href="{{asset('hltemplate/images/casaantonieta/Alm6.jpg')}}" class="room image-popup-link" ><img src="{{asset('hltemplate/images/casaantonieta/Alm6.jpg')}}" alt=""></a></figure>
							                <div class="text">
							                  <span class="price">Q20.50</span>
							                  <h3>Panote Highland</h3>
							                  <p class="cat">Delicioso pan de casa untado con frijol volteado lascas de jamón y huevo revuelto, acompañado con atol de plátano y perlas de fruta.</p>
							                </div>
							              </li>
										  <li>
							                <figure class="image"><a href="{{asset('hltemplate/images/casaantonieta/Alm7.jpg')}}" class="room image-popup-link" ><img src="{{asset('hltemplate/images/casaantonieta/Alm7.jpg')}}" alt=""></a></figure>
							                <div class="text">
							                  <span class="price">Q20.50</span>
							                  <h3>Pochados estilo Antonieta</h3>
							                  <p class="cat">2 huevos pochados en agua aromatizada, bañados con chirmol de la casa, acompañados de frijoles volteados y tiras de carne adobada.</p>
							                </div>
							              </li>
										  <li>
							                <figure class="image"><a href="{{asset('hltemplate/images/casaantonieta/Alm8.jpg')}}" class="room image-popup-link" ><img src="{{asset('hltemplate/images/casaantonieta/Alm8.jpg')}}" alt=""></a></figure>
							                <div class="text">
							                  <span class="price">Q20.50</span>
							                  <h3>Puyazo 8 onz</h3>
							                  <p class="cat"></p>
							                </div>
							              </li>
										  <li>
							                <figure class="image"><a href="{{asset('hltemplate/images/casaantonieta/Alm9.jpg')}}" class="room image-popup-link" ><img src="{{asset('hltemplate/images/casaantonieta/Alm9.jpg')}}" alt=""></a></figure>
							                <div class="text">
							                  <span class="price">Q20.50</span>
							                  <h3>Lomito 8 onz</h3>
							                  <p class="cat"></p>
							                </div>
							              </li>
										  <li>
							                <figure class="image"><a href="{{asset('hltemplate/images/casaantonieta/Alm10.jpg')}}" class="room image-popup-link" ><img src="{{asset('hltemplate/images/casaantonieta/Alm10.jpg')}}" alt=""></a></figure>
							                <div class="text">
							                  <span class="price">Q20.50</span>
							                  <h3>Tortilla Con Longazina</h3>
							                  <p class="cat"></p>
							                </div>
							              </li>

							            </ul>
										</div>
									</div>
								</div>-->

								<!--<div role="tabpanel" class="tab-pane" id="desserts">
									<div class="row">
										<div class="col-md-12">
											<ul class="menu-dish">
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-1.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$39.90</span>
							                  <h3>Fried Potatoes with Garlic</h3>
							                  <p class="cat">Viggies / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-3.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$20.99</span>
							                  <h3>Tuna Roast Source</h3>
							                  <p class="cat">Tuna / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-3.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$50.00</span>
							                  <h3>Roast Beef (4 sticks)</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-4.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$29.00</span>
							                  <h3>Salted Fried Chicken</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							            </ul>
										</div>
									</div>
								</div>

								<div role="tabpanel" class="tab-pane" id="drinks">
									<div class="row">
										<div class="col-md-12">
											<ul class="menu-dish">
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-8.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$25.00</span>
							                  <h3>Fried Potatoes with Garlic</h3>
							                  <p class="cat">Viggies / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-9.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$20.50</span>
							                  <h3>Tuna Roast Source</h3>
							                  <p class="cat">Tuna / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-3.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$30.00</span>
							                  <h3>Roast Beef (4 sticks)</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-4.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$29.99</span>
							                  <h3>Salted Fried Chicken</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							            </ul>
										</div>
									</div>
								</div>-->
			            </div>
			         </div><!-- end half -->
			         <div class="half diningbar-img" style="background-image: url({{asset('hltemplate/images/portada/2.jpg')}});"></div><!-- end half -->
			      </div>
			   </div>
	      </div>
		</div>

		<!--<div id="colorlib-dining-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2>Tzununah Bistro</h2>
						<p>la combinación de nuestros sabores fusionados con comida internacional.</p>
					</div>
				</div>
				<div class="row">
					<div class="diningbar-flex">
						<div class="half animate-box">
							<ul class="nav nav-tabs text-center" role="tablist">
								<li role="presentation" class="active"><a href="#mains" aria-controls="mains" role="tab" data-toggle="tab">Platillos</a></li>
								<li role="presentation"><a href="#desserts" aria-controls="desserts" role="tab" data-toggle="tab">Postres</a></li>
								<li role="presentation"><a href="#drinks" aria-controls="drinks" role="tab" data-toggle="tab">Bebidas</a></li>
							</ul>
			            <!-- Tab panes 
			            <div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="mains">
									<div class="row">
										<div class="col-md-12">
											<ul class="menu-dish">
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-1.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$25.99</span>
							                  <h3>Grilled Pork</h3>
							                  <p class="cat">Meat / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-2.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$30.99</span>
							                  <h3>Tuna Roast Source</h3>
							                  <p class="cat">Tuna / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-3.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$40.00</span>
							                  <h3>Roast Beef (4 sticks)</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-4.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$20.50</span>
							                  <h3>Salted Fried Chicken</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							            </ul>
										</div>
									</div>
								</div>

								<div role="tabpanel" class="tab-pane" id="desserts">
									<div class="row">
										<div class="col-md-12">
											<ul class="menu-dish">
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-1.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$39.90</span>
							                  <h3>Fried Potatoes with Garlic</h3>
							                  <p class="cat">Viggies / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-3.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$20.99</span>
							                  <h3>Tuna Roast Source</h3>
							                  <p class="cat">Tuna / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-3.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$50.00</span>
							                  <h3>Roast Beef (4 sticks)</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-4.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$29.00</span>
							                  <h3>Salted Fried Chicken</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							            </ul>
										</div>
									</div>
								</div>

								<div role="tabpanel" class="tab-pane" id="drinks">
									<div class="row">
										<div class="col-md-12">
											<ul class="menu-dish">
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-8.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$25.00</span>
							                  <h3>Fried Potatoes with Garlic</h3>
							                  <p class="cat">Viggies / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-9.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$20.50</span>
							                  <h3>Tuna Roast Source</h3>
							                  <p class="cat">Tuna / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-3.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$30.00</span>
							                  <h3>Roast Beef (4 sticks)</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="{{asset('hltemplate/images/menu-4.jpg')}}" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$29.99</span>
							                  <h3>Salted Fried Chicken</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							            </ul>
										</div>
									</div>
								</div>
			            </div>
			         </div><!-- end half 
			         <div class="half diningbar-img" style="background-image: url({{asset('hltemplate/images/cover_img_1.jpg')}});"></div><!-- end half 
			      </div>
			   </div>
	      </div>
		</div>-->
	
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