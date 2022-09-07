    {{Form::open(array
        (
            'action' => 'ReservacionController@buscarReservacion',
            'method' => 'POST',
            'role' => 'form',
        ))
    }}
    {{Form::token()}}

	<div>
    	<div class="card mb-4">
            <header class="card-header">
				  <h5 class="h3 card-header-title"><strong>Buscar Hospedajes Disponibles: </strong></h5>
            </header>
            <div class="card-body">
                <div class="row">
					<?php
					
					?>
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="desde"></label><font color="orange">*</font>Entrada:</label>
							<span class="form-icon-wrapper">
								<span class="form-icon form-icon--right">
									<i class="fas fa-calendar-alt form-icon__item"></i>
								</span>
								<input type="text" id="dpentrada" class="form-control datepicker" name="entrada" value="{{$entrada}}">
							</span>
						</div>
					</div>

					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group mb-2">
							<label for="hasta"></label><font color="orange">*</font>Salida:</label>
							<span class="form-icon-wrapper">
								<span class="form-icon form-icon--right">
									<i class="fas fa-calendar-alt form-icon__item"></i>
								</span>
								<input type="text" id="dpsalida" class="form-control datepicker" name="salida" value="{{$salida}}">
							</span>
						</div>
					</div>

					<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                      <div class="form-group">
                        <label for="idtipo_inmueble"></label>
                          Tipo Hospedaje
                          <a href="{{url('inmuebles\tipoinmueble\create')}}">
                              <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear Nuevo Tipo Hospedaje">
                                <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                                    <i class="far fa-plus-square"></i>
                                </button>
                              </span>
                          </a>
                        
                        <select id="idtipo_inmueble" type="text" class="form-control selectpicker" name="idtipo_inmueble" data-live-search="true">
                          <option selected="selected" value="">Todos</option>
                          @foreach ($tiposInmueble as $tipo)
                            <?php
                              if (isset($idtipo_inmueble)) 
                              {
                            ?>
                              @if($idtipo_inmueble == $tipo->idtipo_inmueble)
                                <option selected value="{{$tipo->idtipo_inmueble}}">{{$tipo->nombre}}</option>
                              @endif
                            <?php
                              }
                              else
                              {
                            ?>
                              
                            <?php
                              }
                            ?>
                            <option value="{{$tipo->idtipo_inmueble}}">{{$tipo->nombre}}</option>
                          @endforeach
                              
                        </select>
                      </div>
                    </div>
					<input type="hidden" name="idreservacion" value="{{$reservacion->idreservacion}}">
				</div>
            </div>
            <footer class="card-footer">
                <div class="form-group">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-info">
							<i class="fas fa-search"></i> Buscar
						</button>
					</span>
				</div>
            </footer>
    	</div>
	</div>

    

{{Form::close()}}