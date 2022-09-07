<html html>
	<head>
  		<title>Listado de Usuarios SZ-Ventas</title>
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
		<center>
			<img align="center" src="{{ $imagen}}" alt="" height="100">
		</center>
		<h4 align="center">
			<strong><u>Listado de Usuarios</u></strong>
		</h4>
		<h6>
			<strong>Fecha:</strong><font color="Blue"> <strong>'{{ $hoy}}' </strong></font>
			<br><strong>Empresa:</strong><font color="Blue"> <strong>'{{ $empresa}}' </strong></font>
			<br><strong>Listado creado por:</strong><font color="Blue"> <strong>'{{ $nombreusu}}' <strong></font>
			
		</h6>
		<table>
			<tr>		
				<th>Principal</th>
				<th>Nombre</th>
				<th>Tipo</th>
				<th>Dirección</th>
				<th>Teléfono</th>
				<th>País</th>
				<th>Depto/Estado</th>
				<th>Email</th>
			</tr>
			@foreach ($usuarios as $usu)
			<tr>
				<td><h4 align="center">{{ $usu->principal}}</h4></td>
				<td><h4 align="center">{{ $usu->name}}</h4></td>
				<td><h4 align="center">{{ $usu->tipo_usuario}}</h4></td>
				<td><h4 align="center">{{ $usu->direccion}}</h4></td>
				<td><h4 align="center">{{ $usu->telefono}}</h4></td>
				<td><h4 align="center">{{ $usu->pais}}</h4></td>
				<td><h4 align="center">{{ $usu->departamento}}</h4></td>
				<td><h4 align="center">{{ $usu->email}}</h4></td>
			</tr>
			@endforeach
		</table>
		<br>
		<h6>Reporte generado en: <a href="https://szystems.com/" target="_blank">SZ-Ventas Version 1.0</a> &copy; 2019 <a class="link-muted" href="https://szystems.com/" target="_blank">Szystems</a>. Todos los derechos reservados.</h6>
	</body>
</html>