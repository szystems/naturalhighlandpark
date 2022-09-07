@extends('layouts.app')
@section('content')
		<!-- banner start-->
        <!--<div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="banner_img d-lg-block">
                                {!! Form::open(array('url'=>'vistas/vinicio','class'=>'d-flex justify-content-between search-inner','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                                    <input type="hidden" name="searchText" id="search" value="">
                                    <input type="hidden" name="querydesde" value="0">
                                    <input type="hidden" name="queryhasta" value="99999">
                                    <input type="hidden" name="searchempresa" value="">
                                    <input type="hidden" name="searchcategoria" value="">
                                    <input type="hidden" name="searchoferta" value="">
                                    <input type="hidden" name="searchpor" value="a.idarticulo">
                                    <input type="hidden" name="searchorden" value="asc">
                                    <a onclick="this.closest('form').submit();return false;"><img src="{{asset('imagenes/banner/1.png')}}" alt="" style="width:100%;"></a>
                                    
                                {{Form::close()}}
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="banner_img d-lg-block">
                                {!! Form::open(array('url'=>'vistas/vinicio','class'=>'d-flex justify-content-between search-inner','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                                    <input type="hidden" name="searchText" id="search" value="">
                                    <input type="hidden" name="querydesde" value="0">
                                    <input type="hidden" name="queryhasta" value="99999">
                                    <input type="hidden" name="searchempresa" value="">
                                    <input type="hidden" name="searchcategoria" value="">
                                    <input type="hidden" name="searchoferta" value="SI">
                                    <input type="hidden" name="searchpor" value="a.idarticulo">
                                    <input type="hidden" name="searchorden" value="asc">
                                    <a onclick="this.closest('form').submit();return false;"><img src="{{asset('imagenes/banner/2.png')}}" alt="" style="width:100%;"></a>
                                {{Form::close()}}
                                    
                                </div>
                            </div>
                        </div>
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="banner_img d-lg-block">
                                {!! Form::open(array('url'=>'vistas/vinicio','class'=>'d-flex justify-content-between search-inner','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                                    <input type="hidden" name="searchText" id="search" value="">
                                    <input type="hidden" name="querydesde" value="0">
                                    <input type="hidden" name="queryhasta" value="99999">
                                    <input type="hidden" name="searchempresa" value="">
                                    <input type="hidden" name="searchcategoria" value="">
                                    <input type="hidden" name="searchoferta" value="SI">
                                    <input type="hidden" name="searchpor" value="a.idarticulo">
                                    <input type="hidden" name="searchorden" value="asc">
                                    <a onclick="this.closest('form').submit();return false;""><img src="{{asset('imagenes/banner/3.png')}}" alt="" style="width:100%;"></a>
                                {{Form::close()}}
                                    
                                </div>
                            </div>
                        </div>-->
                        <!--<div class="single_banner_slider">
                            <div class="row">
                                <div class="banner_img d-lg-block">
                                    <a href="{{ url('/vistas/vquienessomos#section4') }}"><img src="{{asset('comfortdreams/img/imagenes/SLIDES/04.png')}}" alt="" style="width:100%;"></a>
                                </div>
                            </div>
                        </div>-->
                        
                        
                <!--</div>
            </div>
        </div>-->
        <!-- banner start-->

	<!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="section_tittle text-left">
                <h2>Buscar Productos</h2>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
								<h3>Busqueda Avanzada</h3>
								<h4>Filtrar:</h4>
                            </div>
                            <div class="widgets_inner">
                            {!! Form::open(array('url'=>'vistas/vinicio','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                                <ul class="list">
									<li>
										Categoria:
									</li>
									<li>
                                        <select name="searchcategoria" class="form-select">
											<option value="" selected> todas</option>
											<?php
												$categorias=DB::table('categoria')
												->where('condicion','=','1')
												->orderBy('nombre','asc')
												->get();
											?>
											@foreach($categorias as $cat)
												<option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
											@endforeach
										</select>
									</li>
                                    
									<li>
										Ofertas:
									</li>
                                    <li>
                                        <select name="searchoferta" class="form-select" >
											<option value="" selected>Todos</option>
											<option value="SI">Solo Ofertas</option>
										</select>
									</li>
									<li>
										Ordenar por:
									</li>
                                    <li>
                                        <select name="searchpor" class="form-select" >
											<option value="a.idarticulo" selected>Ultimos</option>
											<option value="a.ultimo_precio_venta">Precio</option>
											<option value="a.ultimo_precio_oferta">Precio Oferta</option>
											<option value="a.nombre">Nombre</option>
										</select>
                                    </li>
                                    <li>
                                        <select name="searchorden" class="form-select" id="default-select">
											<option value="asc" selected>Ascendente</option>
											<option value="desc">Descendente</option>
										</select>
									</li>
									<li>
										<button type="submit" class="genric-btn info circle">
											<i class="fas fa-search"></i> Buscar
										</button>
									</li>
								</ul>
								{{Form::close()}}
                            </div>
						</aside>
						
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product_top_bar d-flex justify-content-between align-items-center">
                                
								
								<?php
                                        if(!isset($querycategoria))
                                        {
                                            $querycategoria = null;
                                        }
                                        if(!isset($searchText))
                                        {
                                            $searchText = null;
                                        }
                                        if(!isset($queryoferta))
                                        {
                                            $queryoferta = null;
                                        }
                                        if(!isset($querypor))
                                        {
                                            $querypor = null;
                                        }
                                        if(!isset($queryorden))
                                        {
                                            $queryorden = null;
                                        }
                                        if(!isset($query))
                                        {
                                            $query = null;
                                        }
                                        if(!isset($filtrocategoria))
                                        {
                                        $filtrocategoria=DB::table('categoria')
                                            ->where('idcategoria','=',$querycategoria)
                                            ->get();
                                        }
                                        if(!isset($articulos))
                                        {
                                            $articulos=DB::table('articulo as a')
                                            ->join('categoria as c','a.idcategoria','=','c.idcategoria')
                                            ->select('a.idarticulo','c.nombre as categoria','c.idcategoria as idcategoria','a.codigo','a.nombre','a.stock','a.bodega','a.ubicacion','a.descripcion','a.imagen','a.estado','a.ultimo_precio_compra','a.ultimo_precio_venta','a.ultimo_precio_oferta','a.oferta_activar')
                                            ->where('a.estado','=','Activo')
                                            ->where('a.activar_tienda','=','Activado')
                                            ->orderBy('a.idarticulo','a.ultimo_precio_venta','asc')
                                            ->simplePaginate(24);
                                        }

                                ?>

								<div class="single_product_menu">
                                    <p><span>{{$articulos->count()}} </span> Productos encontrados</p>
								</div>

								<div class="single_product_menu d-flex">
									<h5>
										Filtros: 
									</h5>
								</div>
								@if($searchText != null)
                                <div class="single_product_menu d-flex">
                                    <h5>'{{$searchText}}'</h5>
								</div>
								@endif
								@if($filtrocategoria->count() != 0)
                               <div class="single_product_menu d-flex">
									<h5>
										@foreach($filtrocategoria as $fc)
											'{{$fc->nombre}}'
										@endforeach
									</h5>
								</div>
								@endif
								@if($queryoferta != null)
								<div class="single_product_menu d-flex">
									<h5>
										@if($queryoferta == "SI")
										'Solo Ofertas'
										@elseif($queryoferta == "NO")
										'Sin Ofertas'
										@endif
									</h5>
								</div>
								@endif
								<div class="single_product_menu d-flex">
									<h5>
										@if($querypor == "a.idarticulo")
										'Ultimos agregados'
										@elseif($querypor == "a.ultimo_precio_venta")
										'Precio Normal'
										@elseif($querypor == "a.a.ultimo_precio_oferta")
										'Precio Oferta'
										@elseif($querypor == "c.nombre")
										'Nombre'
										@endif 
									</h5>
								</div>
								<div class="single_product_menu d-flex">
									<h5>
										@if($queryorden == "asc")
										'Ascendente'
										@elseif($queryorden == "desc")
										'Descendente'
										@endif
									</h5>
                                </div>
								
                            </div>
							{{Form::open(array('action' => 'ReportesController@reportearticuloscliente','method' => 'POST','role' => 'form', 'target' => '_blank'))}}
                                {{Form::token()}}		
                                    <input type="hidden" name="rstock" value="">
                                    <input type="hidden" name="roferta" value="">
                                    <input type="hidden" name="pdf" value="Navegador">
                                    <a class="btn btn-outline-secondary btn-sm" href="{{ url('#busquedaavanzada') }}" role="button"><img src="{{asset('elmana/img/core-img/search.png')}}" alt=""> Busqueda y Categorias</a>
                                    <button class="btn btn-outline-danger" type="submit"><i class="glyphicon glyphicon-download-alt"></i> Catalogo</button>
                            {{Form::close()}}
                        </div>
						<div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if(Session::has('alert-' . $msg))
                                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                    @endif
                                @endforeach
                        </div> <!-- fin .flash-message -->
                    </div>

                    <div class="row align-items-center latest_product_inner">
						@foreach($articulos as $art)
                            <?php
                                $datosConfig=DB::table('users')->first();
                            ?>
							<div class="col-lg-4 col-sm-6">
								<div class="single_product_item">
									@if($art->imagen != NULL)
											<a href="{{URL::action('InicioController@show',$art->idarticulo)}}">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('imagenes/articulos/'.$art->imagen)}}" alt="" width=100% ></div>
											</a>
									@endif
									@if($art->imagen == NULL)
										<a href="{{URL::action('InicioController@show',$art->idarticulo)}}">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('imagenes/noimage.png')}}" alt="" width=100% ></div>
										</a>
									@endif
									<div class="single_product_text">
										<h4><!--<a href="{{URL::action('InicioController@show',$art->idarticulo)}}">-->{{substr($art->nombre, 0, 30)}}...<!--</a>--></h4>
										
                                        @if($art->categoria != null)
											{!! Form::open(array('url'=>'vistas/vinicio','class'=>'d-flex justify-content-between search-inner','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
												<input type="hidden" name="searchText" id="search" value="">
												<input type="hidden" name="querydesde" value="0">
												<input type="hidden" name="queryhasta" value="99999">
												<input type="hidden" name="searchempresa" value="">
												<input type="hidden" name="searchcategoria" value="{{$art->idcategoria}}">
												<input type="hidden" name="searchoferta" value="">
												<input type="hidden" name="searchpor" value="a.idarticulo">
												<input type="hidden" name="searchorden" value="asc">
												<!--<a  onclick="this.closest('form').submit();return false;"><u>-->Categoria: {{$art->categoria}}<!--</u></a>-->
												{{Form::close()}}
										@endif
										@if($art->codigo != null)Codigo: {{$art->codigo}}<br>@endif
										<h3>
											<?php
												$preciooferta = 0;
												$preciooferta = ($art->ultimo_precio_venta * $art->ultimo_precio_oferta / 100);
											?>
											@if($art->oferta_activar == "SI")
												<font color="blue"><strong>{{ $datosConfig->moneda }}{{number_format($art->ultimo_precio_venta - $preciooferta,2, '.', ',')}}</strong></font>
												<span><font color="red"><strike><h6>{{ $datosConfig->moneda }}{{number_format($art->ultimo_precio_venta,2, '.', ',')}}</h6></strike></font></span>
											@elseif($art->oferta_activar == "NO")
												<font color="blue"><strong>{{ $datosConfig->moneda }}{{number_format($art->ultimo_precio_venta,2, '.', ',')}}</strong></font>
											@endif
										</h3>
											@if (Auth::guest())
												{{Form::open(array
													(
														'action' => 'CarritoSessionController@add',
														'method' => 'POST',
														'role' => 'form'
													))
												}}
												{{ csrf_field() }}
                                                    Cantidad<input id="cantidad" name="cantidad" type="number" value="1" class="form-control" />
                                                    <a onclick="this.closest('form').submit();return false;" class="add_cart">+ Agregar<i class="	fa fa-cart-plus"></i></a>
                                                    
                                                        
													<input type="hidden" name="idarticulo" value="{{$art->idarticulo}}">
                                                    <input type="hidden" name="articulo" value="{{$art->nombre}}">
                                                    @if($art->oferta_activar == "SI")
                                                        <input type="hidden" name="precio" value="{{$art->ultimo_precio_venta - $preciooferta}}">
                                                    @elseif($art->oferta_activar == "NO")
                                                        <input type="hidden" name="precio" value="{{$art->ultimo_precio_venta}}">
                                                    @endif
                                                {!!Form::close()!!}
                                            @else
												{!!Form::open(array('url'=>'vistas/vcarrito','method'=>'POST','autocomplete'=>'off'))!!}
                                            	{{Form::token()}}
													Cantidad<input id="pcantidad" name="pcantidad" type="number" value="1" class="form-control" />
                                                    <a onclick="this.closest('form').submit();return false;" class="add_cart">+ Agregar<i class="	fa fa-cart-plus"></i></a>
                                                    <input type="hidden" name="tipoEdit" class="form-control" value="agregar">
                                                    <input type="hidden" name="pidart" class="form-control" value="{{$art->idarticulo}}">
                                                    <input type="hidden" name="pidempresa" class="form-control" value="{{Auth::user()->idempresa}}">
                                                    <input type="hidden" name="articulo" value="{{$art->nombre}}">
                                                    <input type="hidden" name="ppreciocompra" class="form-control" value="{{$art->ultimo_precio_compra}}">
                                                    @if($art->oferta_activar == "SI")
                                                        <input type="hidden" name="pprecio" value="{{$art->ultimo_precio_venta - $preciooferta}}">
                                                    @elseif($art->oferta_activar == "NO")
                                                        <input type="hidden" name="pprecio" value="{{$art->ultimo_precio_venta}}">
                                                    @endif
												{{Form::close()}}
                                            @endif
									</div>
								</div>
							</div>
						@endforeach
                        <div class="col-lg-12">
							<button class="genric-btn disable circle">{{$articulos->render()}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->
	
   
@endsection