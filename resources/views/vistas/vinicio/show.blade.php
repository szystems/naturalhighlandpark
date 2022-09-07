@extends('layouts.app')
@section('content')

<!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bgart">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Producto</h2>
              <p>Inicio <span>-</span> {{$articulo->categoria}} <span>-</span> {{$articulo->nombre}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding">
    <div class="container">
        
            <div class="row s_product_inner justify-content-between">
                
                <div class="col-lg-7 col-xl-7">
                    <div class="product_slider_img">
                        <div id="vertical">
                            @if($articulo->imagen != null)
                                <div data-thumb="{{asset('imagenes/articulos/'.$articulo->imagen)}}">
                                    <img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" />
                                </div>
                            @else
                                <div data-thumb="{{asset('imagenes/noimage.png')}}">
                                    <img src="{{asset('imagenes/noimage.png')}}" />
                                </div>
                            @endif
                            @if($imagenesArticulo->count() != 0)
                                @foreach($imagenesArticulo as $imgArt)
                                    <div data-thumb="{{asset('imagenes/articulos/'.$imgArt->imagen)}}">
                                        <img src="{{asset('imagenes/articulos/'.$imgArt->imagen)}}" />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                
                
                <div class="col-lg-5 col-xl-4">
                
                    <div class="s_product_text">
                        <h3>{{$articulo->nombre}}</h3>

                        
                            <?php
								$datosConfig=DB::table('users')->first();
                            ?>
                                @if($articulo->oferta_activar == "SI")
							<?php
                                $preciooferta = 0;
                                $preciooferta = ($articulo->ultimo_precio_venta * $articulo->ultimo_precio_oferta / 100);
                            ?>
                                <strike>{{ $datosConfig->moneda }}{{number_format($articulo->ultimo_precio_venta,2, '.', ',')}}</strike><br> <font color="green"><h2>{{ $datosConfig->moneda }}{{ number_format($articulo->ultimo_precio_venta - $preciooferta,2, '.', ',')}}</h2> </font>
                                @elseif($articulo->oferta_activar == "NO")
                                <h2>{{ $datosConfig->moneda }}{{number_format($articulo->ultimo_precio_venta,2, '.', ',')}}</h2>
								@endif
                        
                        <ul class="list">
                            @if($articulo->codigo != null)
                            <li>
                                <span>Codigo:</span> {{$articulo->codigo}}
                            </li>
                            @endif
                            @if($articulo->categoria != null)
                            <li>
                                {!! Form::open(array('url'=>'vistas/vinicio','class'=>'d-flex justify-content-between search-inner','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                                    <input type="hidden" name="searchText" id="search" value="">
                                    <input type="hidden" name="querydesde" value="0">
                                    <input type="hidden" name="queryhasta" value="99999">
                                    <input type="hidden" name="searchempresa" value="">
                                    <input type="hidden" name="searchcategoria" value="{{$articulo->idcategoria}}">
                                    <input type="hidden" name="searchoferta" value="">
                                    <input type="hidden" name="searchpor" value="a.idarticulo">
                                    <input type="hidden" name="searchorden" value="asc">
                                    <a  onclick="this.closest('form').submit();return false;"><span>Categoria:</span> {{$articulo->categoria}}</a>
                                    
                                {{Form::close()}}
                                
                            </li>
                            @endif
                            @if($articulo->stock > 5)
                            <li>
                                <span>Stock:</span> 5+
                            </li>
                            @elseif($articulo->stock < 6 and $articulo->stock > 0)
                            <li>
                                <span>Stock:</span> {{$articulo->stock}}
                            </li>
                            @elseif($articulo->stock <= 0)
                            <li>
                                <span>Stock:</span> Preguntar
                            </li>
                            @endif
                            
                        </ul>
                        @if($articulo->descripcion != null)
                        <p>
                            {{$articulo->descripcion}}
                        </p>
                        @endif
                        
                        @if (Auth::guest())
                            {{Form::open(array
                                (
                                    'action' => 'CarritoSessionController@add',
                                    'method' => 'POST',
                                    'role' => 'cart clearfix',
                                ))
                            }}
                            {{ csrf_field() }}
                                <div class="card_area d-flex justify-content-between align-items-center">
                                    <div class="product_count">
                                        <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                                        <input class="input-number" type="text" name="cantidad" value="1" min="0" max="10000">
                                        <span class="number-increment"> <i class="ti-plus"></i></span>
                                    </div>
                                    <button onclick="this.closest('form').submit();return false;" class="btn_3">Agregar</button>
                                        
                                        <input type="hidden" name="idarticulo" value="{{$articulo->idarticulo}}">
                                        <input type="hidden" name="articulo" value="{{$articulo->nombre}}">
                                        @if($articulo->oferta_activar == "SI")
                                            <input type="hidden" name="precio" class="form-control" value="{{$articulo->ultimo_precio_venta - $preciooferta}}">
                                        @elseif($articulo->oferta_activar == "NO")
                                            <input type="hidden" name="precio" class="form-control" value="{{$articulo->ultimo_precio_venta}}">
                                        @endif
                                </div>
                            {!!Form::close()!!}
                        @else
                            {!!Form::open(array('url'=>'vistas/vcarrito','method'=>'POST','autocomplete'=>'off'))!!}
                            {{Form::token()}}
                                <div class="card_area d-flex justify-content-between align-items-center">
                                    <div class="product_count">
                                        <span class="inumber-decrement"> <i class="ti-minus"></i></span>
                                        <input class="input-number" type="text" name="pcantidad" value="1" min="0" max="10000">
                                        <span class="number-increment"> <i class="ti-plus"></i></span>
                                    </div>
                                    <button onclick="this.closest('form').submit();return false;" class="btn_3">Agregar</button>
                                        
                                        <input type="hidden" name="tipoEdit" class="form-control" value="agregar">
                                        <input type="hidden" name="pidart" class="form-control" value="{{$articulo->idarticulo}}">
                                        <input type="hidden" name="pidempresa" class="form-control" value="{{Auth::user()->idempresa}}">
                                        <input type="hidden" name="articulo" value="{{$articulo->nombre}}">
                                        <input type="hidden" name="ppreciocompra" class="form-control" value="{{$articulo->ultimo_precio_compra}}">
                                        @if($articulo->oferta_activar == "SI")
                                            <input type="hidden" name="precio" class="form-control" value="{{$articulo->ultimo_precio_venta - $preciooferta}}">
                                        @elseif($articulo->oferta_activar == "NO")
                                            <input type="hidden" name="precio" class="form-control" value="{{$articulo->ultimo_precio_venta}}">
                                        @endif
                                </div>
                            {{Form::close()}}
                        @endif
                        
                    </div>
                </div>
            </div>
        
    </div>
  </div>
  <!--================End Single Product Area =================-->

  
@endsection