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
        <a href="{{url('inmuebles\inmueble')}}">
            <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear Hospedaje ">
                <button class="btn btn-sm btn-link" style="pointer-events: none;" type="button">
                    <i class="fas fa-reply"></i> Hospedajes
                </button>
            </span>
		</a>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                  <a class="nav-link active" id="inmueble-tab" data-toggle="tab" href="#inmueble" role="tab" aria-controls="inmueble" aria-selected="true">Hospedaje</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" id="imagenes-tab" data-toggle="tab" href="#imagenes" role="tab" aria-controls="imagenes" aria-selected="false">Imágenes</a>
            </li>
      </ul>
      <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="inmueble" role="tabpanel" aria-labelledby="inmueble-tab">
                  <!--Informacion general de Tipos Inmueble-->
                  <div class="card">
                        <header class="card-header">
                            <h2 class="h3 card-header-title"><strong>Hospedaje: {{$inmueble->nombre}}</strong></h2>
                        </header>
                        <div class="card-body">
                            <a href="{{URL::action('InmuebleController@edit',$inmueble->idinmueble)}}">
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar Hospedaje">
                                    <button class="btn btn-sm btn-info" style="pointer-events: none;" type="button"><i class="far fa-edit"></i> Editar</button>
                                </span>
                            </a>
                                            
                            <a href="" data-target="#modaleliminarshow-delete-{{$inmueble->idinmueble}}" data-toggle="modal">
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Hospedaje">
                                    <button class="btn btn-sm btn-danger" style="pointer-events: none;" type="button"><i class="far fa-minus-square"></i> Eliminar</button>
                                </span>
                            </a>
                            <div class="row">
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="tipo_inmueble"><strong>Tipo Hospedaje</strong></label>
                                        <p>{{$inmueble->Tipo}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="nombre"><strong>Nombre</strong></label>
                                        <p>{{$inmueble->nombre}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="descripcion"><strong>Descripción</strong></label>
                                        <p>{{$inmueble->descripcion}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="estado_inmueble"><strong>Estado</strong></label>
                                        <p>{{$inmueble->estado_inmueble}}</p>
                                    </div>
                                </div>
                            </div>
                            @include('inmuebles.inmueble.modaleliminarshow')
                        </div>

                        <footer class="card-footer">
                              
                        </footer>
                  </div>
            </div>
            <div class="tab-pane fade" id="imagenes" role="tabpanel" aria-labelledby="imagenes-tab">
                  
                  <!--agregar caracteristicas de Tipo de inmueble-->
                  <div class="card">
                        <header class="card-header">
                              <h2 class="h3 card-header-title"><strong>Imágenes Hospedaje: {{$inmueble->nombre}}</strong></h2>
                        </header>

                        <div class="card-body">
                              <h5 class="h4 card-title">Seleccione la imagen que desee agregar:</h5>
                  
                              @if (count($errors)>0)
                              <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                          <li>{{$error}}</li>
                                    @endforeach
                                    </ul>
                              </div>
                              @endif

                              {!!Form::open(array('url'=>'inmueble/inmuebleimg','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                              {{Form::token()}}
                              <div class="form-group">
                                    <label for="imagen"><strong>Agregar Imagen</strong></label>
                                    
                                    <div class="input-group">
                                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                      <input type="file" name="imagen" value="{{old('imagen')}}">
                                                      <input type="hidden" name="idinmueble" class="form-control" value="{{$inmueble->idinmueble}}">
                                                </div>
                                          </div>
                                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <span class="input-group-btn">
                                                      <button type="submit" class="btn btn-info">
                                                            <i class="far fa-plus-square"></i> Agregar Imagen
                                                      </button>
                                                </span>
                                          </div>
                                    </div>
                              </div>
                              {!!Form::close()!!}
                              <!--mostrar imagenes secundarias-->
                              <table class="table table-striped table-bordered table-condensed table-hover">
                                    <?php
                                          $imagenesInmueble=DB::table('inmueble_img')
                                          ->where('idinmueble','=',$inmueble->idinmueble)
                                          ->get();
                                    ?>
                                    @foreach ($imagenesInmueble as $imagen)
                                    <thead>
                                          <th><h5><STRONG>Imagen</STRONG></h5><font color="orange"><br>* La Imagen puede eliminarse y editarse.</font></th>
                                    </thead>
                                    
                                          <tr>
                                                
                                                <td align="left" >
                                                      {!!Form::model($imagen,['method'=>'PATCH','route'=>['inmuebleimg.update',$imagen->idinmueble_img],'files'=>'true'])!!}
                                                      {{Form::token()}}
                                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-4">
                                                                  <div class="form-group">
                                                                        @if ($imagen->imagen != null)
                                                                              <img src="{{asset('imagenes/inmuebles/'.$imagen->imagen)}}" alt="" width="250px"  class="img-thumbnail">
                                                                        @else
                                                                              "No hay imagen"
                                                                        @endif

                                                                  </div>
                                                            </div>
                                                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                                                  <div class="form-group">
                                                                        <input type="hidden" name="idinmueble" class="form-control" value="{{$inmueble->idinmueble}}">
                                                                  </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-4">
                                                                  <div class="form-group">
                                                                        {{ $imagen->imagen}}
                                                                        <input type="file" name="imagen" value="{{old('imagen')}}">
                                                                  </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-4">
                                                                  <div class="form-group">
                                                                        <button class="btn btn-info" type="submit"><i class="far fa-edit"></i> Editar</button>
                                                                        <a href="" data-target="#modal-delete-{{$imagen->idinmueble_img}}" data-toggle="modal">
                                                                              <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Eliminar Imagen">
                                                                                    <button class="btn btn-danger" style="pointer-events: none;" type="button">
                                                                                                <i class="far fa-minus-square"> Eliminar</i>
                                                                                    </button>
                                                                              </span>
                                                                        </a>
                                                                  </div>
                                                            </div>
                                                      {!!Form::close()!!}
                                                </td>
                                          </tr>
                                          @include('inmuebles.inmueble.inmuebleimg.eliminarmodal')
                                    @endforeach
                              
                              </table>
                        </div>

                        <footer class="card-footer">
                        
                        </footer>
                  </div>
            </div>
      </div>
</div>


@endsection