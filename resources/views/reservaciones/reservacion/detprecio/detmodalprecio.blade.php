<!-- Basic Modals -->
		<div class="modal fade" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal-precio-{{$detalle->iddetalle_reservacion}}">
            {{Form::open(array
				(
					'action' => 'ReservacionController@detprecio',
                    'method' => 'GET',
                    'role' => 'form',
				))
			}}
			{{Form::token()}}
        
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Editar precios y cantidad de personas</h5>
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
									@if(($temporadaDet->promopersonagratis == "Habilitado") && ($detalle->cant_mayores >= 3))
										<?php
											$cantMayoresAnt = $detalle->cant_mayores;
											$cant_mayores = $cantMayoresAnt + $temporadaDet->promonumpersonas;
										?>
										<option selected value="{{$cant_mayores}}">{{$cant_mayores}}</option>
									@else
										<option selected value="{{$detalle->cant_mayores}}">{{$detalle->cant_mayores}}</option>
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
									@if($detalle->cant_mayores >= 2)
									<option selected value="{{$detalle->cant_menores + $inmuebleDet->menoresxpareja}}">{{$detalle->cant_menores + $inmuebleDet->menoresxpareja}}</option>
									@else
									<option selected value="{{$detalle->cant_menores}}">{{$detalle->cant_menores}}</option>
									@endif
                                    @for ($i = 0; $i <= $inmuebleDet->maxpersonas; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
							</div>
						</div>
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<div class="form-group">
								<label for="cant_mascotas">Cantidad Mascotas</label>
								<select name="cant_mascotas" class="form-control">
									<option selected value="{{$detalle->cant_mascotas}}">{{$detalle->cant_mascotas}}</option>
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
                                </select>
							</div>
						</div>
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<div class="form-group">
								<label for="precio_mayores">Precio x Mayor a 12 Años {{ Auth::user()->moneda }}</label>
								<input type="text" name="precio_mayores" class="form-control" value="{{$detalle->precio_mayores}}" onkeypress="return validardecimal(event,this.value)">
							</div>
						</div>
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<div class="form-group">
								<label for="precio_menores">Precio x Menor a 12 Años {{ Auth::user()->moneda }}</label>
								<input type="text" name="precio_menores" class="form-control" value="{{$detalle->precio_menores}}" onkeypress="return validardecimal(event,this.value)">
							</div>
						</div>
						<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
							<div class="form-group">
								<label for="precio_mascotas">Precio x Mascota {{ Auth::user()->moneda }}</label>
								<input type="text" name="precio_mascotas" class="form-control" value="{{$detalle->preciomascotas}}" onkeypress="return validardecimal(event,this.value)">
							</div>
						</div>
						
						
							Cambie el precio y el porcentaje de descuento de la habitacion reservada.
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-ban"></i> Cerrar</button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-eraser"></i> Confirmar</button>
                        <!--datos ocultos-->
						<input type="hidden" name="iddetalle_reservacion"  value="{{$detalle->iddetalle_reservacion}}">
						<input type="hidden" name="idreservacion"  value="{{$reservacion->idreservacion}}">
						<input type="hidden" name="idtemporada"  value="{{$temporadaDet->idtemporada}}">
                        <input type="hidden" name="idinmueble"  value="{{$inmuebleDet->idinmueble}}">
                        <input type="hidden" name="menoresxpareja"  value="{{$inmuebleDet->menoresxpareja}}">
                        <input type="hidden" name="promopersonagratis"  value="{{$temporadaDet->promopersonagratis}}">
						<input type="hidden" name="fecha_entrada"  value="{{$detalle->fecha_entrada}}">
                        <input type="hidden" name="fecha_salida"  value="{{$detalle->fecha_salida}}">
                        <input type="hidden" name="promonumpersonas"  value="{{$temporadaDet->promonumpersonas}}">
                        <input type="hidden" name="total_reservacion"  value="{{$reservacion->total}}">
                        <input type="hidden" name="abonado"  value="{{$reservacion->abonado}}">
                        <input type="hidden" name="entrada"  value="{{$entrada}}">
                        <input type="hidden" name="salida"  value="{{$salida}}">
						<input type="hidden" name="minpersonas"  value="{{$inmuebleDet->minpersonas}}">
                        <input type="hidden" name="maxpersonas"  value="{{$inmuebleDet->maxpersonas}}">
					</div>
				</div>
			</div>
            {{Form::close()}}
            
		</div>
<!-- End Basic Modals -->