@extends('layouts.app')
@section('content')
    <!-- Cabecera -->

	<!--<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" style="background-image:url({{asset('mall/images/cabecera.jpg')}})"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Ordenes de Compra</h2>
		</div>
	</div>-->
    <!-- Busqueda Menu -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<!--<div class="col-lg-2">-->

					<!-- Shop Sidebar -->
					<!--<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Cuenta</div>
							<ul class="sidebar_categories">
								<li><a href="{{URL::action('VistaUsuarioController@show',Auth::user()->id)}}">Perfil</a></li>
								<li><a href="{{ url('/vistas/vcarrito') }}">Carritos de Compra</a></li>
								<li style="background-color: gray;"><a href="{{ url('/vistas/vorden') }}">Ordenes de Compra</a></li>
								<li><a href="{{ url('/logout') }}">Cerrar Sesion</a></li>
							</ul>
						</div>
					</div>
				</div>-->

				<div class="col-lg-12">
					
					<!-- Contenido -->
                    <div class="card mb-4">
						<header class="card-header">
                            <h2 class="h3 card-header-title"><strong>Ordenes de Compras</strong></h2>      
                        </header>
                                        
                        <div class="card-body">
                            <div class="row">
								<div class="container">
									<!--<h2>Pendientes</>-->
									<div class="flash-message">
									@if($ordenes->count() == 0)
										@foreach (['danger', 'warning', 'success', 'info', 'light'] as $msg)
											@if(Session::has('alert-' . $msg))
												<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
											@endif
										@endforeach
									@endif
									<p><strong>Nota:</strong> Aquí veras todas las ordenes de compras, selecciona la orden de compra correspondiente. </p>
									<div class="panel-group" id="accordion">
										@foreach($ordenes as $orden)
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
												<?php
													$nomEmpresa=DB::table('users')
													->where('idempresa','=',$orden->idempresa)
													->where('principal','=','SI')
													->get();

													$detalles=DB::table('orden_detalle as d')
													->join('articulo as a','d.idarticulo','=','a.idarticulo')
													->join('categoria as c','a.idcategoria','=','c.idcategoria')
													->select('d.idorden_detalle','d.idorden','d.idarticulo','a.nombre as articulo','c.nombre as categoria','a.codigo','d.cantidad','d.precio','d.estado','d.condicion','a.oferta_activar','a.ultimo_precio_venta')
													->where('d.condicion','=','1')
													->where('d.idorden','=',$orden->idorden)
													->get();
												?>
													<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$orden->idorden}}">
														<span class="badge"><font color="white"><b><u>Abrir: </u></b></font></span>
													<!--@foreach($nomEmpresa as $nombreEmp)
														@if($nombreEmp->logo != NULL)
															<img src="{{asset('imagenes/logos/'.$nombreEmp->logo)}}" alt="" width=50 class="img-thumbnail">
														@else
														{{$nombreEmp->empresa}} 
														@endif
														
													@endforeach-->
													<font color="Black" size="1"><strong>Orden: </strong></font><font color="blue" size="1"><strong>{{$orden->codigo}}</strong>, </font><font color="Black" size="1"><strong>Total: </strong></font><font size="2" color="blue"><strong>{{ Auth::user()->moneda }}{{ number_format(($orden->total),2, '.', ',')}}, </strong></font><font color="black" size="1"><strong> Estado: </strong><strong><span class="badge badge-info"></font>@if($orden->estado_orden == "Pendiente")<font color="orange" size="1">{{$orden->estado_orden}} </font>@elseif($orden->estado_orden == "Procesado")<font color="Blue" size="1">{{$orden->estado_orden}} </font>@elseif($orden->estado_orden == "Finalizado")<font color="green" size="1">{{$orden->estado_orden}} </font>@endif</span></strong>
												</a>
												
												</h4>
											</div>
											<div id="collapse{{$orden->idorden}}" class="panel-collapse collapse">
												<div class="panel-body">

													
													<div class="cart_container">
														
															<a href="" data-target="" data-toggle="modal">
																<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Ver Detalles">
																	<a href="{{URL::action('VistaOrdenController@show',$orden->idorden)}}">
																		<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Ver Detalles">
																			<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
																				<i class="far fa-eye"></i> Ver Detalles
																			</button>
																		</span>
																	</a>
																</span>

															</a>
														<div class="cart_items">
															<ul class="cart_list">
																@foreach($detalles as $detalle)
																<li class="cart_item clearfix">
																
																	<?php
																		$imagen=DB::table('articulo')
																		->where('idarticulo','=',$detalle->idarticulo)
																		->first();
																	?>
																	@if($imagen->imagen != NULL)
																		@if($imagen->imagen != null)
																			<div class="cart_item_image">
																				<a href="{{URL::action('InicioController@show',$imagen->idarticulo)}}">
																					<img src="{{asset('imagenes/articulos/'.$imagen->imagen)}}" alt="$imagen->nombre" width=100 alt="">
																				</a>
																			</div>
																		@endif
																		@if($imagen->imagen == NULL)
																			<div class="cart_item_image">
																				<a href="{{URL::action('InicioController@show',$imagen->idarticulo)}}">
																					<img src="{{asset('imagenes/noimage.png')}}" alt="$imagen->nombre" width=100 alt="">
																				</a>
																			</div>
																		@endif
																	@endif
																	<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
																		<!--<div class="cart_item_name cart_info_col">
																			<div class="cart_item_title">Opciones</div>
																			<br><br>
																			<a href="" data-target="" data-toggle="modal">
																				<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Articulo">
																					<a href="" data-target="#modal-eliminar-{{$detalle->idorden_detalle}}" data-toggle="modal">
																						<button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
																							<i class="far fa-minus-square"></i>
																						</button>
																					</a>
																				</span>
																			</a>
																			<a href="" data-target="" data-toggle="modal">
																				<span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Cantidad">
																					<a href="" data-target="#modal-det-{{$detalle->idorden_detalle}}" data-toggle="modal">
																						<button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
																							<i class="far fa-edit"></i>
																						</button>
																					</a>
																				</span>
																			</a>
																		</div>-->
																		<div class="cart_item_name cart_info_col">
																			<div class="cart_item_title">Nombre </div>
																			<a href="{{URL::action('InicioController@show',$detalle->idarticulo)}}">
																				<div class="cart_item_text">{{substr(($detalle->articulo), 0, 23)}} - {{$detalle->codigo}} - {{$detalle->categoria}}</div>
																			</a>
																		</div>
																		<div class="cart_item_quantity cart_info_col">
																			<div class="cart_item_title">Cantidad</div>
																			<div class="cart_item_text">
																				{{$detalle->cantidad}}
																			</div>
																		</div>
																		<div class="cart_item_price cart_info_col">
																			<div class="cart_item_title">Precio</div>
																			<div class="cart_item_text">{{ Auth::user()->moneda }}{{ number_format($detalle->precio,2, '.', ',')}}</div>
																		</div>
																		<div class="cart_item_total cart_info_col">
																			<div class="cart_item_title">Total</div>
																			<div class="cart_item_text">{{ Auth::user()->moneda }}{{ number_format((($detalle->cantidad)*($detalle->precio)),2, '.', ',')}}</div>
																		</div>
																	</div>
																
																</li>
																@endforeach
															</ul>
														</div>
														<br>
														<!-- Order Total -->
														<div class="order_total">
															<div class="order_total_content text-md-right">
																<div class="order_total_title">Total Orden:</div>
																<div class="order_total_amount"><strong><font color="green">{{ Auth::user()->moneda }}{{ number_format($orden->total,2, '.', ',')}}</font></strong></div>
															</div>
														</div>
														<div class="order_total">
															<div class="order_total_content text-md-right">
																<div class="order_total_title">Total Envio:</div>
																<div class="order_total_amount"><strong><font color="green">{{ Auth::user()->moneda }}{{ number_format($orden->envio,2, '.', ',')}}</font></strong></div>
															</div>
														</div>
														<br>
														<br>
													</div>
												</div>
											</div>
										</div>
										@endforeach
									</div> 
								</div>
							</div>
                        </div>                         
                        <footer class="card-footer">
                            
                        </footer>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection