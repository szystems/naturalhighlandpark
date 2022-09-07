@extends ('layouts.admin')
@section ('contenido')
<div class="card mb-4">
						<!-- Card Header -->
	<header class="card-header d-md-flex align-items-center">
		<h4><strong>Listado de Tipos de Hospedaje </strong>

			<a href="tipoinmueble/create">
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear Tipo Hospedaje ">
                    <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                        <i class="far fa-plus-square"></i> Crear Tipo Hospedaje
                    </button>
                </span>
			</a>
		</h4>
		
	</header>

	<div class="card-body">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				@include('inmuebles.tipoinmueble.search')
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th><h5><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
							<th><h5><strong>Nombre</strong></h5></th>
							<th><h5><strong>Descripción</strong></h5></th>
							<th><h5><strong>Estado</strong></h5></th>
						</thead>
		               @foreach ($tiposinmueble as $ti)
						<tr>
							<td align="left">

								<a href="{{URL::action('TipoInmuebleController@show',$ti->idtipo_inmueble)}}">
									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Ver Hospedaje">
										<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
											<i class="far fa-eye"></i>
										</button>
									</span>
								</a>

								<a href="{{URL::action('TipoInmuebleController@edit',$ti->idtipo_inmueble)}}">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Hospedaje">
                                          <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
                                                <i class="far fa-edit"></i>
                                          </button>
                                    </span>
                              	</a>
								
								<a href="" data-target="#modal-delete-{{$ti->idtipo_inmueble}}" data-toggle="modal">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Hospedaje">
                                          <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
                                                <i class="far fa-minus-square"></i>
                                          </button>
                                    </span>
								</a>
								  
							</td>
							<td align="left"><h5>{{ $ti->nombre}}</h5></td>
							<td align="left"><h5>{{ $ti->descripcion}}</h5></td>
							<td align="left"><h5>{{ $ti->estado_tipoinmueble}}</h5></td>
							
						</tr>
						@include('inmuebles.tipoinmueble.modal')
						@endforeach
					</table>
				</div>
				{{$tiposinmueble->render()}}
			</div>
		</div>
	</div>
</div>
@endsection