@extends ('layouts.admin')
@section ('contenido')


<div>
      <div class="card mb-4">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Nueva Reservacion </strong></h2>
            </header>

            <div class="card-body">
                  <h5 class="h4 card-title">Ingrese los datos que se le piden:</h5>
                  @if (count($errors)>0)
                        <div class="alert alert-danger">
                              <ul>
                                    @foreach ($errors->all() as $error)
                                          <li>{{$error}}</li>
                                    @endforeach
                              </ul>
                        </div>
                  @endif

                 {!!Form::open(array('url'=>'reservaciones/reservacion','method'=>'POST','autocomplete'=>'off'))!!}
                 {{Form::token()}}
                  <div class="row">
                  
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                      <div class="form-group">
                            <label for="huesped">Huesped</label>
                              <a href="{{url('seguridad\huesped\create')}}">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear nuevo Huesped">
                                          <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                                                <i class="far fa-plus-square"></i>
                                          </button>
                                    </span>
                              </a>
                            <select name="idhuesped" id="idhuesped" class="form-control selectpicker"  data-live-search="true">
                                  <option value="">Buscar Huesped Nombre/Telefono/Email</option>
                                  @foreach($huespedes as $huesped)
                                  <option value="{{$huesped->id}}">{{$huesped->name}} - {{$huesped->telefono}} - {{$huesped->email}}</option>
                                  @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-3 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Fecha</label>
                        <span class="form-icon-wrapper">
							<span class="form-icon form-icon--right">
								<i class="fas fa-calendar-alt form-icon__item"></i>
							</span>
							<input type="hidden" id="dpfecha" class="form-control datepicker" name="fecha" value="{{$hoy}}">{{$hoy}}
						</span>
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-3 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Estado Reservacion:</label>
                        <select name="estado_reservacion" class="form-control">
                          <option value="Confirmada" selected>Confirmada</option>
                          <option value="Check In">Check In</option>
                          <option value="Check Out">Check Out</option>

                        </select>
                        
                        <input type="hidden" name="moneda" class="form-control" id="moneda" value="{{ Auth::user()->moneda }}">
                      </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <div class="form-group">
                        <label><h6><font color="orange">Estado Reservacion:<br> *Confirmada1 = Cliente confirma reserva. <br>*Check In = Entrega de habitacion al cliente. <br>*Finalizada = Cliente entrega habitacion y finaliza su estadia.</font></h6></label>
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-3 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Fecha Entrada</label>
                        <span class="form-icon-wrapper">
							<span class="form-icon form-icon--right">
								<i class="fas fa-calendar-alt form-icon__item"></i>
							</span>
							<input  type="hidden" id="dpentrada" class="form-control datepicker" name="fecha_entrada" value="{{$entrada}}">{{$entrada}}
						</span>
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-3 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Fecha Salida</label>
                        <span class="form-icon-wrapper">
							<span class="form-icon form-icon--right">
								<i class="fas fa-calendar-alt form-icon__item"></i>
							</span>
							<input  type="hidden" id="dpsalida" class="form-control datepicker" name="fecha_salida" value="{{$salida}}">{{$salida}}
						</span>
                      </div>
                    </div>
                    
                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                        <div class="form-group">
                            <label for="dias">Dias</label>
                            <input disabled type="number" name="pdias" class="form-control" id="pdias" value="0" onkeypress="return validarentero(event,this.value)">
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                        <div class="form-group">
                            <label for="abonado">Abonar {{ Auth::user()->moneda }}</label>
                            <input type="" name="abonado" class="form-control" id="abonado" value="0" onkeypress="return validardecimal(event,this.value)">
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-3 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Tipo Pago:</label>
                        <select name="tipo_pago" class="form-control">
                          <option selected value="Link de Pago">Link de Pago</option>
                          <option value="Credito">Credito</option>
                          <option value="Debito">Debito</option>
                          <option value="Deposito">Deposito</option>
                          <option value="Transferencia">Transferencia</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <div class="form-group">
                        <label>Comentarios y solicitudes</label>
                        <span class="form-icon-wrapper">
                            <textarea id="comentarios" type="text" class="form-control" name="comentarios" value="{{ old('comentarios') }}" rows="4" cols="50"></textarea>
						</span>
                      </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        
                        <div class="form-group">

                            <label>Hospedaje disponibles {{$temporadas->count()}} / {{$compEntrada}} / {{$compSalida}}/{{$entrada}} / {{$salida}}</label>
                              <a href="{{url('inmuebles\inmueble\create')}}">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear Hospedaje nuevo">
                                          <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                                                <i class="far fa-plus-square"></i>
                                          </button>
                                    </span>
                              </a>
                            
                        </div>
                    </div>
                    @foreach($temporadas as $temporada)
                        <?php
                            $fi = date("d-m-Y", strtotime($compEntrada));
                            $ff = date("d-m-Y", strtotime($compSalida));
                        ?>
                        @if((($compEntrada >= $temporada->fecha_inicial) && ($compEntrada <= $temporada->fecha_final)) || (($compSalida >= $temporada->fecha_inicial) && ($compSalida <= $temporada->fecha_final)) || (($compEntrada <= $temporada->fecha_inicial) && ($compSalida >= $temporada->fecha_final)))
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <hr>
                                <div class="form-group">
                                <?php
                                    $fechaInicial = date("d-m-Y", strtotime($temporada->fecha_inicial));
                                    $fechaFinal = date("d-m-Y", strtotime($temporada->fecha_final));
                                ?>
                                    
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="heading{{$temporada->idtemporada}}">
                                                <h2 class="mb-0">
                                                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$temporada->idtemporada}}">
                                                    <span class="badge badge-secondary">Abrir:</span>
                                                        <font color="orange"><strong>Temporada:</strong></font> <font color="blue">{{$fechaInicial}} / {{$fechaFinal}}</font>, <font color="orange"><strong>Hospedaje:</strong></font> <font color="blue">{{$temporada->nombre}}</font>
                                                    </button>									
                                                </h2>
                                            </div>
                                            <div id="collapse{{$temporada->idtemporada}}" class="collapse" aria-labelledby="heading{{$temporada->idtemporada}}" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <p>HTML stands for HyperText Markup Language. HTML is the standard markup language for describing the structure of web pages. <a href="https://www.tutorialrepublic.com/html-tutorial/" target="_blank">Learn more.</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                        <hr>
                        <div class="form-group">
                             <button class="btn btn-info" type="button" id="bt_add"><i class="far fa-plus-square"></i> Agregar</button>
                        </div>
                    </div>
                  </div>


            </div>

                
                        
              

            <footer class="card-footer">
                  <div class="form-group" id="guardar">
                        <input name="_token" value="{{ csrf_token() }}" type="hidden" >
                        <button class="btn btn-danger" type="reset"><i class="fas fa-ban"></i> Borrar</button>
                        <button class="btn btn-info" type="submit"><i class="far fa-save"></i> Guardar</button>
                  </div>

        
            </footer>
      </div>
</div>
    {!!Form::close()!!}
    <script>
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        var tomorrow = new Date(today);
        tomorrow.setDate(tomorrow.getDate() + 1);
        var optSimple = {
            format: "dd-mm-yyyy",
            language: "es",
            autoclose: true,
            todayHighlight: true,
            todayBtn: "linked",
        };
        $( '#datepickerdesde' ).datepicker( optSimple );

        $( '#datepickerhasta' ).datepicker( optSimple );

        $( '#dpentrada' ).datepicker( optSimple );

        $( '#dpsalida' ).datepicker( optSimple );

        $( '#datepickerdesde,#datepickerhasta,#dpentrada').datepicker( 'setDate', today );
        $( '#dpsalida').datepicker( 'setDate', tomorrow );
    </script>

@endsection