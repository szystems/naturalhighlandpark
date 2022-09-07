@extends ('layouts.admin')
@section ('contenido')
@include('almacen.articulo.modaleliminarshow')


<div>
      <div class="card mb-4">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Articulo: {{$articulo->nombre}}</strong></h2>
                  
            </header>
            <div class="card-body">
                <a href="{{URL::action('ArticuloController@edit',$articulo->idarticulo)}}">
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Articulo">
                        <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button"><i class="far fa-edit"></i> Editar</button>
                    </span>
                  </a>
								
				  <a href="" data-target="#modaleliminarshow-delete-{{$articulo->idarticulo}}" data-toggle="modal">
                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Articulo">
                        <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button"><i class="far fa-minus-square"></i> Eliminar</button>
                    </span>
				  </a>
                  <div class="row">
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="codigo"><strong>Código</strong></label>
                            <p>{{$articulo->codigo}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="nombre"><strong>Nombre</strong></label>
                            <p>{{$articulo->nombre}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="categoria"><strong>Categoria</strong></label>
                            <p>{{$articulo->categoria}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="descripcion"><strong>Descripción</strong></label>
                            <p>{{$articulo->descripcion}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="bodega"><strong>Bodega</strong></label>
                            <p>{{$articulo->bodega}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="ubicacion"><strong>Ubicación</strong></label>
                            <p>{{$articulo->ubicacion}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="stock"><strong>Stock</strong></label>
                            <p>{{$articulo->stock}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="ultimo_precio_compra"><strong>Ultimo Precio Compra</strong></label>
                            <p>{{ Auth::user()->moneda }}{{ number_format($articulo->ultimo_precio_compra,2, '.', ',')}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="ultimo_precio_venta"><strong>Ultimo Precio Venta</strong></label>
                            <p>{{ Auth::user()->moneda }}{{ number_format($articulo->ultimo_precio_venta,2, '.', ',')}}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="imagen"><strong>Imagen</strong></label>
                            <p><img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" alt="{{ $articulo->nombre}}" height="400px"  class="img-thumbnail"></p>
                        </div>
                    </div>
                  </div>
            </div>
			@include('almacen.articulo.modaleliminarshow')
                
                        
              

            <footer class="card-footer">
                  

        
            </footer>
      </div>
</div>
   
@endsection