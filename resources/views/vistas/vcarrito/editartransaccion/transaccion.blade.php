<!-- Basic Modals -->
<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modaleditartransaccion{{$reservacion->idreservacion}}">
		
		{{Form::open(array
			(
				'action' => 'CarritoSessionController@transaccion',
                'method' => 'POST',
                'role' => 'form',
				'files' => 'true',
			))
		}}
		{{Form::token()}}
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Editar Transacción</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
								<div class="form-group">
									<div class="input-group">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<label for="no_transaccion"><strong><font color="orange">*</font>No. de Transacción:</strong></label>
											<div class="form-group">
													<input type="text" name="no_transaccion" class="form-control" value="{{$reservacion->no_transaccion}}" required>
											</div>
										</div>
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<label for="imagen_transaccion"><strong>Imagen:</strong></label>
											<div class="form-group">
                                                {{ $reservacion->imagen_transaccion}}
                                                <input type="file" name="imagen_transaccion">
												@if ($reservacion->imagen_transaccion != null)
													<img src="{{asset('imagenes/transacciones/'.$reservacion->imagen_transaccion)}}" alt="" width="250px"  class="img-thumbnail">
												@else
													<br>
													"No hay imagen"
												@endif
											</div>
										</div>
									</div>
								</div>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i> Cerrar</button>
                        <button type="submit" class="btn btn-info"><i class="far fa-save"></i> Editar</button>
                        <input type="hidden" name="idreservacion" class="form-control" id="idreservacion" value="{{$reservacion->idreservacion}}">
					</div>
				</div>
			</div>
		{!!Form::close()!!}
            
</div>



<!-- End Basic Modals -->