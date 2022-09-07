@extends('layouts.app')

@section('content')

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
                        <h3>Crear Reservacion</h3>
                        <h8><font color="orange">Campos con "*" son obligatorios</font></h8>
						{!!Form::open(array('url'=>'vistas/reservaciones','method'=>'POST','autocomplete'=>'off'))!!}
                        {{Form::token()}}
                            <div class="row form-group">
                                <div class="col-md-3">
									<label for="fname">Fecha Reaervacion</label>
                                    <input readonly type="" id="dpfecha" name="fecha" class="form-control" value="{{$hoy}}">
								</div>
								<div class="col-md-3">
									<label for="fname">Fecha Entrada</label>
									<input readonly type="" id="dpentrada" name="fecha_entrada" class="form-control" value="{{$entrada}}">
								</div>
								<div class="col-md-3">
									<label for="lname">Fecha Salida</label>
									<input readonly type="" id="dpsalida" name="fecha_salida" class="form-control" value="{{$salida}}">
								</div>
                                <div class="col-md-3">
									<label for="lname">Personas</label>
									<input readonly type="" id="dppersonas" name="personas" class="form-control" value="{{$personas}}">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-6">
									<label for="fname">Nombre*</label>
                                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="form-control" placeholder="Tu Nombre">
                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('nombre') }}
                                                </strong>
                                        </span>
                                    @endif
								</div>
								<div class="col-md-6">
									<label for="lname">No. Documento</label>
                                    <input type="text" id="num_documento" name="num_documento" value="{{ old('num_documento') }}" class="form-control" placeholder="Tu No. Documento" onkeypress="return validarentero(event,this.value)">
                                    @if ($errors->has('num_documento'))
                                        <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('num_documento') }}
                                                </strong>
                                        </span>
                                    @endif
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-6">
									<label for="email">Email*</label>
                                    <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Tu direccion de correo">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('email') }}
                                                </strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
									<label for="telefono">Telefono*</label>
                                    <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}" class="form-control" placeholder="Tu numero de telefono" onkeypress="return validarentero(event,this.value)">
                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                                <strong>
                                                    {{ $errors->first('telefono') }}
                                                </strong>
                                        </span>
                                    @endif
								</div>
                            </div>
                            <!-- datos escondidos-->
                                <?php
                                    $moneda = $user->moneda;
                                    $idempresa = $user->idempresa;
                                    $zona_horaria = $user->zona_horaria;
                                    $idusuario = $user->id;
                                    $emailUsu = $user->email;
                                ?>
                                <input type="hidden" id="moneda" name="moneda" class="form-control" value="{{$moneda}}">
                                <input type="hidden" id="idusuario" name="idusuario" class="form-control" value="{{$idusuario}}">
                                <input type="hidden" id="emailUsu" name="emailUsu" class="form-control" value="{{$emailUsu}}">
                                <input type="hidden" id="idempresa" name="idempresa" class="form-control" value="{{$idempresa}}">
                                <input type="hidden" id="zona_horaria" name="zona_horaria" class="form-control" value="{{$zona_horaria}}">
                                <input type="hidden" id="estado_reservacion" name="estado_reservacion" class="form-control" value="Pendiente">
                            <!-- Fin Datos escondidos-->
                            
                            <div class="row form-group">
								<div class="col-md-10">
									<label for="habitaciones">Habitaciones disponibles ("{{$entrada}}" a "{{$salida}}")</label>
									<select name="pidhabitacion" class="form-control selectpicker" id="pidhabitacion" data-live-search="true">
                                        <option value="" selected>Seleccione una habitacion</option>
                                            @foreach($habitaciones as $habitacion)
                                                <?php
                                                    $fentrada =date("Y-m-d", strtotime($entrada));
                                                    $fsalida =date("Y-m-d",strtotime($salida));
                                                    $cont = 0;
                                                ?>
                                                @foreach($allRes as $res)
                                                <?php
                                                    if (($res->idhabitacion == $habitacion->idhabitacion) && ((($fentrada >= $res->fentrada) && ($fentrada < $res->fsalida)) || (($fsalida > $res->fentrada) && ($fsalida <= $res->fsalida))))
                                                    {
                                                        $cont = $cont + 1;
                                                    }
                                                ?>
                                                @endforeach
                                                <?php
                                                
                                                if ($cont == 0) 
                                                {
                                                     if ($personas == '3-6')
                                                     {
                                                        $preciopersonas = $habitacion->precio;
                                                     }else
                                                     {
                                                         $preciopersonas = $habitacion->precio2;
                                                     }
                                                        
                                                ?>
                                                    <option value="{{$habitacion->idhabitacion}}_{{number_format($preciopersonas,2, '.', '')}}_{{number_format($habitacion->oferta)}}_{{$habitacion->oferta_activar}}">{{$habitacion->habitacion}} - {{$personas}} Personas - Precio: {{ $moneda }}{{number_format($preciopersonas,2, '.', '')}}<?php if ($habitacion->oferta_activar == "Habilitado") {$mult=($preciopersonas*($habitacion->oferta/100));  $ofta=$preciopersonas-$mult; ?> - <font color="green">P.Oferta: {{ $moneda }}{{number_format($ofta,2, '.', '')}}</font> -{{$habitacion->oferta}}% <?php } ?></option>
                                                <?php
                                                }
                                                ?>
                                            @endforeach
                                    </select>
                                    <!-- Datos Escondidos Formulario para agregar habitaciones-->

                                        <input type="hidden" name="pdias" class="form-control" id="pdias" value="{{$cantDias}}">
                                        <input type="hidden" name="pprecio" class="form-control" id="pprecio">
                                        <input type="hidden" name="pdescuento" class="form-control" id="pdescuento" value="0">
                                        <input type="hidden" name="poferta" class="form-control" id="poferta">
                                        <input type="hidden" name="pporcentaje_oferta" class="form-control" id="pporcentaje_oferta">

                                    <!-- Fin Datos Escondidos Formulario para agregar habitaciones-->
                                </div>
                                <div class="col-md-2">
                                    <label for="agregar"><i class="far fa-plus-square"></i></label>
									<button class="btn btn-info" type="button" id="bt_add"><i class="far fa-plus-square"></i> Agregar</button>
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            <th><i class="fa fa-sliders-h"></i></th>
                                            <th>Habitacion</th>
                                            <th>Dias</th>
                                            <th>Precio</th>
                                            <!--<th>Precio Compra</th>-->
                                            <th>Descuento Total</th>
                                            <!--<th>Impuesto Total</th>-->
                                            <th>Sub-Total</th>
                                        </thead>
                                        <tfoot>
                                            <th></th>
                                            <th></th>
                                            <th><H5 align="right">Total Descuento:</th>
                                            <th><h5 align="right" id="totaldescuento">{{ $moneda }}0.00</h5></th>
                                            <th><H4 align="right"><strong>TOTAL:</strong></h4></th>
                                            <th><h4 align="right" id="total"><strong>{{ $moneda }}0.00</strong></h4><input type="hidden" name="total_venta" id="total_venta"></th>
                                        </tfoot>
                                        <tbody>
                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
									<label for="tipo_pago">Tipo Pago</label>
									<select name="tipo_pago" class="form-control">
                                        <option value="Efectivo" selected>Efectivo</option>
                                        <option value="Tarjeta">Tarjeta</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Credito">Credito</option>
                                    </select>
                                    <input type="hidden" id="abonado" name="abonado" class="form-control" placeholder="0" onkeypress="return validardecimal(event,this.value)">
                                    <input type="hidden" name="total_compra" class="form-control" id="total_compra" placeholder="total_compra" onkeypress="return validardecimal(event,this.value)">
                                </div>
                                <div class="col-md-8">
									<label for="tipo_pago">Comentarios y solicitudes</label>
									<textarea type="text" id="comentarios" name="comentarios" class="form-control" ></textarea>
                                </div>
                                
                            </div>
							<div class="form-group text-center">
                                <button class="btn btn-primary" type="submit"><i class="far fa-save"></i> Enviar Reservacion</button>
							</div>

						{!!Form::close()!!}		
					</div>
				</div>
			</div>
		</div>
@push ('scripts')
    <script>
        $(document).ready(function(){
            $('#bt_add').click(function(){
                agregar();
            });
        });

        var cont=0;
        total=0;
        totaldescuento=0;
        total_compra=0;
        subtotal=[];
        subtotaldescuento=[];
        subtotalcompra=[];
        $("#guardar").hide();
        $("#pidhabitacion").change(mostrarValores);

        function mostrarValores()
        {
            datosHabitacion=document.getElementById('pidhabitacion').value.split('_');
            $("#pprecio").val(datosHabitacion[1]);
            $("#poferta").val(datosHabitacion[3]);
            $("#pporcentaje_oferta").val(datosHabitacion[2]);
            if (datosHabitacion[3] == "Habilitado")
            {
                $("#pdescuento").val(datosHabitacion[2]);
            }else
            {
                $("#pdescuento").val(0);
            }
            
        }

        function agregar()
        {
            datosHabitacion=document.getElementById('pidhabitacion').value.split('_');

            idhabitacion=datosHabitacion[0];
            habitacion=$("#pidhabitacion option:selected").text();
            dias=$("#pdias").val();

            descuento=$("#pdescuento").val();
            precio=$("#pprecio").val();
            oferta_activa=$("#poferta").val();
            if (datosHabitacion[3] == "Habilitado")
            {
                poferta=$("#pporcentaje_oferta").val();
            }
            else
            {
                poferta=$("#pdescuento").val();
            }


            moneda=$("#moneda").val();

            
            
            if (idhabitacion!="" && dias!="" && dias>0 && descuento!="" && precio!="" && poferta!="")
            {
                //if (stock-cantidad >= 0)
                //{
                    if (descuento <= 100 || ((descuento == oferta) && (oferta_activa == "Habilitado")))
                    {
                        descuentoxunidad=((precio*descuento)/100);
                        subtotal[cont]=(dias*precio-(descuentoxunidad*dias));
                        total=total+subtotal[cont];

                        subtotaldescuento[cont]=(dias*descuentoxunidad);
                        totaldescuento=totaldescuento+subtotaldescuento[cont];
                    

                        var fila='<tr class="selected" id="fila'+cont+'"><td align="center"><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td align="center"><input type="hidden" name="idhabitacion[]" value="'+idhabitacion+'">'+habitacion+'</td><td align="center"><input type="hidden" style="width:100%" readonly name="dias[]" value="'+dias+'">'+dias+'</td><td align="right"><input type="hidden" style="width:100%" readonly name="precio[]" value="'+precio+'">{{$moneda}}'+precio+'<input type="hidden" style="width:100%" readonly name="oferta[]" value="'+descuento+'"></td><td align="right"><input type="hidden" style="width:100%" readonly name="descuento[]" value="'+descuentoxunidad*dias+'">{{$moneda}}'+(descuentoxunidad*dias).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</td><td align="right">{{$moneda}}'+subtotal[cont].toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</td></tr>'; 
                        
                        cont++;
                        limpiar();
                        $("#total").html(moneda + total.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
                        $("#total_venta").val(total);

                        $("#totaldescuento").html(moneda + totaldescuento.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
                        $("#total_descuento").val(totaldescuento);

                        
                        evaluar();
                        
                        
                        $("#abonado").val(total.toFixed(2));
                        $("#total_abonado").val(total.toFixed(2));
                        $('#pidhabitacion').val("Seleccione una habitacion");
                        $('#pidhabitacion').change();
                        $('#detalles').append(fila);
                    }
                    else
                    {
                        alert ('El descuento supera el 100% o el máximo de descuento permitido al usuario');
                    }

                    
                //}
                //else
                //{
                    //alert ('La cantidad a vender supera el Stock');
                //}

                
            }
            else 
            {
                alert("Error al ingresar el detalle de la Reservacion, revise los datos de la habitacion");
            }
        }

        function limpiar()
        {
            
            $("#pdescuento").val("0");
            $("#pprecio").val("");
            $("#poferta").val("");
        }

        function evaluar()
        {
            if (total>0)
            {
                $("#guardar").show();
            }
            else
            {
                $("#guardar").hide();
            }
        }

        function eliminar(index)
        {
            total=total-subtotal[index];
            totaldescuento=totaldescuento-subtotaldescuento[index];
            
            $("#total").html("Q. " + total.toFixed(2));
            $("#total_venta").val(total.toFixed(2));
            $("#abonado").val(total.toFixed(2));
            $("#totaldescuento").html("Q. " + totaldescuento.toFixed(2));
            $("#total_descuento").val(totaldescuento.toFixed(2));
            $("#pabonado").val(total.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }

        function validardecimal(e,txt) 
        {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            if (tecla==46 && txt.indexOf('.') != -1) return false;
            patron = /[\d\.]/;
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