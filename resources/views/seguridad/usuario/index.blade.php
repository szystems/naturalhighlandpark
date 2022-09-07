@extends ('layouts.admin')
@section ('contenido')
<?php 
    $user = Auth::user(); 
?>
<div class="card mb-4">
						<!-- Card Header -->
	<header class="card-header d-md-flex align-items-center">
		<h4><strong>Administradores </strong>
			@if(Auth::user()->tipo_administrador == "Total")
			<a href="usuario/create">
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Nuevo Administrador ">
                    <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                        <i class="far fa-plus-square"></i> Nuevo Administrador
                    </button>
                </span>
			</a>
			@endif

		</h4>

		<!-- .flash-message -->
		<div class="flash-message">
                  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                              <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                   @endforeach
            </div> 
            <!-- fin .flash-message -->
		
	</header>

	<div class="card-body">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				{{Form::open(array('action' => 'ReportesController@reporteusuarios','method' => 'POST','role' => 'form', 'target' => '_blank'))}}

                {{Form::token()}}
					
					<div class="card mb-4">
						<header class="card-header d-md-flex align-items-center">
							<h4><strong>Imprimir Listado de Administradores </strong></h4>
							
						</header>
						<div class="card-body">
							<div class="row">
							<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
									<div class="form-group mb-2">
										<select name="pdf" class="form-control" value="">
												<option value="Descargar" selected>Descargar</option>
												<option value="Navegador">Ver en navegador</option>
											</select>
									</div>
								</div>
								<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
									<div class="form-group mb-2">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-danger">
												<i class="fa fa-file-pdf"></i> PDF
											</button>
										</span>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
				{{Form::close()}}
				@include('seguridad/usuario.search')
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th><h5><STRONG>Opciones</STRONG></th>
							<th><h5><STRONG>Nombre</STRONG></th>
							<th><h5><STRONG>Email</STRONG></th>
							<th><h5><STRONG>Tipo</STRONG></th>
							<th><h5><STRONG>Principal</STRONG></th>
							
						</thead>
		               @foreach ($usuarios as $usu)
						<tr>
							<td>

								<a href="{{URL::action('UsuarioController@show',$usu->id)}}">
									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Ver Usuario">
										<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
											<i class="far fa-eye"></i>
										</button>
									</span>
								</a>

								<a href="{{URL::action('UsuarioController@edit',$usu->id)}}">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Usuario">
                                          <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
                                                <i class="far fa-edit"></i>
                                          </button>
                                    </span>
                              	</a>
								@if ($usu->principal  == 'NO')
									<a href="" data-target="#modal-delete-{{$usu->id,$usu->principal}}" data-toggle="modal">
										<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Usuario">
											<button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
													<i class="far fa-minus-square"></i>
											</button>
										</span>
									</a>
								@endif 
							</td>
							<td align="left"><h5>{{ $usu->name}}</h5></td>
							<td align="left"><h5>{{ $usu->email}}</h5></td>
							<td align="center"><h5>{{ $usu->tipo_administrador}}</h5></td>
							<td align="center"><h5>{{ $usu->principal}}</h5></td>
							
						</tr>
						@include('seguridad.usuario.modal')
						@endforeach
					</table>
				</div>
				{{$usuarios->render()}}
			</div>
		</div>
	</div>
</div>
@endsection