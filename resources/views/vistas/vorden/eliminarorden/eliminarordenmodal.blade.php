<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal-eliminar-orden-{{$orden->idorden}}">
            {{Form::open(array
				(
					'action' => 'VistaOrdenController@eliminarordenmodal',
                    'method' => 'GET',
                    'role' => 'form',
				))
			}}
			{{Form::token()}}
        
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Eliminar Orden de Compra</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						 
						
						<h5 class="modal-title" id="exampleModalLabel">Orden: {{ $nombreEmp->empresa}} <br> Total: {{ Auth::user()->moneda }}{{ number_format($orden->total,2, '.', ',')}}</br></h5>
						<br>
						
							Confirme si desea eliminar la orden de compra.<br><br>
							<u>Nota:</u> Si elimina la Orden de Compra, tambien eliminara los articulos que contiene la misma.
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-ban"></i> Cerrar</button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-eraser"></i> Confirmar</button>
						<input type="hidden" name="idordeneliminar" class="form-control" id="idordeneliminar" value="{{$orden->idorden}}">
					</div>
				</div>
			</div>
            {{Form::close()}}
            
		</div>
<!-- End Basic Modals -->