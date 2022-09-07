@extends ('layouts.admin')
@section ('contenido')


<div class="col-md-6 mb-4">
      <div class="card">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Crear Hospedaje </strong></h2>
            </header>

            <div class="card-body">
                  <h5 class="h4 card-title">Ingrese los datos que se le piden:</h5>
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

                  {!!Form::open(array('url'=>'inmuebles/inmueble','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                  {{Form::token()}}
                  <div class="form-group">
                        <label for="idtipo_inmueble">
                              <font color="orange">*</font>Tipo Hospedaje
                              <a href="{{url('inmuebles\tipoinmueble\create')}}">
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Crear Nuevo Hospedaje">
                                          <button class="btn btn-sm btn-success" style="pointer-events: none;" type="button">
                                                <i class="far fa-plus-square"></i>
                                          </button>
                                    </span>
                              </a>
                        </label>
                        <select id="idtipo_inmueble" type="text" class="form-control" name="idtipo_inmueble" value="{{ old('idtipo_inmueble') }}">
                              <option selected="selected" value="{{ old('idtipo_inmueble') }}">{{ old('idtipo_inmueble') }}</option>
                              @foreach ($tiposinmueble as $tipo)
                                <option value="{{$tipo->idtipo_inmueble}}">{{$tipo->nombre}}</option>
                              @endforeach
                                    
                        </select>
                  </div>
                  <div class="form-group">
                        <label for="nombre"><font color="orange">*</font>Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre..." value="{{old('nombre')}}">
                        
                  </div>
                  <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea type="text" name="descripcion" class="form-control" placeholder="Descripción..." value="{{old('descripcion')}}"></textarea>
                  </div>
                  <div class="form-group">
                        <label for="estado_tipoinmueble">Estado Hospedaje</label>
                        <select type="text" class="form-control" name="estado_inmueble" value="{{ old('estado_inmueble') }}">
                              <option selected="selected" value="Activo">Activo</option>
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