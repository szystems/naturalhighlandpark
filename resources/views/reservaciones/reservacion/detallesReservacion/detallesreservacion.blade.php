	<div>
    	<div class="card mb-4">
            <header class="card-header">
				  <h5 class="h3 card-header-title"><strong>Detalles de Reservacion: </strong></h5>
            </header>
            <div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th><h5><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
							<th><h5><strong>Hospedaje</strong></h5></th>
							<th><h5><strong>Entrada/Salida</strong></h5></th>
							<th><h5><strong>Promocion</strong></h5></th>
							<th><h5><strong>Mayores</strong></h5></th>
							<th><h5><strong>Menores</strong></h5></th>
							<th><h5><strong>Mascotas</strong></h5></th>
							<th><h5><strong>Sub-Total</strong></h5></th>
							
						</thead>
						<?php
							$total=0;
						?>
		               @foreach ($detalles as $detalle)
						<tr>
							<?php
								$total=$total + (($detalle->cant_mayores * $detalle->precio_mayores)+($detalle->cant_menores * $detalle->precio_menores)+($detalle->cant_mascotas * $detalle->preciomascotas));
								$detalleFEntrada = date("d-m-Y", strtotime($detalle->fecha_entrada));
                                $detalleFSalida = date("d-m-Y", strtotime ($detalle->fecha_salida."+ 1 days"));
							?>
							<td align="left">
								<a href="" data-target="" data-toggle="modal">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Hospedaje">
										<a href="" data-target="#modal-det-{{$detalle->iddetalle_reservacion}}" data-toggle="modal">
											<button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
												<i class="far fa-minus-square"></i>
											</button>
										</a>
                                	</span>
                            	</a>
								<a href="" data-target="" data-toggle="modal">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Hospedaje">
										<a href="" data-target="#modal-precio-{{$detalle->iddetalle_reservacion}}" data-toggle="modal">
											<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
												<i class="far fa-edit"></i>
											</button>
										</a>
                                    </span>
                                </a>
							</td>
							<td align="left"><h5><strong>{{$detalle->nombre}}</strong></h5></td>
							<td align="center"><h5><font color="limegreen">{{$detalleFEntrada}}</font> / <font color="red">{{$detalleFSalida}}</font></h5></td>
							<td align="left"><h5>{{$detalle->comentarios}}</h5></td>
							<td align="left"><h5><font color="orange"> {{$detalle->cant_mayores}} * {{ Auth::user()->moneda }}{{number_format($detalle->precio_mayores,2, '.', ',')}} = {{ Auth::user()->moneda }}{{number_format($detalle->cant_mayores * $detalle->precio_mayores,2, '.', ',')}}</font></h5></td>
							<td align="center"><h5><font color="orange">{{$detalle->cant_menores}} * {{ Auth::user()->moneda }}{{number_format($detalle->precio_menores,2, '.', ',')}} = {{ Auth::user()->moneda }}{{number_format($detalle->cant_menores * $detalle->precio_menores,2, '.', ',')}}</font></h5></td>
							<td align="center"><h5><font color="orange">{{$detalle->cant_mascotas}} * {{ Auth::user()->moneda }}{{number_format($detalle->preciomascotas,2, '.', ',')}} = {{ Auth::user()->moneda }}{{number_format($detalle->cant_mascotas * $detalle->preciomascotas,2, '.', ',')}}</font></h5></td>
							<td align="left"><h5><font color="Blue">{{ Auth::user()->moneda }}{{number_format(($detalle->cant_mayores * $detalle->precio_mayores) + ($detalle->cant_menores * $detalle->precio_menores) + ($detalle->cant_mascotas * $detalle->preciomascotas),2, '.', ',')}}</font></h5></td>
							
						</tr>
						@include('reservaciones.reservacion.detalle.detmodal')
						@include('reservaciones.reservacion.detprecio.detmodalprecio')
					   @endforeach
					   <tr>
							
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td align="right"><h5><font color="Black"><strong>Total:<s/trong></font></h5></td>
							<td><h5><strong><font color="limegreen">{{ Auth::user()->moneda }}{{number_format($total,2, '.', ',')}}</font></strong></h5></td>
							
						</tr>
					</table>
				</div>
				
            </div>
            <footer class="card-footer">
                
            </footer>
    	</div>
	</div>