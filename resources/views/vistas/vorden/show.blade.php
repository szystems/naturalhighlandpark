@extends('layouts.app')
@section('content')
<!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bgcategoria">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>
				  	Detalles de Orden
			  </h2>
              <p>Inicio <span>-</span>Orden <span>-</span>Detalles</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->	

  <!--================ confirmation part start =================-->
    <section class="confirmation_part padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="confirmation_tittle">
                        <span>Aquí veras todos los detalles de tu orden desde que fue confirmada hasta su finalización.</span>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Informacion de la Orden</h4>
                        <ul>
                        <li>
                            <p>Codigo de Orden</p><span>: {{$ordenConfirmada->codigo}}</span>
                        </li>
                        <li>
                            <?php
								$fecha = date("d-m-Y", strtotime($ordenConfirmada->fecha_update));
							?>
                            <p>Fecha</p><span>: {{$fecha}}</span>
                        </li>
                        <li>
                            <p>Total</p><span>: {{ Auth::user()->moneda }}{{ number_format($ordenConfirmada->total,2, '.', ',')}}</span>
                        </li>
                        <li>
                            <p>Total Envio</p><span>: {{ Auth::user()->moneda }}{{ number_format($ordenConfirmada->envio,2, '.', ',')}}</span>
                        </li>
                        <li>
                            <p>Metodo de Pago</p><span>: {{$ordenConfirmada->tipo_pago}} ({{$ordenConfirmada->estado_pago}})</span>
                        </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                <div class="single_confirmation_details">
                    <h4>Estado de la orden</h4>
                    <ul>
                    <li>
                        <p>Estado Orden</p><span>: {{$ordenConfirmada->estado_orden}}</span>
                    </li>
                    <li>
                        <p>Estado Pago</p><span>: {{$ordenConfirmada->estado_pago}}</span>
                    </li>
                    <li>
                        <p>Tipo Pago</p><span>: {{$ordenConfirmada->tipo_pago}}</span>
                    </li>
                    @if($ordenConfirmada->tipo_pago == "Link")
                    <li>
                        <p>Link de Pago</p><span>: {{$ordenConfirmada->link_pago}}</span>
                    </li>
                    @endif
                    </ul>
                </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                <div class="single_confirmation_details">
                    <h4>Datos de envío</h4>
                    <ul>
                    <li>
                        <p>Contacto</p><span>: {{$ordenConfirmada->nom_contacto}}</span>
                    </li>
                    <li>
                        <p>Email</p><span>: {{$ordenConfirmada->email_contacto}}</span>
                    </li>
                    <li>
                        <p>Teléfono</p><span>: {{$ordenConfirmada->telefono_contacto}}</span>
                    </li>
                    <li>
                        <p>Whatsapp</p><span>: {{$ordenConfirmada->whatsapp_contacto}}</span>
                    </li>
                    <li>
                        <p>Pais</p><span>: {{$ordenConfirmada->pais}}</span>
                    </li>
                    <li>
                        <p>Departamento</p><span>: {{$ordenConfirmada->departamento}}</span>
                    </li>
                    <li>
                        <p>Municipio</p><span>: {{$ordenConfirmada->municipio}}</span>
                    </li>
                    <li>
                        <p>Dirección</p><span>: {{$ordenConfirmada->direccion}}</span>
                    </li>
                    <li>
                        <p>Comentarios</p><span>: {{$ordenConfirmada->comentarios}}</span>
                    </li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="order_details_iner">
                    <h3>Detalles de Orden</h3>
                    <table class="table table-borderless">
                    <thead>
                        <tr>
                        <th scope="col" colspan="2">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Sub-Total</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php
                                $nomEmpresa=DB::table('users')
                                ->where('idempresa','=',$ordenConfirmada->idempresa)
                                ->where('principal','=','SI')
                                ->get();
                                $detalles=DB::table('orden_detalle as d')
                                ->join('articulo as a','d.idarticulo','=','a.idarticulo')
                                ->join('categoria as c','a.idcategoria','=','c.idcategoria')
								->select('d.idorden_detalle','d.idorden','d.idarticulo','a.nombre as articulo','c.nombre as categoria','a.codigo','d.cantidad','d.precio','d.estado','d.condicion')
                                ->where('d.condicion','=','1')
                                ->where('d.idorden','=',$ordenConfirmada->idorden)
                                ->get();
                            ?>
                            @foreach($detalles as $detalle)
                                <?php
                                    //datos de configuracion
                                    $datosConfig=DB::table('users')->first();
                                    //Contar numero de articulos diferentes
                                    $artDiferentes=$detalles->count();

                                    $imagen=DB::table('articulo')
                                    ->where('idarticulo','=',$detalle->idarticulo)
                                    ->get();
                                ?>
                                <tr>
                                    <th colspan="2">
                                        @foreach($imagen as $img)
                                            @if($img->imagen != null)
                                                <a href="{{URL::action('InicioController@show',$img->idarticulo)}}">
                                                    <img src="{{asset('imagenes/articulos/'.$img->imagen)}}" alt="$img->nombre" width=100 >
                                                </a>
                                                <span>{{$detalle->articulo}} - {{$detalle->codigo}} - {{$detalle->categoria}} </span>
                                                
                                            @endif
                                            @if($img->imagen == NULL)
                                                <a href="{{URL::action('InicioController@show',$img->idarticulo)}}">
                                                    <img src="{{asset('imagenes/noimage.png')}}" alt="$img->nombre" width=100 >
                                                </a>
                                                <span>{{$detalle->articulo}} - {{$detalle->codigo}} - {{$detalle->categoria}} </span>
                                                
                                            @endif
                                        @endforeach
                                    </th>
                                    <th>x{{$detalle->cantidad}}</th>
                                    <th> <span>{{ Auth::user()->moneda }}{{ number_format($detalle->precio,2, '.', ',')}}</span></th>
                                    <th> <span>{{ $datosConfig->moneda }}{{number_format(($detalle->precio*$detalle->cantidad),2, '.', ',')}}</span></th>
                                </tr>
                            @endforeach
                            <!--<tr>
                                <th colspan="3">shipping</th>
                                <th><span>Envio: {{ $datosConfig->moneda }}{{ number_format($ordenConfirmada->envio,2, '.', ',')}}</span></th>
                            </tr>-->
                        </tbody>
                        
                        <tfoot>
                            <tr>
                            <th scope="col" colspan="3"></th>
                            <th scope="col">Envio {{ $datosConfig->moneda }}{{ number_format($ordenConfirmada->envio,2, '.', ',')}}</th>
                            </tr>
                        </tfoot>
                        <tfoot>
                            <tr>
                            <th scope="col" colspan="3"></th>
                            <th scope="col">Total {{ $datosConfig->moneda }}{{ number_format($ordenConfirmada->total,2, '.', ',')}}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>
  <!--================ confirmation part end =================-->


@endsection