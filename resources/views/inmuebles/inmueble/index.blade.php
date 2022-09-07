@extends ('layouts.admin')
@section ('contenido')
<div class="card mb-4">
						<!-- Card Header -->
	<header class="card-header d-md-flex align-items-center">
		<!--Mensaje de abono correcto-->
		<div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                  @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                  @endif
                  {{session()->forget('alert-' . $msg)}}
            @endforeach
      	</div> <!-- fin .flash-message -->
		<h4><strong>Listado de Hospedaje </strong>

			<a href="inmueble/create">
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear Hospedaje ">
                    <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                        <i class="far fa-plus-square"></i> Crear Hospedaje
                    </button>
                </span>
			</a>
		</h4>
		
	</header>

	<div class="card-body">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				@include('inmuebles.inmueble.search')
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th><h5><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
							<th><h5><strong>Tipo Hospedaje</strong></h5></th>
							<th><h5><strong>Nombre</strong></h5></th>
							<th><h5><strong>Descripción</strong></h5></th>
							<th><h5><strong>Estado</strong></h5></th>
						</thead>
		               @foreach ($inmuebles as $inmueble)
						<tr>
							<td align="left">

								<a href="{{URL::action('InmuebleController@show',$inmueble->idinmueble)}}">
									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Ver Hospedaje">
										<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
											<i class="far fa-eye"></i>
										</button>
									</span>
								</a>

								<a href="{{URL::action('InmuebleController@edit',$inmueble->idinmueble)}}">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Hospedaje">
                                          <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
                                                <i class="far fa-edit"></i>
                                          </button>
                                    </span>
                              	</a>
								
								<a href="" data-target="#modal-delete-{{$inmueble->idinmueble}}" data-toggle="modal">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Hospedaje">
                                          <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
                                                <i class="far fa-minus-square"></i>
                                          </button>
                                    </span>
								</a>
								  
							</td>
							<td align="left"><h5>{{ $inmueble->Tipo}}</h5></td>
							<td align="left"><h5>{{ $inmueble->nombre}}</h5></td>
							<td align="left"><h5>{{ $inmueble->descripcion}}</h5></td>
							<td align="left"><h5>{{ $inmueble->estado_inmueble}}</h5></td>
							
						</tr>
						@include('inmuebles.inmueble.modal')
						@endforeach
					</table>
				</div>
				{{$inmuebles->render()}}
			</div>
		</div>
	</div>
</div>
@endsection