

<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal-delete-{{$usu->id}}">
			{{Form::Open(array('action'=>array('UsuarioController@destroy',$usu->id),'method'=>'delete'))}}
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Confirme si desea Eliminar el usuario
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-ban"></i> Cerrar</button>
						<button type="submit" class="btn btn-danger"><i class="fas fa-eraser"></i> Confirmar</button>
					</div>
				</div>
			</div>
			{{Form::Close()}}
		</div>
		<!-- End Basic Modals -->