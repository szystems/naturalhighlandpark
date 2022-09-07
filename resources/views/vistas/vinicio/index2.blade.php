@extends('layouts.app')
@section('content')
		<div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50" >
                <!-- Widget Title -->
                <h6 class="widget-title mb-30"><i class="glyphicon glyphicon-th"></i><u><strong> Categorías</strong></u></h6>
                <?php
                    $categorias=DB::table('categoria')
                        ->where('condicion','=','1')
                        ->orderBy('nombre','asc')
                        ->get();
                ?>
                <!--  Catagories  -->
                <div class="">
                    <ul>
                            <li>
                                {!! Form::open(array('url'=>'vistas/vinicio','class'=>'d-flex justify-content-between search-inner','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                                    <input type="hidden" name="searchText" id="search" value="">
                                    <input type="hidden" name="querydesde" value="0">
                                    <input type="hidden" name="queryhasta" value="99999">
                                    <input type="hidden" name="searchempresa" value="">
                                    <input type="hidden" name="searchcategoria" value="">
                                    <input type="hidden" name="searchoferta" value="SI">
                                    <input type="hidden" name="searchpor" value="a.idarticulo">
                                    <input type="hidden" name="searchorden" value="asc">
                                    <button  type="submit" class="btn btn-link"><h5><font color="orange"><i class="glyphicon glyphicon-plus"></i></font> <strong>Ofertas</strong></h5></button>
                                
                                {{Form::close()}}
                            </li>
                        @foreach($categorias as $cat)
                            <li >
                                {!! Form::open(array('url'=>'vistas/vinicio','class'=>'d-flex justify-content-between search-inner','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                                    <input type="hidden" name="searchText" id="search" value="">
                                    <input type="hidden" name="querydesde" value="0">
                                    <input type="hidden" name="queryhasta" value="99999">
                                    <input type="hidden" name="searchempresa" value="">
                                    <input type="hidden" name="searchcategoria" value="{{$cat->idcategoria}}">
                                    <input type="hidden" name="searchoferta" value="">
                                    <input type="hidden" name="searchpor" value="a.idarticulo">
                                    <input type="hidden" name="searchorden" value="asc">
                                    <button  type="submit" class="btn btn-link"><h5><font color="orange"><i class="glyphicon glyphicon-plus"></i></font> {{$cat->nombre}}</h5></button>
                                
                                {{Form::close()}}
                            </li>
                            
                        @endforeach
                    </ul>
                </div><br id="busquedaavanzada">

                <h6 class="widget-title mb-30"><u><strong><img src="{{asset('elmana/img/core-img/search.png')}}" alt="" > Buscar</strong></u></h6>
                {!! Form::open(array('url'=>'vistas/vinicio','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                    <p>Categorias</p>
                        <div class="sort-by-date d-flex align-items-center ">
                        <!--<p>Sort by</p>-->
                        <select name="searchcategoria" class="form-control  input-xs ">
                            <option value="" selected >Todas</option>
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
                    </div>
                    <br>
                    <p>Ofertas</p>
                    <div class="sort-by-date d-flex align-items-center ">
                        <!--<p>Sort by</p>-->
                        <select name="searchoferta" class="form-control  input-xs ">
                            <option value="" selected>Todos</option>
                            <option value="SI">Solo Ofertas</option>
                        </select>
                    </div>
                    <br>
                    <p>Orden</p>
                    <div class="sort-by-date d-flex align-items-center ">
                        <!--<p>Sort by</p>-->
                        <select name="searchpor" class="form-control  input-xs ">
                            <option value="a.idarticulo" selected>Ultimos</option>
                            <option value="a.ultimo_precio_venta">Precio</option>
                            <option value="a.ultimo_precio_oferta">Precio Oferta</option>
                            <option value="a.nombre">Nombre</option>
                        </select>
                    </div>
                    <br>
                    <div class="sort-by-date d-flex align-items-center ">
                        <!--<p>Sort by</p>-->
                        <select name="searchorden" class="form-control  input-xs ">>
                            <option value="asc" selected>Ascendente</option>
                            <option value="desc">Descendente</option>
                        </select>
                    </div>
                    <br>
                    <div class="sort-by-date d-flex align-items-center">
                        <button type="submit" class="btn btn-dark btn-block"><img src="{{asset('elmana/img/core-img/search.png')}}" alt=""> Buscar</button>
                    </div>
                {{Form::close()}}
                <!--<div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                        <a data-toggle="collapse" id="busquedaavanzada" data-parent="#accordion" href="#collapse1"><img src="{{asset('elmana/img/core-img/search.png')}}" alt="" > <strong><u>Busqueda</u></strong></a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            {!! Form::open(array('url'=>'vistas/vinicio','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                                <p>Categorias</p>
                                <div class="sort-by-date d-flex align-items-center ">
                                    <select name="searchcategoria" class="small">
                                        <option value="" selected >Todas</option>
                                        
                                        @foreach($categorias as $cat)
                                            <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <p>Ofertas</p>
                                <div class="sort-by-date d-flex align-items-center ">
                                    <select name="searchoferta" class="small">
                                        <option value="" selected>Todos</option>
                                        <option value="SI">Solo Ofertas</option>
                                    </select>
                                </div>
                                <br>
                                <p>Orden</p>
                                <div class="sort-by-date d-flex align-items-center ">
                                    <select name="searchpor" class="small">
                                        <option value="a.idarticulo" selected>Ultimos</option>
                                        <option value="a.ultimo_precio_venta">Precio</option>
                                        <option value="a.ultimo_precio_oferta">Precio Oferta</option>
                                        <option value="a.nombre">Nombre</option>
                                    </select>
                                </div>
                                <br>
                                <div class="sort-by-date d-flex align-items-center ">
                                    <select name="searchorden" class="small">>
                                        <option value="asc" selected>Ascendente</option>
                                        <option value="desc">Descendente</option>
                                    </select>
                                </div>
                                <br>
                                <div class="sort-by-date d-flex align-items-center">
                                    <button type="submit" class="btn btn-dark"><img src="{{asset('elmana/img/core-img/search.png')}}" alt=""> Buscar</button>
                                </div>
                            {{Form::close()}}
                        </div>
                    </div>
                    </div>
                </div>-->

                

                
            
                
            </div>

            
        </div>

        <div class="amado_product_area section-padding-100">
            
            <div class="container-fluid">
                                
                <div class="row">
                    
                    <div class="col-12">

                    <div class="container col-12">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <!--<ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                        </ol>-->

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">

                                        <div class="item active">
                                            {!! Form::open(array('url'=>'vistas/vinicio','class'=>'d-flex justify-content-between search-inner','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                                            <input type="hidden" name="searchText" id="search" value="">
                                            <input type="hidden" name="querydesde" value="0">
                                            <input type="hidden" name="queryhasta" value="99999">
                                            <input type="hidden" name="searchempresa" value="">
                                            <input type="hidden" name="searchcategoria" value="">
                                            <input type="hidden" name="searchoferta" value="">
                                            <input type="hidden" name="searchpor" value="a.idarticulo">
                                            <input type="hidden" name="searchorden" value="asc">
                                            <a  onclick="this.closest('form').submit();return false;"><u><img src="{{asset('imagenes/banner/1.png')}}" style="width:100%;" ></u></a>
                                            {{Form::close()}}
                                            
                                            <div class="carousel-caption">
                                            </div>
                                        </div>

                                        <div class="item">
                                            {!! Form::open(array('url'=>'vistas/vinicio','class'=>'d-flex justify-content-between search-inner','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                                            <input type="hidden" name="searchText" id="search" value="">
                                            <input type="hidden" name="querydesde" value="0">
                                            <input type="hidden" name="queryhasta" value="99999">
                                            <input type="hidden" name="searchempresa" value="">
                                            <input type="hidden" name="searchcategoria" value="">
                                            <input type="hidden" name="searchoferta" value="SI">
                                            <input type="hidden" name="searchpor" value="a.idarticulo">
                                            <input type="hidden" name="searchorden" value="asc">
                                            <a  onclick="this.closest('form').submit();return false;"><img src="{{asset('imagenes/banner/2.png')}}" style="width:100%;"></a>
                                            {{Form::close()}}
                                            
                                            <div class="carousel-caption">
                                            </div>
                                        </div>
                                        
                                        <div class="item">
                                            {!! Form::open(array('url'=>'vistas/vinicio','class'=>'d-flex justify-content-between search-inner','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                                            <input type="hidden" name="searchText" id="search" value="">
                                            <input type="hidden" name="querydesde" value="0">
                                            <input type="hidden" name="queryhasta" value="99999">
                                            <input type="hidden" name="searchempresa" value="">
                                            <input type="hidden" name="searchcategoria" value="">
                                            <input type="hidden" name="searchoferta" value="SI">
                                            <input type="hidden" name="searchpor" value="a.idarticulo">
                                            <input type="hidden" name="searchorden" value="asc">
                                            <a  onclick="this.closest('form').submit();return false;"><img src="{{asset('imagenes/banner/3.png')}}" style="width:100%;"></a>
                                            {{Form::close()}}
                                            
                                            <div class="carousel-caption">
                                            </div>
                                        </div>
                                    
                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                

                                
                                
                                
                                
                                
                                <!--<h3><strong><u>Productos</u></strong></h3>-->
                                <div class="view d-flex">
                                    <!--<a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>-->
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
                                    
                                    <div class="single_product_menu d-flex">
                                        <h5>
                                            Filtros:  
                                        </h5>
                                    </div>
                                    
                                    @if($searchText != null)
                                    <div class="single_product_menu d-flex">
                                        <h6>
                                            <span class="badge badge-info">{{$searchText}}</span>
                                        </h6>
                                    </div>
                                    @endif
                                    @if($filtrocategoria->count() != 0)
                                    <div class="single_product_menu d-flex">
                                        <h6>
                                            @foreach($filtrocategoria as $fc)
                                                <span class="badge badge-info">{{$fc->nombre}}</span>
                                            @endforeach
                                        </h6>
                                    </div>
                                    @endif
                                    @if($queryoferta != null)
                                    <div class="single_product_menu d-flex">
                                        <h6>
                                            @if($queryoferta == "SI")
                                            <span class="badge badge-info">Solo Ofertas</span>
                                            @elseif($queryoferta == "NO")
                                            <span class="badge badge-info">Sin Ofertas</span>
                                            @endif
                                        </h6>
                                    </div>
                                    @endif
                                    <div class="single_product_menu d-flex">
                                        <h6>
                                            @if($querypor == "a.idarticulo")
                                            <span class="badge badge-info">Ultimos agregados</span>
                                            @elseif($querypor == "a.ultimo_precio_venta")
                                            <span class="badge badge-info">Precio Normal</span>
                                            @elseif($querypor == "a.ultimo_precio_oferta")
                                            <span class="badge badge-info">Precio Oferta</span>
                                            @elseif($querypor == "c.nombre")
                                            <span class="badge badge-info">Nombre</span>
                                            @endif 
                                        </h6>
                                    </div>
                                    <div class="single_product_menu d-flex">
                                        <h6>
                                            @if($queryorden == "asc")
                                            <span class="badge badge-info">Ascendente</span>
                                            @elseif($queryorden == "desc")
                                            <span class="badge badge-info">Descendente</span>
                                            @endif
                                        </h6>
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
                            <!-- Sorting -->
                            <!--<div class="product-sorting d-flex">
                                <div class="sort-by-date d-flex align-items-center mr-15">
                                    <p>Sort by</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortBydate">
                                            <option value="value">Date</option>
                                            <option value="value">Newest</option>
                                            <option value="value">Popular</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="view-product d-flex align-items-center">
                                    <p>View</p>
                                    <form action="#" method="get">
                                        <select name="select" id="viewProduct">
                                            <option value="value">12</option>
                                            <option value="value">24</option>
                                            <option value="value">48</option>
                                            <option value="value">96</option>
                                        </select>
                                    </form>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($articulos as $art)
                    <?php
                        $datosConfig=DB::table('users')->first();
                    ?>
                    <!-- Single Product Area -->
                    <div class="col-6 col-sm-5 col-md-6 col-xl-3">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <div style="height: 200px;width: auto;" align="center">
                                <a href="{{URL::action('InicioController@show',$art->idarticulo)}}"><h6><strong><u>{{substr($art->nombre, 0, 30)}}</u></strong></h6></a>
                                @if($art->imagen != null)
                                    <a href="{{URL::action('InicioController@show',$art->idarticulo)}}"><img src="{{asset('imagenes/articulos/'.$art->imagen)}}" alt="" class="img-thumbnail img-responsive" style="display:block;width: auto;max-height: 100%;"></a>
								@endif
                                @if($art->imagen == NULL)
                                    <a href="{{URL::action('InicioController@show',$art->idarticulo)}}"><img src="{{asset('imagenes/noimage.png')}}" alt="" class="img-thumbnail img-responsive" style="display:block;width: auto;max-height: 100%;"></a>
                                @endif
                                </div>
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                        <?php
                                            $preciooferta = 0;
                                            $preciooferta = ($art->ultimo_precio_venta * $art->ultimo_precio_oferta / 100);
                                        ?>
                                        @if (Auth::guest())
                                            {{Form::open(array
                                                (
                                                    'action' => 'CarritoSessionController@add',
                                                    'method' => 'POST',
                                                    'role' => 'form'
                                                ))
                                            }}
                                            {{ csrf_field() }}

                                                <div class="col-xs-6" align="right">
                                                    <div class="input-group">
                                                        <input id="cantidad" type="number" class="form-control" name="cantidad" value="1" class="form-control btn-sm">
                                                    </div>
                                                    <input type="hidden" name="idarticulo" value="{{$art->idarticulo}}">
                                                    <input type="hidden" name="articulo" value="{{$art->nombre}}">
                                                    @if($art->oferta_activar == "SI")
                                                        <input type="hidden" name="precio" value="{{$art->ultimo_precio_venta - $preciooferta}}">
                                                    @elseif($art->oferta_activar == "NO")
                                                        <input type="hidden" name="precio" value="{{$art->ultimo_precio_venta}}">
                                                    @endif
                                                </div>
                                                <div class="col-xs-6" align="left">
                                                    <button type="submit" class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Añadir"><i class="glyphicon glyphicon-plus"></i>  <img src="{{asset('elmana/img/core-img/cart.png')}}" alt=""></button>
                                                </div></br></br>
                                            {{Form::close()}}
                                        @else
                                            {!!Form::open(array('url'=>'vistas/vcarrito','method'=>'POST','autocomplete'=>'off'))!!}
                                            {{Form::token()}}

                                                <div class="col-xs-6" align="right">
                                                    <div class="input-group">
                                                        <input id="pcantidad" type="number" class="form-control" name="pcantidad" value="1" class="form-control btn-sm">
                                                    </div>
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

                                                </div>
                                                <div class="col-xs-6" align="left">
                                                    <button type="submit" class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="left" title="Añadir"><i class="glyphicon glyphicon-plus"></i>  <img src="{{asset('elmana/img/core-img/cart.png')}}" alt=""></button>
                                                </div></br></br>
                                            {{Form::close()}}
                                        @endif
                                        @if($art->oferta_activar == "SI")
                                            <font color="blue"><strong><p class="product-price">{{ $datosConfig->moneda }}{{ number_format($art->ultimo_precio_venta - $preciooferta,2, '.', ',')}}</p></strong></font>
                                            <h5><font color="red"><strike>{{ $datosConfig->moneda }}{{number_format($art->ultimo_precio_venta,2, '.', ',')}}</strike></font></h5>
                                        @elseif($art->oferta_activar == "NO")
                                            <font color="blue"><strong> <p class="product-price">{{ $datosConfig->moneda }}{{number_format($art->ultimo_precio_venta,2, '.', ',')}}</p></strong></font>
                                        @endif
                                        <h6>
                                            {!! Form::open(array('url'=>'vistas/vinicio','class'=>'d-flex justify-content-between search-inner','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                                            <input type="hidden" name="searchText" id="search" value="">
                                            <input type="hidden" name="querydesde" value="0">
                                            <input type="hidden" name="queryhasta" value="99999">
                                            <input type="hidden" name="searchempresa" value="">
                                            <input type="hidden" name="searchcategoria" value="{{$art->idcategoria}}">
                                            <input type="hidden" name="searchoferta" value="">
                                            <input type="hidden" name="searchpor" value="a.idarticulo">
                                            <input type="hidden" name="searchorden" value="asc">
                                            <a  onclick="this.closest('form').submit();return false;"><u>{{$art->categoria}}</u></a>
                                
                                            {{Form::close()}}
                                        </h6>
                                        <h6><strong>Codigo:</strong> <font color="Blue">{{$art->codigo}}</font></h6>
                                        @if($art->stock > 5)
                                            <h6><strong>Stock: <font color="Green">5+</font></strong></h6>
                                        @elseif($art->stock < 6 and $art->stock > 0)
                                            <h6><strong>Stock: <font color="Green">{{$art->stock}}</font></strong></h6>
                                        @elseif($art->stock <= 0)
                                            <h6><strong>Stock:</strong> <font color="Orange">Preguntar</font></h6>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

               <!--<button>{{ $articulos->links() }}</button>-->
               <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if ($articulos->onFirstPage())
                        <li class="disabled"><span><h5>&laquo; Anterior |</h5></span></li>
                    @else
                        <li><a href="{{ $articulos->previousPageUrl() }}" rel="prev"><h5>&laquo; <font color="orange"><u>Anterior</u></font> |</h5></a></li>
                    @endif

                    <!-- Pagination Elements -->
                    @foreach ($articulos as $art)
                        <!-- "Three Dots" Separator -->
                        @if (is_string($art))
                            <li class="disabled"><span>{{ $art }}</span></li>
                        @endif

                        <!-- Array Of Links -->
                        @if (is_array($art))
                            @foreach ($art as $page => $url)
                                @if ($page == $articulos->currentPage())
                                    <li class="active"><span>{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($articulos->hasMorePages())
                        <li><a href="{{ $articulos->nextPageUrl() }}" rel="next"><h5>| <font color="orange"><u>Siguiente</u></font> &raquo;</h5></a></li>
                    @else
                        <li class="disabled"><span><h5>| Siguiente &raquo;</h5></span></li>
                    @endif
                </ul>
            </div>
        </div>
	
   
@endsection