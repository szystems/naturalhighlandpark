<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal-det-{{$detalle->iddetalle_reservacion}}">
            {{Form::open(array
				(
					'action' => 'ReservacionController@detDestroy',
                    'method' => 'GET',
                    'role' => 'form',
				))
			}}
			{{Form::token()}}
        
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Eliminar Inmbueble de Reservacion {{$detalle->iddetalle_reservacion}}</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						 
						
						<h5 class="modal-title" id="exampleModalLabel"><b>{{ $detalle->nombre}}</b></h5>
						<input type="hidden" name="iddetalle_reservacion" value="{{$detalle->iddetalle_reservacion}}">
						<input type="hidden" name="idreservacion"  value="{{$detalle->idreservacion}}">
                        <input type="hidden" name="idinmueble"  value="{{$detalle->idinmueble}}">
						<input type="hidden" name="cant_mayores"  value="{{$detalle->cant_mayores}}">
                        <input type="hidden" name="cant_menores"  value="{{$detalle->cant_menores}}">
						<input type="hidden" name="cant_mascotas"  value="{{$detalle->cant_mascotas}}">
                    	<input type="hidden" name="precio_mayores"  value="{{$detalle->precio_mayores}}">
						<input type="hidden" name="precio_menores"  value="{{$detalle->precio_menores}}">
						<input type="hidden" name="precio_mascotas"  value="{{$detalle->preciomascotas}}">
                        <input type="hidden" name="entrada"  value="{{$entrada}}">
                        <input type="hidden" name="salida"  value="{{$salida}}">
						<input type="hidden" name="totalreservacion"  value="{{$reservacion->total}}">
						<input type="hidden" name="abonadoreservacion"  value="{{$reservacion->abonado}}">
							Confirme quitar este Hospedaje del detalle de reservación.
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-ban"></i> Cerrar</button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-eraser"></i> Confirmar</button>
					</div>
				</div>
			</div>
            {{Form::close()}}
            
		</div>
<!-- End Basic Modals -->