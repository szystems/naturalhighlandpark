@extends ('layouts.admin')
@section ('contenido')


<div>
      <div class="card mb-4">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Reservación </strong></h2>
            </header>
                
                <input type="hidden" name="updatereservacion" class="form-control" id="updatereservacion" value="abonar">
                    <div class="card-body">
                        <a href="" data-target="#modaleliminarshow-delete-{{$reservacion->idreservacion}}" data-toggle="modal">
                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Reservacion">
                                <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button"><i class="far fa-minus-square"></i> Eliminar</button>
                            </span>
                        </a>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="fecha">Fecha</label>
                                    <p>{{$reservacion->fecha}}</p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="proveedor">Huesped</label>
                                    <?php
                                        $huesped=DB::table('users')
                                        ->where('id','=',$reservacion->idhuesped)
                                        ->first();
                                    ?>
                                    <p>{{$huesped->name}} / {{$huesped->email}} / {{$huesped->telefono}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="codigo">Codigo Reservacion</label>
                                    <p>{{$reservacion->codigo}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="estadoventa">Estado</label>
                                    <p>{{$reservacion->estado_reservacion}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <?php
                                        $usuario=DB::table('users')
                                        ->where('id','=',$reservacion->idusuario)
                                        ->first();
                                    ?>
                                    <label for="usuario">Usuario</label>
                                    <p>{{$usuario->name}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="tipopago">Tipo Pago</label>
                                    
                                    <p>{{$reservacion->tipo_pago}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="estado">Total</label>
                                    <p><font color="Blue"><strong>{{ Auth::user()->moneda }}{{number_format($reservacion->total,2, '.', ',')}}</strong></font></p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="abonado">Abonado</label>
                                    
                                    <p><font color="limegreen"><strong>{{ Auth::user()->moneda }}{{number_format($reservacion->abonado,2, '.', ',')}}</strong></font></p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="estado">Saldo</label>
                                    <p><font color="Red"><strong>{{ Auth::user()->moneda }}{{number_format($reservacion->total-$reservacion->abonado,2, '.', ',')}}</strong></font>({{$reservacion->estado_saldo}})</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="estado">Comentarios y solicitudes</label>
                                    <textarea readonly id="comentario" type="text" class="form-control" name="comentario" >{{$reservacion->comentario}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="estado">No. de Transacción</label>
                                    <p>{{$reservacion->no_transaccion}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="estado">Imagen de Transacción</label>
                                    @if ($reservacion->imagen_transaccion != null)
                                        <a target="_blank" href="{{url('imagenes/transacciones/'.$reservacion->imagen_transaccion)}}" class="room image-popup-link" >
                                            <img src="{{asset('imagenes/transacciones/'.$reservacion->imagen_transaccion)}}" alt="" width="250px"  class="img-thumbnail">
                                        </a>
                                    @else
                                        <br>
                                        "No hay imagen"
                                    @endif
                                </div>
                            </div>


                        
                            
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                        <thead style="background-color:#A9D0F5">
                                            
                                            <th>Hospedaje</th>
                                            <th>Entrada</th>
                                            <th>Salida</th>
                                            <th>Comentarios</th>
                                            <th>Cantidades</th>
                                            <th>Sub-Total</th>
                                        </thead>
                                        <tfoot>
                                        <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th><h4 align="right"><strong>Total: </strong></h4></th>
                                            <th ><h4 id="total" align="right"><strong>{{ Auth::user()->moneda }}{{ number_format($reservacion->total,2, '.', ',')}}</strong></th>
                                        </tfoot>
                                        <tbody>
                                            @foreach($detalles as $detalle)
                                            <tr>
                                                <?php
                                                    $inmueble=DB::table('inmueble')
                                                    ->where('idinmueble','=',$detalle->idinmueble)
                                                    ->first();
                                                ?>
                                                <td align="left">{{ $inmueble->nombre}}</td>
                                                <td align="center">{{ $detalle->fecha_entrada}}</td>
                                                <td align="center">{{ $detalle->fecha_salida}}</td>
                                                <td align="center">{{ $detalle->comentarios}}</td>
                                                <td align="left"><font color="blue">Mayores:</font><br><font color="orange"> {{$detalle->cant_mayores}} * {{ Auth::user()->moneda }}{{number_format($detalle->precio_mayores,2, '.', ',')}} = <strong>{{ Auth::user()->moneda }}{{number_format($detalle->cant_mayores * $detalle->precio_mayores,2, '.', ',')}}</strong></font><br><font color="blue">Menores:</font><br><font color="orange"><font color="orange">{{$detalle->cant_menores}} * {{ Auth::user()->moneda }}{{number_format($detalle->precio_menores,2, '.', ',')}} = <strong>{{ Auth::user()->moneda }}{{number_format($detalle->cant_menores * $detalle->precio_menores,2, '.', ',')}}</strong></font><br><font color="blue">Mascotas:</font><font color="orange"><br><font color="orange">{{$detalle->cant_mascotas}} * {{ Auth::user()->moneda }}{{number_format($detalle->preciomascotas,2, '.', ',')}} = <strong>{{ Auth::user()->moneda }}{{number_format($detalle->cant_mascotas * $detalle->preciomascotas,2, '.', ',')}}</strong></font></td>
                                                <td align="right"><font color="Blue">{{ Auth::user()->moneda }}{{number_format(($detalle->cant_mayores * $detalle->precio_mayores) + ($detalle->cant_menores * $detalle->precio_menores) + ($detalle->cant_mascotas * $detalle->preciomascotas),2, '.', ',')}}</font></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>


                    </div>

                    
              
            @include('reservaciones.reservacion.modaleliminarshow')
            <footer class="card-footer">

            </footer>
      </div>
</div>
   


@push ('scripts')
    <script>
        function validardecimal(e,txt) 
        {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            if (tecla==46 && txt.indexOf('.') != -1) return false;
            patron = /[-?\d\.]/;
            te = String.fromCharCode(tecla);
            return patron.test(te); 
        } 
    </script>
@endpush

@endsection