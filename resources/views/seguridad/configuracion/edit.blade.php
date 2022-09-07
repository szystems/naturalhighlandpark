@extends ('layouts.admin')
@section ('contenido')


<div class="col-md-6 mb-4">
      <div class="card">
            <header class="card-header">
                  <h2 class="h3 card-header-title"><strong>Editar Configuración : </strong></h2>
            </header>

            <div class="card-body">
                  <h5 class="h4 card-title">Edite los datos de configuración  y a continuacion guardar:</h5>
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

                  {!!Form::model($configuracion,['method'=>'PATCH','route'=>['configuracion.update',$configuracion->id],'files'=>true,'enctype'=>'multipart/form-data'])!!}

                  {{Form::token()}}
                  <div class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }}">
                        <label for="empresa"><font color="orange">*</font>Nombre de Empresa</label>
                        <input id="empresa" type="text" class="form-control" name="empresa" value="{{$configuracion->empresa}}" >
                        @if ($errors->has('empresa'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('empresa') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  
                  <div class="form-group{{ $errors->has('zona_horaria') ? ' has-error' : '' }}">
                        <label for="zona_horaria"><font color="orange">*</font>Zona Horaria</label>
                        <select id="zona_horaria" type="text" class="form-control" name="zona_horaria" value="{{$configuracion->zona_horaria}}">
                            <option selected="selected" value="{{$configuracion->zona_horaria}}">{{$configuracion->zona_horaria}}</option>
                            <option value="America/Guatemala">America/Guatemala</option>
                            <option value="America/Los_Angeles">America/Los_Angeles</option>
                            <option value="America/Mexico_City">America/Mexico_City</option>
                                    
                        </select>
                        @if ($errors->has('zona_horaria'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('zona_horaria') }}
                                    </strong>
                              </span>
                        @endif
                  </div>

                  <div class="form-group{{ $errors->has('moneda') ? ' has-error' : '' }}">
                        <label for="moneda"><font color="orange">*</font>Moneda</label>
                        <select id="moneda" type="text" class="form-control" name="moneda" value="{{$configuracion->moneda}}">
                            <option selected="selected" value="{{$configuracion->moneda}}">{{$configuracion->moneda}}</option>
                            <option value="Q.">GUA Q.</option>
                            <option value="$.">US $</option>
                            <option value="$.">MXN $</option>
                                    
                        </select>
                        @if ($errors->has('moneda'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('moneda') }}
                                    </strong>
                              </span>
                        @endif
                  </div>
                  
                  <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                        <label for="logo">Imagen: </label>
                        <input type="file" name="logo" >
                        @if (($configuracion->logo)!="")
                          <img src="{{asset('imagenes/logos/'.$configuracion->logo)}}"  width="400">
                        @endif

                         @if ($errors->has('logo'))
                              <span class="help-block">
                                    <strong>
                                          {{ $errors->first('logo') }}
                                    </strong>
                              </span>
                        @endif
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

@push ('scripts')
    <script>
        

        function validardecimal(e,txt) 
        {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true;
            if (tecla==46 && txt.indexOf('.') != -1) return false;
            patron = /[\d\.]/;
            te = String.fromCharCode(tecla);
            return patron.test(te); 
        }  

        function validarentero(e,txt) 
        {
            tecla = (document.all) ? e.keyCode : e.which;

            //Tecla de retroceso para borrar, siempre la permite
            if (tecla==8)
            {
                return true;
            }
        
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final); 
        }
    </script>
@endpush
@endsection