@extends ('layouts.admin')
@section ('contenido')
<div class="card mb-4">
						<!-- Card Header -->
	<header class="card-header d-md-flex align-items-center">
		<h4>
			<strong>Bitácora</strong>
		</h4>
		
	</header>

	<div class="card-body">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				@include('reportes.bitacora.search')
				
				
				
				{{Form::open(array('action' => 'ReportesController@reportebitacora','method' => 'POST','role' => 'form', 'target' => '_blank'))}}

                {{Form::token()}}
					<input type="hidden" id="rfecha" class="form-control datepicker" name="rfecha" value="{{$fecha}}">
					<input type="hidden" id="rusuario" class="form-control datepicker" name="rusuario" value="@foreach($usufiltro as $usuf){{$usuf->id}}@endforeach">
					<input type="hidden" id="rtipo" class="form-control datepicker" name="rtipo" value="{{ $tipo}}">
					
					<div class="card mb-4">
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
							<?php
								$fecha = date("d-m-Y", strtotime($fecha));
								if($fecha == '01-01-1970' )
								{
									$fecha = null;
								}
							?>
							
							<h6><strong>Filtros:</strong><font color="Blue"> <strong>Fecha:</strong> '{{ $fecha}}', <strong>Usuario:</strong> '@foreach($usufiltro as $usuf){{$usuf->name}}@endforeach', <strong>Tipo:</strong> '{{ $tipo}}'</font></h6>
						</div>
					</div>
					
				{{Form::close()}}
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th><h5><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
							<th><h5><strong>Fecha</strong></h5></th>      
							<th><h5><strong>Usuario</strong></h5></th>   
							<th><h5><strong>Tipo</strong></h5></th>
							<th><h5><strong>Descripción</strong></h5></th>
							
							
						</thead>
		                @foreach ($bitacora as $bit)
						<tr>
							<td align="left">

								<a href="{{URL::action('BitacoraController@show',$bit->idbitacora)}}" target="_blank">
									<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Ver Bitacora">
										<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
											<i class="far fa-eye"></i>
										</button>
									</span>
								</a>
								 
							</td>
							<?php
								$fecha = date("d-m-Y", strtotime($bit->fecha));
							?>
							<td align="center"><h5>{{ $fecha}}</h5></td>
							<td align="center"><h5>{{ $bit->name}}</h5></td>
							<td align="left"><h5>{{ $bit->tipo}}</h5></td>
							<td align="left"><h5>{{ $bit->descripcion}}</h5></td>
						</tr>
						@endforeach
						<tr>
							<td ></td>
							<td ></td>
							<td ></td>
							<td ></td>
							<td ></td>
							
						</tr>
					</table>
				</div>
				
				{{$bitacora->render()}}
			</div>
		</div>
	</div>
</div>
@endsection