@extends('layouts.app')

@section('content')

<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
                        <h3>Detalles de Rerervacion</h3>
                        {{Form::open(array('action' => 'ReportesController@vistareservacioncliente','method' => 'POST','role' => 'form', 'target' => '_blank'))}}

                        {{Form::token()}}		
                            <div class="card mb-4">
                                <header class="card-header d-md-flex align-items-center">
                                    <h4><strong>Imprimir Reservacion </strong></h4>
                                    <input type="hidden" id="rid" class="form-control datepicker" name="rid" value="{{$reservacion->idreservacion}}">
                                    <input type="hidden" id="rcodigo" name="rcodigo" value="{{$reservacion->codigo}}">
                                </header>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group mb-2">
                                                <select name="pdf" class="form-control" value="">
                                                        <option value="Descargar" selected>Descargar</option>
                                                        <option value="Navegador">Ver en navegador</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                            <div class="form-group mb-2">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-file-pdf"></i> PDF
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        {{Form::close()}}
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
									<label for="lname">Personas</label>
                                    <input readonly type="text" id="personas" name="personas" value="{{ $reservacion->personas }}" class="form-control" > 
                                </div>
                                <div class="col-md-3">
									<label for="lname">Estado Reservacion</label>
                                    <input readonly type="text" id="estado_reservacion" name="estado_reservacion" value="{{ $reservacion->estado_reservacion }}" class="form-control" > 
                                </div>
							</div>
                            <div class="row form-group">
								<div class="col-md-6">
                                    <label for="fname">Fecha Entrada</label>
                                    <?php
                                        $entrada = date("d-m-Y", strtotime($reservacion->fecha_entrada));
                                    ?>
									<input readonly type="" id="entrada" name="entrada" class="form-control" value="{{$entrada}}">
								</div>
								<div class="col-md-6">
                                    <label for="lname">Fecha Salida</label>
                                    <?php
                                        $salida = date("d-m-Y", strtotime($reservacion->fecha_salida));
                                    ?>
									<input readonly type="" id="salida" name="salida" class="form-control" value="{{$salida}}">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-3">
									<label for="fname">Nombre</label>
                                    <input readonly type="text" id="nombre" name="nombre" value="{{ $reservacion->nombre }}" class="form-control" >
								</div>
								<div class="col-md-3">
									<label for="lname">No. Documento</label>
                                    <input readonly type="text" id="num_documento" name="num_documento" value="{{ $reservacion->num_documento }}" class="form-control" > 
                                </div>
                                <div class="col-md-3">
									<label for="email">Email</label>
                                    <input readonly type="text" id="email" name="email" value="{{ $reservacion->email }}" class="form-control" >
                                </div>
                                <div class="col-md-3">
									<label for="telefono">Telefono</label>
                                    <input readonly type="text" id="telefono" name="telefono" value="{{ $reservacion->telefono }}" class="form-control" >
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
                                    <input readonly type="text" id="comentarios" name="comentarios" value="{{ $reservacion->comentarios }}" class="form-control" >
								</div>
                            </div>
                            <h3>Detalles de Habitaciones</h3>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            
                                            <th>Habitacion</th>
                                            <th>Dias</th>
                                            <th>Precio</th>
                                            <th>Descuento Total</th>
                                            <th>Subtotal</th>
                                        </thead>
                                        <tfoot>
                                            
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <!--<th></th>
                                            <th></th>-->
                                            <th><h4 align="right"><strong>Total: </strong></h4></th>
                                            <th ><h4 id="total" align="right"><strong>{{ $user->moneda }}{{ number_format($reservacion->total,2, '.', ',')}}</strong></th>
                                        </tfoot>
                                        <tbody>
                                            @foreach($resHab as $rh)
                                            <tr>
                                                <td align="left">{{ $rh->habitacion}}</td>
                                                <td align="center">{{ $rh->dias}}</td>
                                                <td align="right">{{ $user->moneda }}{{ number_format($rh->precio,2, '.', ',')}}</td>
                                                <td align="right">{{ $user->moneda }}{{ number_format((($rh->descuento)),2, '.', ',')}}</td>
                                                <td align="right">{{ $user->moneda }}{{ number_format(((($rh->dias)*($rh->precio))-($rh->descuento)),2, '.', ',')}}</td>
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