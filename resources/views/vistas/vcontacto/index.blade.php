@extends('layouts.app')
@section('content')
    <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bgcontacto">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="breadcrumb_iner">
                      <div class="breadcrumb_iner_item">
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section padding_top">
      <div class="container">
          <div class="row">
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
            <div class="col-12">
              <h2 class="contact-title">Contáctanos</h2>
            </div>
            <div class="col-lg-8">
                {!!Form::open(array('url'=>'vistas/vcontacto','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control" name="subject1" id="subject1" type="text" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Asunto'" placeholder='Asunto' value="{{ old('subject1') }}" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">

                      <textarea class="form-control w-100" name="mensaje1" id="mensaje1" cols="30" rows="9"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escribe un mensaje'"
                        placeholder='Escribe un mensaje' required>{{ old('mensaje1') }}</textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input class="form-control" name="name1" id="name1" type="text" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Tu Nombre'" placeholder='Tu Nombre' value="{{ old('name1') }}" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input class="form-control" name="email1" id="email1" type="email" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Tu Email'" placeholder='Tu Email' value="{{ old('email1') }}" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input class="form-control" name="phone1" id="phone1" type="text" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Tu Teléfono'" placeholder='Tu Teléfono' value="{{ old('phone1') }}" required>
                    </div>
                  </div>
                  
                </div>
                <div class="form-group mt-3">
                  <input type="submit" value="Enviar Mensaje" class="btn_3 button-contactForm">
                </div>
              {!!Form::close()!!}	
            </div>
            <div class="col-lg-4">
              <!--<div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-home"></i></span>
                <div class="media-body">
                  <h3><a href="{{ url('/vistas/vubicaciones') }}">Ubicaciones</a></h3>
                  <p></p>
                </div>
              </div>-->
              <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                <div class="media-body">
                  <h3>Reservaciones únicamente por WhatsApp:</h3>
                  <h3>
                    <a href="http://wpp-redirect.herokuapp.com/go/?p=50250559476&m=" target="_blank">
                      <img src="{{asset('hltemplate/images/logow.png')}}" alt="" style="width: 50px;">+(502) 5055 9476 
                    </a>
                  </h3>
                  <p>Lunes a Domingo 7am a 8pm</p>
                </div>
              </div>
              <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                <div class="media-body">
                  <h3>Para eventos:</h3>
                  <h3>
                    
                    <a href="http://wpp-redirect.herokuapp.com/go/?p=50250565519&m=" target="_blank">
                      <img src="{{asset('hltemplate/images/logow.png')}}" alt="" style="width: 50px;">+(502) 5056 5519
                    </a>
                  </h3>
                  <p>Lunes a Domingo 7am a 8pm</p>
                </div>
              </div>
              <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                <div class="media-body">
                  <h3>Administracion:</h3>
                  <h3>
                    <a href="http://wpp-redirect.herokuapp.com/go/?p=50256960396&m=" target="_blank">
                      <img src="{{asset('hltemplate/images/logow.png')}}" alt="" style="width: 50px;">+(502) 5696 0396 
                    </a>
                  </h3>
                  <p>Martes a Domingo 8am a 5pm</p>
                </div>
              </div>
              {{-- <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-email"></i></span>
                <div class="media-body">
                  <h3>admonhighlandpark@gmail.com</h3>
                  <p>Escribenos!</p>
                </div>
              </div> --}}
            </div>
          </div>
      </div>
  </section>
  <!-- ================ contact section end ================= -->

	
@endsection