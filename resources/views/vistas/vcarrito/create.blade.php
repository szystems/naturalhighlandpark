@extends('layouts.app')

@section('content')
<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<h2>Reservacion a confirmar:</h2>
				<p><strong>Nota:</strong> Revise los detalles de su reservación y realice los cambios que desee, si esta todo correcto llene el formulario con los datos que se le piden a continuación y confirme la misma:</p>
				 
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
                <!--Inicio carrito-->
				@if($carrito->count() != 0)
                <div class="card mb-4">
                    <header class="card-header">
                        <h5 class="h3 card-header-title"><strong>Detalles de Reservacion: </strong></h5>
                    </header>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if(Cart::isEmpty() != 1)
                                <div align="right">
                                    <a href="" data-target="#modal-vaciar" data-toggle="modal">
                                        <button class="genric-btn danger circle" style="pointer-events: none;" type="button">
                                            <i class="far fa-minus-square"></i> Vaciar Carrito
                                        </button>
                                    </a>
                                </div>
                            @endif
                            <table class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th><p><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
                                    <th><p><strong>Hospedaje</strong></p></th>
                                    <th><p><strong>Entrada/Salida</strong></p></th>
                                    <th><p><strong>Promocion</strong></p></th>
                                    <th><p><strong>Mayores</strong></p></th>
                                    <th><p><strong>Menores</strong></p></th>
                                    <th><p><strong>Mascotas</strong></p></th>
                                    <th><p><strong>Sub-Total</strong></p></th>
                                    
                                </thead>
                                <?php
                                    $total=0;
                                ?>
                            @foreach ($carrito as $detalle)
                                <tr>
                                    <?php
                                        $total=$total + (($detalle->quantity * $detalle->price)+($detalle->quantity2 * $detalle->price2)+($detalle->quantity3 * $detalle->price3));
                                        $detalleFEntrada = date("d-m-Y", strtotime($detalle->fecha_entrada));
                                        $detalleFSalida = date("d-m-Y", strtotime ($detalle->fecha_salida."+ 1 days"));

                                        
                                    ?>
                                    <td align="left">
                                        <a href="" data-target="" data-toggle="modal">
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Hospedaje">
                                                <a href="" data-target="#modal-det-{{$detalle->id}}" data-toggle="modal">
                                                    <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
                                                        <i class="far fa-minus-square"></i>
                                                    </button>
                                                </a>
                                            </span>
                                        </a>
                                        <a href="" data-target="" data-toggle="modal">
                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Hospedaje">
                                                <a href="" data-target="#modal-precio-{{$detalle->id}}" data-toggle="modal">
                                                    <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
                                                        <i class="far fa-edit"></i>
                                                    </button>
                                                </a>
                                            </span>
                                        </a>
                                    </td>
                                    <td align="left"><p><strong>{{$detalle->name}}</strong></p></td>
                                    <td align="center"><p><font color="limegreen">{{$detalleFEntrada}}</font> / <font color="red">{{$detalleFSalida}}</font></p></td>
                                    <td align="left"><p>{{$detalle->comentario}}</p></td>
                                    <td align="left"><p><font color="orange"> {{$detalle->quantity}} * {{ $datosConfig->moneda }}{{number_format($detalle->price,2, '.', ',')}} = {{ $datosConfig->moneda }}{{number_format($detalle->quantity * $detalle->price,2, '.', ',')}}</font></p></td>
                                    <td align="center"><p><font color="orange">{{$detalle->quantity2}} * {{ $datosConfig->moneda }}{{number_format($detalle->price2,2, '.', ',')}} = {{ $datosConfig->moneda }}{{number_format($detalle->quantity2 * $detalle->price2,2, '.', ',')}}</font></p></td>
                                    <td align="center"><p><font color="orange">{{$detalle->quantity3}} * {{ $datosConfig->moneda }}{{number_format($detalle->price3,2, '.', ',')}} = {{ $datosConfig->moneda }}{{number_format($detalle->quantity3 * $detalle->price3,2, '.', ',')}}</font></p></td>
                                    <td align="left"><p><font color="Blue">{{ $datosConfig->moneda }}{{number_format(($detalle->quantity * $detalle->price) + ($detalle->quantity2 * $detalle->price2) + ($detalle->quantity3 * $detalle->price3) ,2, '.', ',')}}</font></p></td>
                                    
                                </tr>
                                @include('vistas.vcarrito.detalle.detmodal')
								@include('vistas.vcarrito.vaciar.vaciarcarritomodal')
								@include('vistas.vcarrito.detprecio.detmodalprecio')
                            @endforeach
                            <tr>
                            <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td align="right"><p><font color="Black"><strong>Total:<s/trong></font></p></td>
                                    <td><p><strong><font color="limegreen">{{ $datosConfig->moneda }}{{number_format($total,2, '.', ',')}}</font></strong></p></td>
                                    
                                </tr>
                            </table>
                        </div>
                        
                    </div>
                    <footer class="card-footer">
                        
                    </footer>
                </div>
					 
				@endif
                <!--Fin Carrito-->   
				         
				
			</div>
		</div>

        <div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
                        @if (count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                    </ul>
                                </div>
                        @endif
                        <h3>Confirmar Reservación</h3>
						{!!Form::open(array('url'=>'vistas/vcarrito','method'=>'POST','autocomplete'=>'off'))!!}
                        {{Form::token()}}
                            <div class="row form-group">
                                <div class="col-md-3">
									<label for="fname">Fecha</label>
                                    <?php
                                        $Fecha = date("d-m-Y", strtotime($hoy));
                                    ?>
                                    <input readonly type="hidden" id="fecha" name="fecha" class="form-control" value="{{$hoy}}">
									<input readonly type="text" id="fecha2" name="fecha2" class="form-control" value="{{$Fecha}}">
								</div>
                            </div>
                            <div class="row form-group">
                                
                                <div class="col-md-4">
									<label for="idhuesped">Huesped</label>
                                    <input readonly type="text" id="huesped" name="huesped" class="form-control" value="{{Auth::user()->name}}">
                                    <!--datos ocultos-->
                                    <input type="hidden" id="idhuesped" name="idhuesped" class="form-control" value="{{Auth::user()->id}}">
                                    <input type="hidden" id="idusuario" name="idusuario" class="form-control" value="{{$user->id}}">
                                    <input type="hidden" id="abonado" name="abonado" class="form-control" value="0">
                                    <input type="hidden" id="estado_reservacion" name="estado_reservacion" class="form-control" value="Pendiente">
                                    <input type="hidden" id="estado" name="estado" class="form-control" value="Habilitado">
                                    <input type="hidden" id="estado_saldo" name="estado_saldo" class="form-control" value="Pendiente">
								</div>
								<div class="col-md-4">
									<label for="idhuesped">Telefono/Whatsapp*</label>
                                    <input type="text" id="telefono" name="telefono" class="form-control" value="{{Auth::user()->telefono}}" required>
								</div>
                                <div class="col-md-4">
									<label for="idhuesped">Email</label>
                                    <input readonly type="text" id="email" name="email" class="form-control" value="{{Auth::user()->email}}">
								</div>
								<div class="col-md-6">
                                    <label for="tipo_pago">Tipo Pago</label>
									<select name="tipo_pago" class="form-control">
                                        <option value="Link de Pago">Link de Pago</option>
                                        <option value="Credito">Credito</option>
                                        <option value="Debito">Debito</option>
                                        <option value="Deposito">Deposito</option>
                                        <option value="Transferencia">Transferencia</option>
                                    </select>
								</div>
                                
                                <div class="col-md-6">
									<label for="total">Total</label>
                                    <input type="hidden" id="total" name="total" value="{{$total}}" class="form-control">
                                    <input readonly type="text" id="total2" name="total2" value="{{ $datosConfig->moneda }}{{number_format($total,2, '.', ',')}}" class="form-control">
                                    <p></p>
                                    
								</div>
                                <div class="col-md-12">
                                    <label for="comentario">Comentarios y solicitudes</label>
									<textarea type="text" id="comentario" name="comentario" class="form-control" rows="5"></textarea>
								</div>
							</div>
                            <div class="form-group text-center">
                                <font size="2"><b><u>Observaciones:</u></b></font><br>
                                <font color="red" size="2">- No nos hacemos responsables por daños causados por su mascota.</font><br>
                                <font color="red" size="2">- No es permitido el ingreso de mascotas al restaurante.</font><br>
                                <font color="red" size="2">- Solo se permite el ingreso de razas pequeñas y medianas.</font><br>
							</div>
							<div class="form-group text-center">
                                <button class="btn btn-primary" type="submit"><i class="far fa-save"></i> Confirmar Reservacion</button>
							</div>
                            

						{!!Form::close()!!}		
					</div>
				</div>
			</div>
		</div>
@endsection