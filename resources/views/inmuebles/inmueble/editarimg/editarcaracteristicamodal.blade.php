<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modaleditarcaracteristica{{$caracteristica->idcaracteristica}}">
		{!!Form::model($caracteristica,['method'=>'PATCH','route'=>['caracteristica.update',$caracteristica->idcaracteristica],'files'=>'true'])!!}
        {{Form::token()}}
        
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Editar Característica</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
								<div class="form-group">
									<div class="input-group">
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<label for="nombre"><strong><font color="orange">*</font>Nombre:</strong></label>
											<div class="form-group">
													<input type="text" name="nombre" class="form-control" value="{{$caracteristica->nombre}}" required>
											</div>
										</div>
										<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
											<label for="descripcion"><strong>Descripción:</strong></label>
											<div class="form-group">
													<textarea type="text" name="descripcion" class="form-control" placeholder="Descripcion...">{{$caracteristica->descripcion}}</textarea>
											</div>
										</div>
									</div>
								</div>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i> Cerrar</button>
                        <button type="submit" class="btn btn-info"><i class="far fa-save"></i> Editar</button>
                        <input type="hidden" name="idtipo_inmueble" class="form-control" id="idtipo_inmueble" value="{{$tipoInmueble->idtipo_inmueble}}">
					</div>
				</div>
			</div>
        {{Form::close()}}
            
		</div>



<!-- End Basic Modals -->