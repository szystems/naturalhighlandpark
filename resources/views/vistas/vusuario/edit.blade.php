@extends('layouts.app')
@section('content')
    <!-- Cabecera -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" style="background-image:url({{asset('mall/images/cabecera.jpg')}})"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Cuenta de Usuario</h2>
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
                    <div class="card-body">
                        <h5 class="h4 card-title">Cambie los datos que desee editar:</h5>
                        <h6><font color="orange"> Campos Obligatorios *</font></h6>
                        @if (count($errors)>0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!!Form::model($usuario,['method'=>'PATCH','route'=>['vusuario.update',$usuario->id]])!!}
                        {{Form::token()}}
                        <h3><strong><u>Datos Generales: </u></strong></h3>
                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <label for="nombre"><font color="orange">*</font>Nombre</label>
                                <input id="nombre" type="text" class="form-control" name="name" value="{{$cliente->nombre}}" >
                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('nombre') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email <font color="orange">*Este campo no se puede editar1</font></label>
                                <input id="email" type="text" class="form-control" name="email" value="{{$cliente->email}}" readonly>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('email') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label for="telefono">Teléfono</label>
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{$cliente->telefono}}">
                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('telefono') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        <!--<div class="form-group{{ $errors->has('linkwa') ? ' has-error' : '' }}">
                                <label for="linkwa">Whatsapp</label>
                                <input id="linktw" type="text" class="form-control" name="linkwa" value="{{$usuario->linkwa}}">
                                @if ($errors->has('linkwa'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('linkwa') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>-->
                        <div class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
                                <label for="pais">País</label>
                                <select required class="custom-select" id="pais" name="pais" >
                                    <option selected value="{{$cliente->pais}}">{{$cliente->pais}}</option>
                                    <option value="Guatemala">Guatemala</option>
                                </select>
                                @if ($errors->has('pais'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('pais') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('departamento') ? ' has-error' : '' }}">
                                <label for="departamento">Departamento</label>
                                <select required class="custom-select" id="departamento" name="departamento" >
                                    <option selected value="{{$cliente->departamento}}">{{$cliente->departamento}}</option>
                                    <option  value="Alta Verapaz">Alta Verapaz</option>
                                        <option  value="Baja Verapaz">Baja Verapaz</option>
                                        <option  value="Chimaltenango">Chimaltenango</option>
                                        <option  value="Chiquimula">Chiquimula</option>
                                        <option  value="El Progreso">El Progreso</option>
                                        <option  value="Escuintla">Escuintla</option>
										<option  value="Guatemala">Guatemala</option>
                                        <option  value="Huehuetenango">Huehuetenango</option>
                                        <option  value="Izabal">Izabal</option>
                                        <option  value="Jalapa">Jalapa</option>
                                        <option  value="Jutiapa">Jutiapa</option>
                                        <option  value="Petén">Petén</option>
										<option  value="Quetzaltenango">Quetzaltenango</option>
                                        <option  value="Quiché">Quiché</option>
                                        <option  value="Retalhuleu">Retalhuleu</option>
                                        <option  value="Sacatepéquez">Sacatepéquez</option>
                                        <option  value="San Marcos">San Marcos</option>
                                        <option  value="Santa Rosa">Santa Rosa</option>
                                        <option  value="Sololá">Sololá</option>
                                        <option  value="Suchitepéquez">Suchitepéquez</option>
                                        <option  value="Totonicapán">Totonicapán</option>
                                        <option  value="Zacapa">Zacapa</option>
                                </select>
                                @if ($errors->has('departamento'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('departamento') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('municipio') ? ' has-error' : '' }}">
                                <label for="municipio">Municipio</label>
                                <input id="municipio" type="text" class="form-control" name="municipio" value="{{$cliente->municipio}}">
                                @if ($errors->has('municipio'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('municipio') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                <label for="direccion">Dirección</label>
                                <textarea id="direccion" type="text" class="form-control" name="direccion">{{$cliente->direccion}}</textarea>
                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('direccion') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        <!--<div class="form-group{{ $errors->has('tipo_documento') ? ' has-error' : '' }}">
                                <label for="tipo_documento">Tipo de Documento</label>
                                <input id="tipo_documento" type="text" class="form-control" name="tipo_documento" value="{{$usuario->tipo_documento}}">
                                @if ($errors->has('tipo_documento'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('tipo_documento') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>-->
                        <div class="form-group{{ $errors->has('num_documento') ? ' has-error' : '' }}">
                                <label for="num_documento">Nit</label>
                                <input id="num_documento" type="text" class="form-control" name="num_documento" value="{{$cliente->num_documento}}">
                                @if ($errors->has('num_documento'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('num_documento') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        <!--<div class="form-group{{ $errors->has('banco') ? ' has-error' : '' }}">
                                <label for="banco">Nombre de Banco</label>
                                <input id="banco" type="text" class="form-control" name="banco" value="{{$usuario->banco}}">
                                @if ($errors->has('banco'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('banco') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('nom_cuenta') ? ' has-error' : '' }}">
                                <label for="nom_cuenta">Nombre de Cuenta</label>
                                <input id="nom_cuenta" type="text" class="form-control" name="nom_cuenta" value="{{$usuario->nom_cuenta}}">
                                @if ($errors->has('nom_cuenta'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('nom_cuenta') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('num_cuenta') ? ' has-error' : '' }}">
                                <label for="num_cuenta">Numero de Cuenta</label>
                                <input id="num_cuenta" type="text" class="form-control" name="num_cuenta" value="{{$usuario->num_cuenta}}">
                                @if ($errors->has('num_cuenta'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('num_cuenta') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('linkfb') ? ' has-error' : '' }}">
                                <label for="linkfb">Link Facebook</label>
                                <input id="linkfb" type="text" class="form-control" name="linkfb" value="{{$usuario->linkfb}}">
                                @if ($errors->has('linkfb'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('linkfb') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('linkinst') ? ' has-error' : '' }}">
                                <label for="linkinst">Link Instagram</label>
                                <input id="linkinst" type="text" class="form-control" name="linkinst" value="{{$usuario->linkinst}}">
                                @if ($errors->has('linkinst'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('linkinst') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('linktw') ? ' has-error' : '' }}">
                                <label for="linktw">Link Twitter</label>
                                <input id="linktw" type="text" class="form-control" name="linktw" value="{{$usuario->linktw}}">
                                @if ($errors->has('linktw'))
                                    <span class="help-block">
                                            <strong>
                                                {{ $errors->first('linktw') }}
                                            </strong>
                                    </span>
                                @endif
                        </div>-->
                        
                    </div>
                    <footer class="card-footer">
                        <div class="form-group">
                                <button class="btn btn-danger" type="reset"><i class="fas fa-ban"></i> Borrar</button>
                                <button class="btn btn-info" type="submit"><i class="far fa-save"></i> Guardar</button>
                        </div>

                        {!!Form::close()!!}
                    </footer>
                </div>
			</div>
		</div>
    </div>
@endsection