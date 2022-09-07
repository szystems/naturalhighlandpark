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
                      <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Asunto'" placeholder='Asunto' value="{{ old('subject') }}" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">

                      <textarea class="form-control w-100" name="mensaje" id="mensaje" cols="30" rows="9"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escribe un mensaje'"
                        placeholder='Escribe un mensaje' required>{{ old('mensaje') }}</textarea>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Tu Nombre'" placeholder='Tu Nombre' value="{{ old('name') }}" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Tu Email'" placeholder='Tu Email' value="{{ old('email') }}" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input class="form-control" name="phone" id="phone" type="text" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Tu Teléfono'" placeholder='Tu Teléfono' value="{{ old('phone') }}" required>
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
                  <h3>+(502) 7910 6868 </h3>
                  <p>Lun a Dom 9am to 6pm</p>
                </div>
              </div>
              <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                <div class="media-body">
                  <h3>+(502) 5056 5519 </h3>
                  <p>Lun a Dom 9am to 6pm</p>
                </div>
              </div>
              <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-email"></i></span>
                <div class="media-body">
                  <h3>info@naturalhighlandpark.com</h3>
                  <p>Escribenos!</p>
                </div>
              </div>
            </div>
          </div>
      </div>
  </section>
  <!-- ================ contact section end ================= -->

	
@endsection