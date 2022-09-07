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
        <a href="{{url('inmuebles\tipoinmueble')}}">
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear Hospedaje ">
                <button class="btn btn-sm btn-link" style="pointer-events: none;" type="button">
                    <i class="fas fa-reply"></i> Tipos de Hospedaje
                </button>
            </span>
		</a>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                  <a class="nav-link active" id="tipo_inmueble-tab" data-toggle="tab" href="#tipo_inmueble" role="tab" aria-controls="tipo_inmueble" aria-selected="true">Tipo Hospedaje</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" id="caracteristicas-tab" data-toggle="tab" href="#caracteristicas" role="tab" aria-controls="caracteristicas" aria-selected="false">Características</a>
            </li>
      </ul>
      <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tipo_inmueble" role="tabpanel" aria-labelledby="tipo_inmueble-tab">
                  <!--Informacion general de Tipos Inmueble-->
                  <div class="card">
                        <header class="card-header">
                            <h2 class="h3 card-header-title"><strong>Tipo Hospedaje: {{$tipoInmueble->nombre}}</strong></h2>
                        </header>
                        <div class="card-body">
                            <a href="{{URL::action('TipoInmuebleController@edit',$tipoInmueble->idtipo_inmueble)}}">
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Hospedaje">
                                    <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button"><i class="far fa-edit"></i> Editar</button>
                                </span>
                            </a>
                                            
                            <a href="" data-target="#modaleliminarshow-delete-{{$tipoInmueble->idtipo_inmueble}}" data-toggle="modal">
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Hospedaje">
                                    <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button"><i class="far fa-minus-square"></i> Eliminar</button>
                                </span>
                            </a>
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="nombre"><strong>Nombre</strong></label>
                                        <p>{{$tipoInmueble->nombre}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="descripcion"><strong>Descripción</strong></label>
                                        <p>{{$tipoInmueble->descripcion}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="maxpersonas"><strong>Maximo Personas</strong></label>
                                        <p>{{$tipoInmueble->maxpersonas}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="minpersonas"><strong>Minimo Personas</strong></label>
                                        <p>{{$tipoInmueble->minpersonas}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="menoresxpareja"><strong>Menores Gratis X 1ra. Pareja</strong></label>
                                        <p>{{$tipoInmueble->menoresxpareja}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="descripcion"><strong>Estado</strong></label>
                                        <p>{{$tipoInmueble->estado_tipoinmueble}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="mascotas"><strong>Mascotas</strong></label>
                                        <p>{{$tipoInmueble->mascotas}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="mascotas"><strong>Maximo Mascotas</strong></label>
                                        <p>{{$tipoInmueble->maxmascotas}}</p>
                                    </div>
                                </div>
                            </div>
                            @include('inmuebles.tipoinmueble.modaleliminarshow')
                        </div>

                        <footer class="card-footer">
                              
                        </footer>
                  </div>
            </div>
            <div class="tab-pane fade" id="caracteristicas" role="tabpanel" aria-labelledby="caracteristicas-tab">
                  
                  <!--agregar caracteristicas de Tipo de inmueble-->
                  <div class="card">
                        <header class="card-header">
                              <h2 class="h3 card-header-title"><strong>Agregar Característica a: {{$tipoInmueble->nombre}}</strong></h2>
                        </header>

                        <div class="card-body">
                            <h5 class="h4 card-title"><b><u>Agregar una nueva Característica:</b></u></h5>

                            {!!Form::open(array('url'=>'tipoinmueble/caracteristica','method'=>'POST','autocomplete'=>'off'))!!}
                            {{Form::token()}}
                            <div class="form-group">
                                <div class="input-group">
                                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                            <label for="nombre"><strong>Nombre:</strong></label>
                                            <div class="form-group">
                                                <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}">
                                                <input type="hidden" name="idtipo_inmueble" class="form-control" value="{{$tipoInmueble->idtipo_inmueble}}" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                            <label for="descripcion"><strong>Descripción:</strong></label>
                                            <div class="form-group">
                                                <textarea type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}" placeholder="Descripción...">{{old('descripcion')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                            <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-info">
                                                        <i class="far fa-plus-square"></i> Agregar Característica
                                                    </button>
                                            </span>
                                        </div>
                                </div>
                            </div>
                            {!!Form::close()!!}
                            <!--mostrar imagenes secundarias-->
                            <div class="table-responsive">
                            <th><h5 class="h4 card-title"><STRONG><u>Características de {{$tipoInmueble->nombre}}</u></STRONG></h5></th>
                                <table class="table table-striped table-bordered table-condensed table-hover">
                                            
                                        <thead>
                                            <th><h5><strong><i class="fa fa-sliders-h"></i></strong></h5></th>
                                            <th><h5><strong>Nombre</strong></h5></th>
                                            <th><h5><strong>Descripción</strong></h5></th>
                                            
                                        </thead>
                                        <?php
                                            $caracteristicas=DB::table('caracteristica')
                                            ->where ('idtipo_inmueble','=',$tipoInmueble->idtipo_inmueble)
                                            ->orderBy('idcaracteristica','asc')
                                            ->get();
                                        ?>
                                        
                                        @foreach ($caracteristicas as $caracteristica)
                                            <tr>
                                                    <td align="left">
                                                        <a href="" data-target="#modaleditarcaracteristica{{$caracteristica->idcaracteristica}}" data-toggle="modal">
                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Característica">
                                                                <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button">
                                                                    <i class="far fa-edit"></i>
                                                                </button>
                                                            </span>
                                                        </a>
                                                        <a href="" data-target="#modaleliminarcaracteristica{{$caracteristica->idcaracteristica}}" data-toggle="modal">
                                                            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Características">
                                                                <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button">
                                                                        <i class="far fa-minus-square"></i>
                                                                </button>
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td align="left"><h5>{{ $caracteristica->nombre}}</h5></td>
                                                    <td align="center"><h5>{{ $caracteristica->descripcion}}</h5></td>
                                            </tr>
                                            @include('inmuebles.tipoinmueble.editarcaracteristica.editarcaracteristicamodal')
                                            @include('inmuebles.tipoinmueble.eliminarcaracteristica.eliminarcaracteristicamodal')
                                        @endforeach
                                </table>
                            </div>

                            <footer class="card-footer">
                            </footer>
                              
                        </div>

                        <footer class="card-footer">
                        
                        </footer>
                  </div>
            </div>
      </div>
</div>


@endsection