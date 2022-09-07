<html html>
	<head>
  		<title>Reporte de Bitacora SZ-Ventas</title>
		  <style>
		  	h1, h2, h3, h4, h5, h6 {
				  font-family: arial, sans-serif;
			  }
			table {
					font-family: arial, sans-serif;
					border-collapse: collapse;
					width: 100%;
					font-size: 10px;
					border: 1px solid #000;
				}

			th, td {
					width: 25%;
					text-align: left;
					vertical-align: top;
					border: 1px solid #000;
					border-collapse: collapse;
					padding: 0.3em;
					caption-side: bottom;
					height: 20px;
			}

			th {
				background-color: #595555;
				color: white;
				font-size: 10px;
				width: 100%;
			}
			img{
			}
			
		  </style>
	</head>
	<body>
		@if ($imagen != null)
			<center>
				<img align="center" src="{{ $imagen}}" alt="" height="100">
			</center>
		@endif
		<h4 align="center">
			<strong><u>Reporte de Bitacora</u></strong>
		</h4>
		<h6><strong>Empresa:</strong><font color="Blue"> <strong>'{{ $empresa}}' </strong></font><br><strong>Reporte creado por:</strong><font color="Blue"> <strong>'{{ $nombreusu}}' <strong></font>
		<?php
			$fecha = date("d-m-Y", strtotime($fecha));
			if($fecha == '01-01-1970')
			{
				$fecha = null;
			}
					
		?>
		<br><strong>Filtros:</strong><font color="Blue"> <strong>Fecha:</strong> '{{ $fecha}}', <strong>Usuario:</strong> '@foreach($usufiltro as $usuf){{$usuf->name}}@endforeach', <strong>Tipo:</strong> '{{ $tipo}}'</font></h6>
		
		
		
		<table>
			<tr>
							
				<th>Fecha</th>         
				<th>Usuario</th>
				<th>Tipo</th>
				<th>Descripción</th>
							
			</tr>
						
		    @foreach ($bitacora as $bit)
			<tr>
				<?php
					$fecha = date("d-m-Y", strtotime($bit->fecha));					
				?>			
				<td class="celda"><h4 align="center">{{ $fecha}}</h4></td>
				<td><h4 align="center">{{ $bit->name}}</h4></td>
				<td><h4 align="center">{{ $bit->tipo}}</h4></td>
				<td><h4 align="left">{{ $bit->descripcion}}</h4></td>
			</tr>
			@endforeach
						
		</table>
		<br>
		
		
		<h6>Reporte generado en: <a href="https://szystems.com/" target="_blank">SZ-Ventas Version 1.0</a> &copy; 2019 <a class="link-muted" href="https://szystems.com/" target="_blank">Szystems</a>. Todos los derechos reservados.</h6>
	</body>
</html>