<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal-det-{{$detalle->id}}">
            {{Form::open(array
				(
					'action' => 'CarritoSessionController@delete',
                    'method' => 'POST',
                    'role' => 'form',
				))
			}}
			{{Form::token()}}
        
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Eliminar Hospedaje de Carrito</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						 
						
						<h5 class="modal-title" id="exampleModalLabel"><b>{{ $detalle->nombre}}</b></h5>
                        <input type="hidden" name="id"  value="{{$detalle->id}}">
							Confirme quitar este hospedaje del carrito de reservación.
						
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