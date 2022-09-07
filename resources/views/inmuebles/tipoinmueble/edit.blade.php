@extends ('layouts.admin')
@section ('contenido')


<div class="col-md-6 mb-4">
      <div class="card">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Editar Hospedaje: {{ $tipoInmueble->nombre}}</strong></h2>
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

                  {!!Form::model($tipoInmueble,['method'=>'PATCH','route'=>['tipoinmueble.update',$tipoInmueble->idtipo_inmueble],'files'=>'true'])!!}
                  {{Form::token()}}
                  <div class="form-group">
                        <label for="nombre"><font color="orange">*</font>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{$tipoInmueble->nombre}}" placeholder="Nombre...">
                  </div>
                  <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea type="text" name="descripcion" class="form-control" placeholder="Descripción..." >{{$tipoInmueble->descripcion}}</textarea>
                  </div>
                  <div class="form-group">
                        <label for="maxpersonas">Maximo Personas</label>
                        <select type="text" class="form-control" name="maxpersonas">
                              <option selected="selected" value="{{$tipoInmueble->maxpersonas}}">{{$tipoInmueble->maxpersonas}}</option>
                              @for ($i = 0; $i <= 10; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                              @endfor      
                        </select>
                  </div>
                  <div class="form-group">
                        <label for="minpersonas">Minimo Personas</label>
                        <select type="text" class="form-control" name="minpersonas">
                              <option selected="selected" value="{{$tipoInmueble->minpersonas}}">{{$tipoInmueble->minpersonas}}</option>
                              @for ($i = 0; $i <= 10; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                              @endfor      
                        </select>
                  </div>
                  <div class="form-group">
                        <label for="menoresxpareja">Menores Gratis x 1ra. Pareja</label>
                        <select type="text" class="form-control" name="menoresxpareja">
                              <option selected="selected" value="{{$tipoInmueble->menoresxpareja}}">{{$tipoInmueble->menoresxpareja}}</option>
                              @for ($i = 0; $i <= 10; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                              @endfor      
                        </select>
                  </div>
                  <div class="form-group">
                        <label for="estado_tipoinmueble">Estado Tipo Hospedaje</label>
                        <select id="es" type="text" class="form-control" name="estado_tipoinmueble" >
                              <option selected="selected" value="{{$tipoInmueble->estado_tipoinmueble}}">{{$tipoInmueble->estado_tipoinmueble}}</option>
                              <option value="Activo">Activo</option>
                              <option value="Inactivo">Inactivo</option>
                                    
                        </select>
                  </div>
                  <div class="form-group">
                        <label for="mascotas">Mascotas</label>
                        <select id="mascotas" type="text" class="form-control" name="mascotas" >
                              <option selected="selected" value="{{$tipoInmueble->mascotas}}">{{$tipoInmueble->mascotas}}</option>
                              <option value="SI">SI</option>
                              <option value="NO">NO</option>
                                    
                        </select>
                  </div>
                  <div class="form-group">
                        <label for="maxmascotas">Maximo Mascotas</label>
                        <select id="maxmascotas" type="text" class="form-control" name="maxmascotas" >
                              <option selected="selected" value="{{$tipoInmueble->maxmascotas}}">{{$tipoInmueble->maxmascotas}}</option>
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option> 
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