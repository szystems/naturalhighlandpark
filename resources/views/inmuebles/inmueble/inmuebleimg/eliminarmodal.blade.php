

<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModaLabel" aria-hidden="true" id="modal-delete-{{$imagen->idinmueble_img}}">
			
		{{Form::Open(array('action'=>array('InmuebleImgController@destroy',$imagen->idinmueble_img),'method'=>'delete'))}}

			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Eliminar Imagen</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Confirme si desea Eliminar la Imagen 
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