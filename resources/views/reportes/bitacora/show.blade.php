@extends ('layouts.admin')
@section ('contenido')


<div>
      <div class="card mb-4">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Bitacora </strong></h2>
            </header>
            {{Form::open(array('action' => 'ReportesController@vistabitacorareporte','method' => 'POST','role' => 'form', 'target' => '_blank'))}}

                {{Form::token()}}		
					<div class="card mb-4">
						<header class="card-header d-md-flex align-items-center">
							<h4><strong>Imprimir Bitacora </strong></h4>
							<input type="hidden" id="rid" class="form-control datepicker" name="rid" value="{{$bitacora->idbitacora}}">
                            
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
                
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <?php
                                        $fecha = date("d-m-Y", strtotime($bitacora->fecha));					
                                    ?>
                                    <label for="fecha">Fecha</label>
                                    <p>{{$fecha}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <p>{{$bitacora->name}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="tipo">Tipo</label>
                                    
                                    <p>{{$bitacora->tipo}}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <p>{{$bitacora->descripcion}}</p>
                                </div>
                            </div>
                        </div>


                    </div>

                    
            <footer class="card-footer">

            </footer>
      </div>
</div>
   




@endsection