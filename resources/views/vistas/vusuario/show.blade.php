@extends('layouts.app')
@section('content')
    <!-- Cabecera -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" style="background-image:url({{asset('mall/images/cabecera.jpg')}})"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">Cuenta de Usuario</h2>
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
		</div>
	</div>
    <!-- Cliente Menu -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-2">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Cuenta</div>
							<ul class="sidebar_categories">
								<li style="background-color: gray;"><a href="{{URL::action('VistaUsuarioController@show',Auth::user()->id)}}">Perfil</a></li>
								<li><a href="{{ url('/vistas/vcarrito') }}">Carritos de Compra</a></li>
								<li><a href="{{ url('/vistas/vorden') }}">Ordenes de Compra</a></li>
								<li><a href="{{ url('/logout') }}">Cerrar Sesion</a></li>
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-10">
					
					<!-- Contenido -->
                    <div class="card mb-4">
                        <header class="card-header">
                            <h2 class="h3 card-header-title"><strong>Usuario: {{$cliente->nombre}}</strong></h2>      
                        </header>
                        
                        <a href="{{URL::action('VistaUsuarioController@edit',$usuario->id)}}">
                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Usuario">
                                <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button"><i class="far fa-edit"></i> Editar</button>
                            </span>
                        </a>
                                        
                        <div class="card-body">
                            
                            <div class="row">
                                <br>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="name"><strong>Nombre</strong></label>
                                        <p>{{$cliente->nombre}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="email"><strong>Email</strong></label>
                                        <p>{{$cliente->email}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="telefono"><strong>Teléfono</strong></label>
                                        <p>{{$cliente->telefono}}</p>
                                    </div>
                                </div>
                                <!--<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="linkwa"><strong>Whatsapp</strong></label>
                                        <p>{{$usuario->linkwa}}</p>
                                    </div>
                                </div>-->
                                <!--<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="pais"><strong>País</strong></label>
                                        <p>{{$usuario->pais}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="departamento"><strong>Departamento</strong></label>
                                        <p>{{$usuario->departamento}}</p>
                                    </div>
                                </div>-->
                                <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                                    <div class="form-group">
                                        <label for="pais"><strong>Dirección </strong></label>
                                        <p>{{$cliente->direccion}}, {{$cliente->municipio}}, {{$cliente->departamento}}, {{$cliente->pais}}</p>
                                    </div>
                                </div>
                                <!--<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="departamento"><strong>Departamento</strong></label>
                                        <p>{{$usuario->departamento}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="municipio"><strong>Municipio</strong></label>
                                        <p>{{$usuario->municipio}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="direccion"><strong>Dirección</strong></label>
                                        <p>{{$usuario->direccion}}</p>
                                    </div>
                                </div>-->
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="documento"><strong>Nit</strong></label>
                                        <p>{{$cliente->num_documento}}</p>
                                    </div>
                                </div>
                                <!--<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="banco"><strong>Banco</strong></label>
                                        <p>{{$usuario->banco}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="nombre_cuenta"><strong>Nombre Cuenta</strong></label>
                                        <p>{{$usuario->nom_cuenta}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="numero_cuenta"><strong>Numero Cuenta</strong></label>
                                        <p>{{$usuario->num_cuenta}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="linkfb"><strong>Facebook</strong></label>
                                        <p><a href="{{$usuario->linkfb}}" target="_blank">{{$usuario->linkfb}}</a></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="linkinst"><strong>Instagram</strong></label>
                                        <p><a href="{{$usuario->linkinst}}" target="_blank">{{$usuario->linkinst}}</a></p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="linktw"><strong>Twitter</strong></label>
                                        <p><a href="{{$usuario->linktw}}" target="_blank">{{$usuario->linktw}}</a></p>
                                    </div>
                                </div>-->
                                
                                        
                            </div>
                        </div>                         
                        <footer class="card-footer">
                            
                        </footer>
                    </div>
				</div>
			</div>
		</div>
    </div>
@endsection