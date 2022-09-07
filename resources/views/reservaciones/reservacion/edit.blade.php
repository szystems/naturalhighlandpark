@extends ('layouts.admin')
@section ('contenido')


<div>
      <div class="card mb-4">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Editar Reservacion </strong></h2>
            </header>

            <div class="card-body">
                  <h5 class="h4 card-title">Cambie los datos que desee:</h5>
                  @if (count($errors)>0)
                        <div class="alert alert-danger">
                              <ul>
                                    @foreach ($errors->all() as $error)
                                          <li>{{$error}}</li>
                                    @endforeach
                              </ul>
                        </div>
                  @endif

                  <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                      @endif
                      {{session()->forget('alert-' . $msg)}}
                    @endforeach
                  </div> <!-- fin .flash-message -->

                  {!!Form::model($reservacion,['method'=>'PATCH','route'=>['reservacion.update',$reservacion->idreservacion],'files'=>'true'])!!}
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
                                  @foreach($huespedes as $huesped)
                                    @if($huesped->id == $reservacion->idhuesped)
                                        <option selected value="{{$huesped->id}}">{{$huesped->name}} - {{$huesped->telefono}} - {{$huesped->email}}</option>
                                    @else
                                    <option value="{{$huesped->id}}">{{$huesped->name}} - {{$huesped->telefono}} - {{$huesped->email}}</option>
                                    @endif
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
                          <?php
                            $hoy = date("d-m-Y", strtotime($hoy));
                            $entrada = date("d-m-Y", strtotime($entrada));
                            $salida = date("d-m-Y", strtotime($salida));
                          ?>
                          <input type="hidden" id="dpfecha" class="form-control datepicker" name="fecha" value="{{$hoy}}">{{$hoy}}
                        </span>
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-3 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Estado Reservacion:</label>
                        <select name="estado_reservacion" class="form-control">
                            <option selected value="{{$reservacion->estado_reservacion}}" selected>{{$reservacion->estado_reservacion}}</option>
                            <option value="Confirmada">Confirmada</option>
                            <option value="Check In">Check In</option>
                            <option value="Check Out">Check Out</option>

                        </select>
                        
                        <input type="hidden" name="moneda" class="form-control" id="moneda" value="{{ Auth::user()->moneda }}">
                      </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <div class="form-group">
                        <label><h6><font color="orange">Estado Reservacion:<br> *Confirmada = Cliente confirma reserva. <br>*Check In = Entrega de habitacion al cliente. <br>*Finalizada = Cliente entrega habitacion y finaliza su estadia.</font></h6></label>
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                      <label for="total">Total </label>
                        <div class="form-group">
                            <input type="hidden" name="total" class="form-control" id="total" value="{{$reservacion->total}}"><font color="Blue"><strong>{{ Auth::user()->moneda }}{{number_format($reservacion->total,2, '.', ',')}}</strong></font>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                      <label for="abonado">Abonado </label>
                        <div class="form-group">
                            <input type="hidden" name="abonado" class="form-control" id="abonado" value="{{$reservacion->abonado}}"><font color="limegreen"><strong>{{ Auth::user()->moneda }}{{number_format($reservacion->abonado,2, '.', ',')}}</strong></font>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                      <label for="saldo">Saldo </label>
                        <div class="form-group">
                            <input type="hidden" name="saldo" class="form-control" id="saldo" value="{{$reservacion->total-$reservacion->abonado}}"><font color="Red"><strong>{{ Auth::user()->moneda }}{{number_format($reservacion->total-$reservacion->abonado,2, '.', ',')}}</strong></font>
                        </div>
                    </div>
                    @if(($reservacion->total-$reservacion->abonado) == "0")
                    <input type="hidden" name="abonar" class="form-control" id="abonar" value="0" onkeypress="return validardecimal(event,this.value)">
                    @else
                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                        <div class="form-group">
                          <label for="abonar">Abonar {{ Auth::user()->moneda }}</label>
                          <input type="" name="abonar" class="form-control" id="abonar" value="0" onkeypress="return validardecimal(event,this.value)">
                        </div>
                    </div>
                    @endif       
                    <div class="col-lg-2 col-sm-3 col-md-4 col-xs-12">
                      <div class="form-group">
                        <label>Tipo Pago:</label>
                        <select name="tipo_pago" class="form-control">
                            <option selected value="{{$reservacion->tipo_pago}}">{{$reservacion->tipo_pago}}</option>
                            <option value="Link de Pago">Link de Pago</option>
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
                            <textarea id="comentarios" type="text" class="form-control" name="comentarios"  rows="4" cols="50">{{$reservacion->comentario}}</textarea>
						            </span>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>No. de Transacción</label>
                        <span class="form-icon-wrapper">
                            <input id="no_transaccion" type="text" class="form-control" name="no_transaccion"  value="{{$reservacion->no_transaccion}}">
						            </span>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                      <div class="form-group">
                        <label>Imagen de Transacción</label>
                        <span class="form-icon-wrapper">
                          <input type="file" name="imagen_transaccion">
                          @if ($reservacion->imagen_transaccion != null)
                            <a target="_blank" href="{{url('imagenes/transacciones/'.$reservacion->imagen_transaccion)}}" class="room image-popup-link" >
                              <img src="{{asset('imagenes/transacciones/'.$reservacion->imagen_transaccion)}}" alt="" width="250px"  class="img-thumbnail">
                            </a>
                          @else
                            <br>
                            "No hay imagen"
                          @endif
						            </span>
                      </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                      <div class="form-group" id="guardar">
                        <input name="_token" value="{{ csrf_token() }}" type="hidden" >
                        <button class="btn btn-danger" type="reset"><i class="fas fa-ban"></i> Borrar</button>
                        <button class="btn btn-info" type="submit"><i class="far fa-save"></i> Guardar</button>
                      </div>
                    </div>


                    
                    {!!Form::close()!!}
                    @include('reservaciones.reservacion.detallesReservacion.detallesreservacion')
                    @include('reservaciones.reservacion.buscarReservacion.buscarreservacion')
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <div class="form-group">
                            <?php
                              $fentrada = date("d-m-Y", strtotime($entrada));
                              $fsalida = date("d-m-Y", strtotime($salida));
                            ?>
                            <label><strong><u>Hospedajes disponibles</u></strong> Entrada: {{$entrada}} / Salida: {{$salida}}</label>
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

                                    
                                    //definir fecha de entrada y salida que se requiere dentro de la temporada
                                    //fecha inicial de la reservacion dentro de la temporada
                                    if(($compEntrada >= $temporada->fecha_inicial) && ($compEntrada <= $temporada->fecha_final))
                                    {
                                      $ResFechaInicial = $compEntrada;
                                    }
                                    else
                                    {
                                      $ResFechaInicial = $temporada->fecha_inicial;
                                    }
                                    //fecha Final de la reservacion dentro de la temporada
                                    if(($compSalida >= $temporada->fecha_inicial) && ($compSalida <= $temporada->fecha_final))
                                    {
                                      $ResFechaFinal = $compSalida;
                                    }
                                      else
                                    {
                                      $ResFechaFinal = $temporada->fecha_final;
                                    }

                                    $RFI = date("d-m-Y", strtotime($ResFechaInicial));
                                    $RFF = date("d-m-Y", strtotime($ResFechaFinal));
                                    $RFF = date("d-m-Y", strtotime ($ResFechaFinal."+ 1 days"));
                                ?>
                                    
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="heading{{$temporada->idtemporada}}">
                                                <h2 class="mb-0">
                                                    <?php
                                                        $tipo_inmueble=DB::table('tipo_inmueble')
                                                        ->where('idtipo_inmueble','=',$temporada->idtipo_inmueble)
                                                        ->first();
                                                    ?>
                                                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$temporada->idtemporada}}">
                                                    <span class="badge badge-secondary"><u>Abrir: </u><font color="blue"><strong>Temporada:</strong></font><font color="white">{{$fechaInicial}} / {{$fechaFinal}}</font>, <font color="Blue"><strong>Hospedaje:</strong></font><font color="white">{{$temporada->nombre}}</font></span>  
                                                        <br>
                                                        <font color="Blue"><strong><u>Reservacion</u></strong></font><br> 
                                                        <font color="orange"><strong>Entrada:</strong></font> <font color="limegreen">{{$RFI}}</font>, <font color="orange"><strong>Salida:</strong></font> <font color="Red">{{$RFF}}</font><br>
                                                        @if($tipo_inmueble->menoresxpareja != 0)
                                                          <font color="orange"><strong>Menores Gratis x 1ra. Pareja:</font> <font color="blue">{{$tipo_inmueble->menoresxpareja}}</strong></font>
                                                        @endif<br>
                                                        @if($temporada->promopersonagratis = "Habilitado")
                                                          <font color="orange"><strong>Adultos Gratis:</font> <font color="blue">{{$temporada->promonumpersonas}}</strong></font>
                                                        @endif<br>
                                                        <font color="orange"><strong>Personas:</font> <font color="blue">{{$tipo_inmueble->minpersonas}} / {{$tipo_inmueble->maxpersonas}}</strong></font><br>
                                                        <font color="orange"><strong>Mascotas:</font> <font color="blue">{{$tipo_inmueble->mascotas}}</strong></font><br>
                                                        @if($tipo_inmueble->mascotas == "SI")
                                                          <font color="orange"><strong>Maximo Mascotas:</font> <font color="blue">{{$tipo_inmueble->maxmascotas}}</strong></font>
                                                        @endif
                                                    </button>									
                                                </h2>
                                            </div>
                                            <div id="collapse{{$temporada->idtemporada}}" class="collapse" aria-labelledby="heading{{$temporada->idtemporada}}" data-parent="#accordionExample">
                                                <div class="card-body">
                                                  <div class="row">
                                                    <?php
                                                        $inmuebles=DB::table('inmueble as i')
                                                        ->join('tipo_inmueble as ti','i.idtipo_inmueble','=','ti.idtipo_inmueble')
                                                        ->select('i.idinmueble','i.idtipo_inmueble','i.nombre','i.descripcion','i.estado_inmueble','i.estado','ti.nombre as Tipo','ti.minpersonas','ti.maxpersonas')
                                                        ->where('i.idtipo_inmueble','=',$temporada->idtipo_inmueble)
                                                        ->where ('i.estado','=','Habilitado')
                                                        ->orderBy('ti.nombre','nombre','asc')
                                                        ->get();
                                                    ?>
                                                    @foreach($inmuebles as $inmueble)
                                                      <?php
                                                        $DetRes=DB::table('detalle_reservacion')
                                                        ->whereBetween('fecha_entrada', [$ResFechaInicial, $ResFechaFinal])
                                                        ->where('idinmueble','=',$inmueble->idinmueble)
                                                        ->orwhereBetween('fecha_salida', [$ResFechaInicial, $ResFechaFinal])
                                                        ->where('idinmueble','=',$inmueble->idinmueble)
                                                        ->get();
                                                      ?>
                                                      
                                                        @if($DetRes->count() < 1)
                                                          <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                            <div class="form-group">
                                                              {{Form::open(array
                                                              (
                                                                'action' => 'ReservacionController@agregarDetalle',
                                                                          'method' => 'POST',
                                                                          'role' => 'form',
                                                              ))
                                                              }}
                                                              {{Form::token()}}
                                                                  <label for="huesped"><strong><u>{{$inmueble->nombre}}</u></strong></label>
                                                                  <?php  
                                                                    $imginmueble = DB::table('inmueble_img')
                                                                    ->where('idinmueble', '=', $inmueble->idinmueble)
                                                                    ->first();
                                                                  ?>
                                                                  @if(isset($imginmueble))
                                                                    <a href="{{url('imagenes/inmuebles/', $imginmueble->imagen)}}" class="room image-popup-link" ><img src="{{url('imagenes/inmuebles/', $imginmueble->imagen)}}" style="max-width:100%;width:auto;height:auto;"></a>
                                                                  @endif
                                                                  <font color="limegreen"><strong><u>Disponible</u></strong></font>
                                                                  <br>
                                                                  <label>Mayores a 12 años:</label>
                                                                  <select name="cant_mayores" class="form-control">
                                                                    <option selected value="{{$tipo_inmueble->minpersonas}}">{{$tipo_inmueble->minpersonas}}</option>
                                                                    @for ($i = $tipo_inmueble->minpersonas; $i <= $tipo_inmueble->maxpersonas; $i++)
                                                                      <option value="{{$i}}">{{$i}}</option>
                                                                    @endfor
                                                                  </select>
                                                                  <label>Menores a 12 años:</label>
                                                                  <select name="cant_menores" class="form-control">
                                                                    <option selected value="0">0</option>
                                                                    @for ($i = 0; $i <= $tipo_inmueble->maxpersonas; $i++)
                                                                      <option value="{{$i}}">{{$i}}</option>
                                                                    @endfor
                                                                  </select>
                                                                  <label>Mascotas:</label>
                                                                  <select name="cant_mascotas" class="form-control">
                                                                    <option selected value="0">0</option>
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
                                                                  <lable>Precio x Mayor a 12 Años {{ Auth::user()->moneda }}</lable>
                                                                  <input type="text" name="precio" class="form-control" value="{{$temporada->precio}}" onkeypress="return validardecimal(event,this.value)">
                                                                  <lable>Precio x Menor a 12 Años {{ Auth::user()->moneda }}</lable>
                                                                  <input type="text" name="preciomenor" class="form-control" value="{{$temporada->preciomenor}}" onkeypress="return validardecimal(event,this.value)">
                                                                  <lable>Precio x Mascota{{ Auth::user()->moneda }}</lable>
                                                                  <input type="text" name="preciomascotas" class="form-control" value="{{$temporada->preciomascota}}" onkeypress="return validardecimal(event,this.value)">
                                                                  <lable>Abonar {{ Auth::user()->moneda }}</lable>
                                                                  <input type="text" name="abonar" class="form-control" value="0.00" onkeypress="return validardecimal(event,this.value)">
                                                                  <select name="tipo_pago" class="form-control">
                                                                    <option selected value="Link de Pago">Link de Pago</option>
                                                                    <option value="Credito">Credito</option>
                                                                    <option value="Debito">Debito</option>
                                                                    <option value="Deposito">Deposito</option>
                                                                    <option value="Transferencia">Transferencia</option>
                                                                  </select>
                                                                  <!--datos ocultos-->
                                                                  <input type="hidden" name="idreservacion"  value="{{$reservacion->idreservacion}}">
                                                                  <input type="hidden" name="idtemporada"  value="{{$temporada->idtemporada}}">
                                                                  <input type="hidden" name="idinmueble"  value="{{$inmueble->idinmueble}}">
                                                                  <input type="hidden" name="menoresxpareja"  value="{{$temporada->menoresxpareja}}">
                                                                  <input type="hidden" name="promopersonagratis"  value="{{$temporada->promopersonagratis}}">
                                                                  <input type="hidden" name="promonumpersonas"  value="{{$temporada->promonumpersonas}}">
                                                                  <input type="hidden" name="fecha_entrada"  value="{{$ResFechaInicial}}">
                                                                  <input type="hidden" name="fecha_salida"  value="{{$ResFechaFinal}}">
                                                                  <input type="hidden" name="total_reservacion"  value="{{$reservacion->total}}">
                                                                  <input type="hidden" name="abonado"  value="{{$reservacion->abonado}}">
                                                                  <input type="hidden" name="entrada"  value="{{$entrada}}">
                                                                  <input type="hidden" name="salida"  value="{{$salida}}">
                                                                  <input type="hidden" name="minpersonas"  value="{{$inmueble->minpersonas}}">
                                                                  <input type="hidden" name="maxpersonas"  value="{{$inmueble->maxpersonas}}">
                                                                  <br>
                                                                  <button class="btn btn-info" type="submit"><i class="far fa-plus-square"></i> Agregar</button>
                                                              {{Form::close()}}
                                                            </div>
                                                          </div>
                                                        @else
                                                          @foreach($DetRes as $dr)
                                                          <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                                            <div class="form-group">
                                                                  <?php
                                                                      $resOcuEntrada = date("d-m-Y", strtotime($dr->fecha_entrada));
                                                                      $resOcuSalida = date("d-m-Y", strtotime ($dr->fecha_salida."+ 1 days"));
                                                                  ?>
                                                                  <label for="huesped"><strong><u>{{$inmueble->nombre}}</u></strong> </label>
                                                                  <?php  
                                                                    $imginmueble = DB::table('inmueble_img')
                                                                    ->where('idinmueble', '=', $inmueble->idinmueble)
                                                                    ->first();
                                                                  ?>
                                                                  @if(isset($imginmueble))
                                                                    <a href="{{url('imagenes/inmuebles/', $imginmueble->imagen)}}" class="room image-popup-link" ><img src="{{url('imagenes/inmuebles/', $imginmueble->imagen)}}" style="max-width:100%;width:auto;height:auto;"></a>
                                                                  @endif
                                                                  
                                                                  <font color="red"><strong><u>Reservado</u></strong></font>
                                                                  <p>
                                                                    <font color="orange"><strong>Entrada:</strong></font> <strong>{{$resOcuEntrada}}</strong><br>
                                                                    <font color="orange"><strong>Salida:</strong></font> <strong>{{$resOcuSalida}}</strong>
                                                                  </p>
                                                              </div>
                                                          </div>
                                                          @endforeach
                                                        @endif
                                                      
                                                    @endforeach
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endforeach
                  </div>


            </div>

                
                        
              

            <footer class="card-footer">
                  

        
            </footer>
      </div>
</div>
    
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
    </script>
@push ('scripts')
    <script>
        

        function validardecimal(e,txt) 
        {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            if (tecla==46 && txt.indexOf('.') != -1) return false;
            patron = /[\-\d\.]/;
            te = String.fromCharCode(tecla);
            return patron.test(te); 
        }  

        function validarentero(e,txt) 
        {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla==8)
            {
                return true;
            }
        
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final); 
        }
    </script>
@endpush

@endsection