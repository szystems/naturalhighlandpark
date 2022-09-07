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
				   					<h2>¿Quieres Reservar o hacernos alguna pregunta?</h2>
									   <h1>Contactanos</h1>
									   
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3>Información de Contacto</h3>
						<div class="row contact-info-wrap">
							<div class="col-md-2">
								<p><span><i class="icon-location-2"></i></span> Aldea Miramar, Km. 232, <br> San Martín Chile Verde</p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-phone3"></i></span> <a href="tel://1234567920">+502 32056298</a></p>
							</div>
							<div class="col-md-4">
								<p><span><i class="icon-paperplane"></i></span> <a href="mailto:info@naturalhighlandpark.com">info@naturalhighlandpark.com</a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-globe"></i></span> <a href="https://www.naturalhighlandpark.com/">naturalhighlandpark.com</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3>Formulario de Contacto</h3>
						@if (count($errors)>0)
								<div class="alert alert-danger">
									<ul>
											@foreach ($errors->all() as $error)
												<li>{{$error}}</li>
											@endforeach
									</ul>
								</div>
						@endif
						<div class="flash-message">
							@foreach (['danger', 'warning', 'success', 'info'] as $msg)
							@if(Session::has('alert-' . $msg))

							<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
							@endif
							@endforeach
						</div> <!-- fin .flash-message -->
						{!!Form::open(array('url'=>'vistas/contacto','method'=>'POST','autocomplete'=>'off'))!!}
                  		{{Form::token()}}
							<div class="row form-group">
								<div class="col-md-6">
									<label for="fname">Nombre</label>
									<input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="Tu Nombre">
									@if ($errors->has('nombre'))
										<span class="help-block">
												<strong>
													{{ $errors->first('nombre') }}
												</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Tu Email">
									@if ($errors->has('email'))
										<span class="help-block">
												<strong>
													{{ $errors->first('email') }}
												</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="email">Teléfono</label>
									<input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono') }}" placeholder="Tu Teléfono">
									@if ($errors->has('telefono'))
										<span class="help-block">
												<strong>
													{{ $errors->first('telefono') }}
												</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="subject">Asunto</label>
									<input type="text" id="asunto" name="asunto" class="form-control" value="{{ old('asunto') }}" placeholder="Asunto">
									@if ($errors->has('asunto'))
										<span class="help-block">
												<strong>
													{{ $errors->first('asunto') }}
												</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="message">Mensaje</label>
									<textarea name="mensaje" id="mensaje" cols="30" rows="10" class="form-control" value="{{ old('mensaje') }}" placeholder="En que podemos ayudarte?"></textarea>
									@if ($errors->has('mensaje'))
										<span class="help-block">
												<strong>
													{{ $errors->first('mensaje') }}
												</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="form-group text-center">
								<input type="submit" value="Enviar Mensaje" class="btn btn-primary">
							</div>

						{!!Form::close()!!}	
					</div>
				</div>
			</div>
		</div>
	
		
@endsection