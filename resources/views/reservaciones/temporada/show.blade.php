@extends ('layouts.admin')
@section ('contenido')


<div class="col-md-12 mb-12">
      @if (count($errors)>0)
            <div class="alert alert-danger">
                  <ul>
                        @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                        @endforeach
                  </ul>
            </div>
      @endif
      <!--Mensaje de abono correcto-->
      <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                  @if(Session::has('alert-' . $msg))

                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                  @endif
                  {{session()->forget('alert-' . $msg)}}
            @endforeach
      </div> <!-- fin .flash-message -->
        <a href="{{url('reservaciones\temporada')}}">
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear Temporada ">
                <button class="btn btn-sm btn-link" style="pointer-events: none;" type="button">
                    <i class="fas fa-reply"></i> Crear Temporada
                </button>
            </span>
		</a>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                  <a class="nav-link active" id="temporada-tab" data-toggle="tab" href="#temporada" role="tab" aria-controls="temporada" aria-selected="true">Temporada</a>
            </li>
      </ul>
      <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="temporada" role="tabpanel" aria-labelledby="temporada-tab">
                  <!--Informacion general de Tipos Inmueble-->
                  <div class="card">
                        <header class="card-header">
                            <h2 class="h3 card-header-title"><strong>Temporada: </strong></h2>
                        </header>
                        <div class="card-body">
                            <a href="{{URL::action('TemporadaController@edit',$temporada->idtemporada)}}">
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Hospedaje">
                                    <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button"><i class="far fa-edit"></i> Editar</button>
                                </span>
                            </a>
                                            
                            <a href="" data-target="#modaleliminarshow-delete-{{$temporada->idtemporada}}" data-toggle="modal">
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Temporada">
                                    <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button"><i class="far fa-minus-square"></i> Eliminar</button>
                                </span>
                            </a>
                            <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="tipo_inmueble"><strong>Tipo Hospedaje</strong></label>
                                        <p>{{$temporada->nombre}}</p>
                                    </div>
                                </div>
                                    <?php
                                          $fecha_inicial = date("d-m-Y", strtotime($temporada->fecha_inicial));
                                          $fecha_final = date("d-m-Y", strtotime($temporada->fecha_final));
                                    ?>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="fecha_inicial"><strong>Fecha Inicial</strong></label>
                                        <p>{{$fecha_inicial}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="fecha_final"><strong>Fecha Final</strong></label>
                                        <p>{{$fecha_final}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="precio"><strong>Precio Adultos</strong></label>
                                        <p>{{ Auth::user()->moneda }}{{number_format($temporada->precio,2, '.', '')}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="preciomenor"><strong>Precio Menores</strong></label>
                                        <p>{{ Auth::user()->moneda }}{{number_format($temporada->preciomenor,2, '.', '')}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="preciomenor"><strong>Promocion Persona Gratis</strong></label>
                                        <p>{{$temporada->promopersonagratis}} ({{$temporada->promonumpersonas}})</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="estado_temporada"><strong>Estado Temporada</strong></label>
                                        <p>{{$temporada->estado_temporada}}</p>
                                    </div>
                                </div>
                            </div>
                            @include('reservaciones.temporada.modaleliminarshow')
                        </div>

                        <footer class="card-footer">
                              
                        </footer>
                  </div>
            </div>
            
      </div>
</div>


@endsection