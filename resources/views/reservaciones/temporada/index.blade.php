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
		<h4><strong>Listado de Temporadas </strong>

			<a href="temporada/create">
                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear Temporada ">
                    <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                        <i class="far fa-plus-square"></i> Crear Temporada
                    </button>
                </span>
			</a>
		</h4>
		
	</header>

	<div class="card-body">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				@include('reservaciones.temporada.search')
				<?php
					$tipoFiltro=DB::table('tipo_inmueble')
					->select('nombre','idtipo_inmueble')
					->where('idtipo_inmueble','=',$idtipo_inmueble)
					->first();
					$desde = date("d-m-Y", strtotime($desde));
					$hasta = date("d-m-Y", strtotime($hasta));
					if($desde == '01-01-1970' or $hasta == '01-01-1970')
					{
						$desde = null;
						$hasta = null;
					}
				?>
				<h6><strong>Filtros:</strong><font color="Blue"> <strong>Desde:</strong> '{{ $desde}}', <strong>Hasta:</strong> '{{ $hasta}}', <strong>Tipo Hospedaje:</strong> @if($idtipo_inmueble != null){{$tipoFiltro->nombre}},@endif <strong>Estado: {{$estado_temporada}}</strong> </h6>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th><h5><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
                            <th><h5><strong>Tipo Hospedaje</strong></h5></th>
							<th><h5><strong>Temporada</strong></h5></th>
							<th><h5><strong>Precios </strong></h5></th>
							<th><h5><strong>Promocion</strong></h5></th> 
							<th><h5><strong>Estado</strong></h5></th>
						</thead>
		               @foreach ($temporadas as $temporada)
						<tr>
							<td align="left">

								<a href="{{URL::action('TemporadaController@show',$temporada->idtemporada)}}">
									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Ver Temporada">
										<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
											<i class="far fa-eye"></i>
										</button>
									</span>
								</a>

								<a href="{{URL::action('TemporadaController@edit',$temporada->idtemporada)}}">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Temporada">
                                          <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
                                                <i class="far fa-edit"></i>
                                          </button>
                                    </span>
                              	</a>
								
								<a href="" data-target="#modal-delete-{{$temporada->idtemporada}}" data-toggle="modal">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Temporada">
                                          <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
                                                <i class="far fa-minus-square"></i>
                                          </button>
                                    </span>
								</a>
								  
							</td>
							<td align="left"><h5>{{ $temporada->nombre}}</h5></td>
							<?php
                                $fecha_inicial = date("d-m-Y", strtotime($temporada->fecha_inicial));
                                $fecha_final = date("d-m-Y", strtotime($temporada->fecha_final));
								$moneda = Auth::user()->moneda;
                            ?>
							<td align="left"><h5>Del: {{ $fecha_inicial}} Hasta: {{$fecha_final}}</h5></td>
							<td align="left"><h5>Adulto: {{$moneda}}{{ number_format($temporada->precio,2, '.', ',')}}<br>Menor: {{$moneda}}{{ number_format($temporada->preciomenor,2, '.', ',')}}<br>Mascota: {{$moneda}}{{ number_format($temporada->preciomascota,2, '.', ',')}}</h5></td>
							<td align="left"><h5>{{ $temporada->promopersonagratis}} ({{$temporada->promonumpersonas}})</h5></td>
							<td align="left"><h5>{{ $temporada->estado_temporada}}</h5></td>
							
						</tr>
						@include('reservaciones.temporada.modal')
						@endforeach
					</table>
				</div>
				{{$temporadas->render()}}
			</div>
		</div>
	</div>
</div>
<script>
	var date = new Date();
	var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
	var tomorrow = new Date(today);
	tomorrow.setDate(tomorrow.getDate() + 1);
	var optSimple = {
		format: "dd-mm-yyyy",
    	language: "es",
    	autoclose: true,
		todayHighlight: true,
		todayBtn: "linked",
	};
	$( '#datepickerdesde' ).datepicker( optSimple );

	$( '#datepickerhasta' ).datepicker( optSimple );

	$( '#dpentrada' ).datepicker( optSimple );

	$( '#dpsalida' ).datepicker( optSimple );

	$( '#datepickerdesde,#datepickerhasta').datepicker( 'setDate', today );
</script>
@endsection