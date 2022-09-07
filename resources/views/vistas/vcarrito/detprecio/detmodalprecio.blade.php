<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal-precio-{{$detalle->id}}">
            {{Form::open(array
				(
					'action' => 'CarritoSessionController@quantity',
                    'method' => 'POST',
                    'role' => 'form',
				))
			}}
			{{Form::token()}}
        
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Editar cantidad de personas</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?php
							$inmuebleDet=DB::table('inmueble as i')
							->join('tipo_inmueble as ti','i.idtipo_inmueble','=','ti.idtipo_inmueble')
							->where('i.idinmueble','=',$detalle->idinmueble)
							->first();

							$temporadaDet=DB::table('temporada')
							->where('idtemporada','=',$detalle->idtemporada)
							->first();
						?>
						<h5 class="modal-title" id="exampleModalLabel"><b>Hospedaje: {{ $detalle->nombre}}</b></h5>
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<div class="form-group">
								<label for="cant_mayores">Cantidad Mayores a 12 años:</label>
								<select name="cant_mayores" class="form-control">
									@if(($temporadaDet->promopersonagratis == "Habilitado") && ($detalle->quantity >= 3))
										<?php
											$cantMayoresAnt = $detalle->quantity;
											$cant_mayores = $cantMayoresAnt + $temporadaDet->promonumpersonas;
										?>
										<option selected value="{{$cant_mayores}}">{{$cant_mayores}}</option>
									@else
										<option selected value="{{$detalle->quantity}}">{{$detalle->quantity}}</option>
									@endif
                                    @for ($i = $inmuebleDet->minpersonas; $i <= $inmuebleDet->maxpersonas; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
							</div>
						</div>
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<div class="form-group">
								<label for="cant_menores">Cantidad Menores a 12 años:</label>
								<select name="cant_menores" class="form-control">
									@if($detalle->quantity >= 2)
									<option selected value="{{$detalle->quantity2 + $inmuebleDet->menoresxpareja}}">{{$detalle->quantity2 + $inmuebleDet->menoresxpareja}}</option>
									@else
									<option selected value="{{$detalle->quantity2}}">{{$detalle->quantity2}}</option>
									@endif
                                    @for ($i = 0; $i <= $inmuebleDet->maxpersonas; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
							</div>
						</div>
						@if($inmuebleDet->mascotas == "SI")
							<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
								<div class="form-group">
									<label for="cant_menores">Cantidad Mascotas:</label>
									<select name="cant_mascotas" class="form-control">
										<option selected value="{{$detalle->quantity3}}">{{$detalle->quantity3}}</option>
										@for ($i = 0; $i <= $inmuebleDet->maxmascotas; $i++)
											<option value="{{$i}}">{{$i}}</option>
										@endfor
									</select>
								</div>
							</div>
						@else
							<input type="hidden" name="cant_mascotas"  value="{{$detalle->quantity3}}">
						@endif
							Seleccione las nuevas cantidades.
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i> Cerrar</button>
                        <button type="submit" class="btn btn-info"><i class="far fa-edit"></i> Confirmar</button>
                        <!--datos ocultos-->
						<input type="hidden" name="minpersonas"  value="{{$inmuebleDet->minpersonas}}">
                        <input type="hidden" name="maxpersonas"  value="{{$inmuebleDet->maxpersonas}}">
                        <input type="hidden" name="id"  value="{{$detalle->id}}">
                        <input type="hidden" name="menoresxpareja"  value="{{$inmuebleDet->menoresxpareja}}">
                        <input type="hidden" name="promopersonagratis"  value="{{$temporadaDet->promopersonagratis}}">
                        <input type="hidden" name="promonumpersonas"  value="{{$temporadaDet->promonumpersonas}}">
						
					</div>
				</div>
			</div>
            {{Form::close()}}
            
		</div>
<!-- End Basic Modals -->