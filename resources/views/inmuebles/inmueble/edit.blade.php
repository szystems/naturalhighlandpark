@extends ('layouts.admin')
@section ('contenido')


<div class="col-md-6 mb-4">
      <div class="card">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Editar Hospedaje: {{ $inmueble->nombre}}</strong></h2>
            </header>

            <div class="card-body">
                  <h5 class="h4 card-title">Cambie los datos que desee editar:</h5>
                  <h6><font color="orange"> Campos Obligatorios *</font></h6>
                  
                  @if (count($errors)>0)
                  <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                        @endforeach
                        </ul>
                  </div>
                  @endif

                  {!!Form::model($inmueble,['method'=>'PATCH','route'=>['inmueble.update',$inmueble->idinmueble],'files'=>'true'])!!}
                  {{Form::token()}}
                  <div class="form-group">
                        <label for="tipo_inmueble"><font color="orange">*</font>Tipo Inmueble</label>
                        <a href="{{url('inmuebles\tipoinmueble\create')}}">
                              <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear Nuevo Tipo Hospedaje">
                                    <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                                          <i class="far fa-plus-square"></i>
                                    </button>
                              </span>
                        </a>
                        <select name="idtipo_inmueble" class="form-control">
                              @foreach ($tiposinmueble as $tipo)
                                    @if ($tipo->idtipo_inmueble==$inmueble->idtipo_inmueble)
                                          <option value="{{$tipo->idtipo_inmueble}}" selected>{{$tipo->nombre}}</option>
                                    @else
                                          <option value="{{$tipo->idtipo_inmueble}}">{{$tipo->nombre}}</option>
                                    @endif
                              @endforeach
                        </select>
                  </div>
                  <div class="form-group">
                        <label for="nombre"><font color="orange">*</font>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{$inmueble->nombre}}" placeholder="Nombre...">
                  </div>
                  <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea type="text" name="descripcion" class="form-control" placeholder="Descripción..." >{{$inmueble->descripcion}}</textarea>
                  </div>
                  <div class="form-group">
                        <label for="estado_inmueble">Estado Hospedaje</label>
                        <select id="es" type="text" class="form-control" name="estado_inmueble" >
                              <option selected="selected" value="{{$inmueble->estado_inmueble}}">{{$inmueble->estado_inmueble}}</option>
                              <option value="Activo">Activo</option>
                              <option value="Inactivo">Inactivo</option>
                                    
                        </select>
                  </div>
            </div>

            <footer class="card-footer">
                  <div class="form-group">
                        <button class="btn btn-danger" type="reset"><i class="fas fa-ban"></i> Borrar</button>
                        <button class="btn btn-info" type="submit"><i class="far fa-save"></i> Guardar</button>
                  </div>

                  {!!Form::close()!!}
            </footer>
      </div>
</div>
@endsection