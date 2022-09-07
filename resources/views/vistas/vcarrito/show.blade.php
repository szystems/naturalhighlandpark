@extends('layouts.app')

@section('content')

<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
                        <!--Mensaje de abono correcto-->
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))

                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            {{session()->forget('alert-' . $msg)}}
                            @endforeach
                            
                        </div> 
                        <!-- fin .flash-message -->
                        <h3>Detalles de Rerervacion</h3>
                            <div class="row form-group">
								
								<div class="col-md-3">
									<label for="lname">No. de Transacción</label>
                                    <input readonly type="text" id="codigo" name="codigo" value="{{ $reservacion->no_transaccion }}" class="form-control" > 
                                </div>
                                <div class="col-md-3">
                                    <label for="fname">Imagen Transacción</label>
                                    
                                    @if ($reservacion->imagen_transaccion != null)
                                        <a href="{{url('imagenes/transacciones/'.$reservacion->imagen_transaccion)}}" class="room image-popup-link" >
                                            <img src="{{asset('imagenes/transacciones/'.$reservacion->imagen_transaccion)}}" alt="" width="250px"  class="img-thumbnail">
                                        </a>
                                    @else
                                        <br>
                                        "No hay imagen"
                                    @endif
                                </div>
                                @if (Auth::guest())

                                @elseif(Auth::user()->tipo_usuario == "Huesped")
                                <div class="col-md-3">
                                    <label for="fname">Subir o Editar Transaccion</label>
                                    <a href="" data-target="#modaleditartransaccion{{$reservacion->idreservacion}}" data-toggle="modal">
                                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Subir Transacción">
                                            <button class="btn btn-primary" style="pointer-events: none;" type="button">
                                                <i class="	far fa-file-alt"></i> No. Transacción e Imagen
                                            </button>
                                        </span>
                                    </a>
                                    @include('vistas.vcarrito.editartransaccion.transaccion')
                                </div>
                                @endif
							</div>
                            <div class="row form-group">
								
								<div class="col-md-3">
									<label for="lname">Codigo</label>
                                    <input readonly type="text" id="codigo" name="codigo" value="{{ $reservacion->codigo }}" class="form-control" > 
                                </div>
                                <div class="col-md-3">
                                    <label for="fname">Fecha Reservacion</label>
                                    <?php
                                        $fecha = date("d-m-Y", strtotime($reservacion->fecha));
                                    ?>
                                    <input readonly type="" id="fecha" name="fecha" class="form-control" value="{{$fecha}}">
                                </div>
                                <div class="col-md-3">
									<label for="lname">Estado Reservacion</label>
                                    <input readonly type="text" id="estado_reservacion" name="estado_reservacion" value="{{ $reservacion->estado_reservacion }}" class="form-control" > 
                                </div>
							</div>
							<div class="row form-group">
								<div class="col-md-3">
									<label for="fname">Nombre</label>
                                    <input readonly type="text" id="nombre" name="nombre" value="{{ $reservacion->huesped }}" class="form-control" >
								</div>
                                <div class="col-md-3">
									<label for="email">Email</label>
                                    <input readonly type="text" id="email" name="email" value="{{ $reservacion->huespedEmail }}" class="form-control" >
                                </div>
                                <div class="col-md-3">
									<label for="telefono">Telefono</label>
                                    <input readonly type="text" id="telefono" name="telefono" value="{{ $reservacion->huespedTelefono }}" class="form-control" >
								</div>
							</div>
                            <div class="row form-group">
								<div class="col-md-4">
									<label for="email">Tipo Pago</label>
                                    <input readonly type="text" id="tipo_pago" name="tipo_pago" value="{{ $reservacion->tipo_pago }}" class="form-control" >
                                </div>
                                <div class="col-md-4">
									<label for="telefono">Abonado</label>
                                    <input readonly type="text" id="abonado" name="abonado" value="{{ $reservacion->abonado }}" class="form-control" >
                                </div>
                                <div class="col-md-4">
									<label for="telefono">Estado Saldo</label>
                                    <input readonly type="text" id="estado_saldo" name="estado_saldo" value="{{ $reservacion->estado_saldo }}" class="form-control" >
								</div>
                                <div class="col-md-12">
									<label for="telefono">Comentarios y solicitudes</label>
                                    <textarea readonly type="text" id="comentarios" name="comentarios" rows="5" class="form-control" >{{ $reservacion->comentario }}</textarea>
								</div>
                                <div class="form-group text-center">
                                    <font size="2"><b><u>Observaciones:</u></b></font><br>
                                    <font color="red" size="2">- No nos hacemos responsables por daños causados por su mascota.</font><br>
                                    <font color="red" size="2">- No es permitido el ingreso de mascotas al restaurante.</font><br>
                                    <font color="red" size="2">- Solo se permite el ingreso de razas pequeñas y medianas.</font><br>
                                </div>
                            </div>
                            <h3>Detalles de Reservacion</h3>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            
                                            <th><p><strong>Hospedaje</strong></p></th>
                                            <th><p><strong>Entrada/Salida</strong></p></th>
                                            <th><p><strong>Promocion</strong></p></th>
                                            <th><p><strong>Mayores</strong></p></th>
                                            <th><p><strong>Menores</strong></p></th>
                                            <th><p><strong>Mascotas</strong></p></th>
                                            <th><p><strong>Sub-Total</strong></p></th>
                                        </thead>
                                        <tfoot>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <!--<th></th>
                                            <th></th>-->
                                            <th><h4 align="right"><strong>Total: </strong></h4></th>
                                            <th ><h4 id="total" align="right"><strong>{{ $user->moneda }}{{ number_format($reservacion->total,2, '.', ',')}}</strong></th>
                                        </tfoot>
                                        <tbody>
                                            @foreach($detalles as $detalle)
                                            <tr>
                                            <td align="left"><p><strong>{{$detalle->nombre}}</strong></p></td>
                                            <?php
                                                $detalleFEntrada = date("d-m-Y", strtotime($detalle->fecha_entrada));
                                                $detalleFSalida = date("d-m-Y", strtotime ($detalle->fecha_salida."+ 1 days")); 
                                            ?>
                                            <td align="center"><p><font color="limegreen">{{$detalleFEntrada}}</font> / <font color="red">{{$detalleFSalida}}</font></p></td>
                                            <td align="left"><p>{{$detalle->comentarios}}</p></td>
                                            <td align="left"><p><font color="orange"> {{$detalle->cant_mayores}} * {{ $user->moneda }}{{number_format($detalle->precio_mayores,2, '.', ',')}} = {{ $user->moneda }}{{number_format($detalle->cant_mayores * $detalle->precio_mayores,2, '.', ',')}}</font></p></td>
                                            <td align="center"><p><font color="orange">{{$detalle->cant_menores}} * {{ $user->moneda }}{{number_format($detalle->precio_menores,2, '.', ',')}} = {{ $user->moneda }}{{number_format($detalle->cant_menores * $detalle->precio_menores,2, '.', ',')}}</font></p></td>
                                            <td align="center"><p><font color="orange">{{$detalle->cant_mascotas}} * {{ $user->moneda }}{{number_format($detalle->preciomascotas,2, '.', ',')}} = {{ $user->moneda }}{{number_format($detalle->cant_mascotas * $detalle->preciomascotas,2, '.', ',')}}</font></p></td>
                                            <td align="left"><p><font color="Blue">{{ $user->moneda }}{{number_format(($detalle->cant_mayores * $detalle->precio_mayores) + ($detalle->cant_menores * $detalle->precio_menores) + ($detalle->cant_mascotas * $detalle->preciomascotas),2, '.', ',')}}</font></p></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>	
					</div>
				</div>
			</div>
		</div>

@endsection