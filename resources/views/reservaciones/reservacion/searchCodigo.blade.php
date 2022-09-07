{!! Form::open(array('url'=>'reservaciones/reservacion','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
    <label for="codigo"><u>Buscar por Codigo:</u></label>
	<div class="input-group">
		
		<input type="text" class="form-control" name="searchCodigo" placeholder="RES-XXXXX" value="{{$searchCodigo}}">
		<input type="hidden" class="form-control" name="xsearch" value="xcod">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-info">
				<i class="fas fa-search"></i> Buscar
			</button>
		</span>
	</div>
</div>

{{Form::close()}}


