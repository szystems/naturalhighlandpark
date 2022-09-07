<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal-det-{{$detalle->idorden_detalle}}">
            {{Form::open(array
				(
					'action' => 'VistaOrdenController@detallemodal',
                    'method' => 'GET',
                    'role' => 'form',
				))
			}}
			{{Form::token()}}
        
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Editar Cantidad de Articulos de Detalle</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						 
						
						<h5 class="modal-title" id="exampleModalLabel">Codigo Orden: {{ $orden->codigo}} <br> Articulo: {{ $detalle->articulo}}</br></h5>
						<br>
						<h4>Cantidad:</h4>
						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4" >
							
							<input type="number" name="cambiarcantidad" class="form-control" id="cambiarcantidad" value="{{$detalle->cantidad}}" onkeypress="return validarentero(event,this.value)">
							
						</div>
						
							Seleccione la cantidad de articulos.
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-ban"></i> Cerrar</button>
						<button type="submit" class="btn btn-danger"><i class="fas fa-eraser"></i> Confirmar</button>
						<input type="hidden" name="cambiarprecio" class="form-control" id="cambiarprecio" value="{{$detalle->precio}}">
                        <input type="hidden" name="iddetalle" class="form-control" id="iddetalle" value="{{$detalle->idorden_detalle}}">
						<input type="hidden" name="iddetalleidorden" class="form-control" id="iddetalleidorden" value="{{$detalle->idorden}}">
						<input type="hidden" name="iddetalleidarticulo" class="form-control" id="iddetalleidarticulo" value="{{$detalle->idarticulo}}">
						<input type="hidden" name="iddetallecantidad" class="form-control" id="iddetallecantidad" value="{{$detalle->cantidad}}">
						<input type="hidden" name="iddetalleprecio" class="form-control" id="iddetalleprecio" value="{{$detalle->precio}}">
						<input type="hidden" name="totalorden" class="form-control" id="totalorden" value="{{$orden->total}}">
					</div>
				</div>
			</div>
            {{Form::close()}}
            
		</div>
<!-- End Basic Modals -->