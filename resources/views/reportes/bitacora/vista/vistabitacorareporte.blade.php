<html html>
	<head>
  		<title>Vista de Bitacora SZ-Ventas</title>
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
		<h6>
			<strong>Fecha:</strong><font color="Blue"> <strong>'{{ $hoy}}' </strong></font>
			<strong>Empresa:</strong><font color="Blue"> <strong>'{{ $empresa}}' </strong></font>
			<strong>Usuario:</strong><font color="Blue"> <strong>'{{ $nombreusu}}' <strong></font>
			
		</h6>
		<h4 align="center">
			<strong><u>Bitacora</u></strong>
		</h4>
		<h6>
			<?php
				$fecha = date("d-m-Y", strtotime($bitacora->fecha));					
			?>
			<strong>Fecha Registro:</strong><font color="Blue"> <strong>{{ $fecha}} </strong></font>
			<br><strong>Usuario:</strong><font color="Blue"> <strong>{{$bitacora->name}}</strong></font>
			<br><strong>Tipo:</strong><font color="Blue"> <strong>{{ $bitacora->tipo}}<strong></font>
			<br><strong>Descripción:</strong><font color="Blue"> <strong>{{ $bitacora->descripcion}}<strong></font>
			
		</h6>
		
		<br>
		<h6>Reporte generado en: <a href="https://szystems.com/" target="_blank">SZ-Ventas Version 1.0</a> &copy; 2019 <a class="link-muted" href="https://szystems.com/" target="_blank">Szystems</a>. Todos los derechos reservados.</h6>
	</body>
</html>