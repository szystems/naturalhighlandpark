<html html>
	<head>
  		<title>Vista de Usuario SZ-Ventas</title>
		<style>
		  	h1, h2, h3, h4, h5, h6 {
				  font-family: arial, sans-serif;
			  }
			table {
					font-family: arial, sans-serif;
					border-collapse: collapse;
					width: 50%;
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
			<strong><u>Vista de Usuario</u></strong>
		</h4>
		<h6>
			<strong>Fecha:</strong><font color="Blue"> <strong>'{{ $hoy}}' </strong></font>
			<br><strong>Empresa:</strong><font color="Blue"> <strong>'{{ $empresa}}' </strong></font>
			<br><strong>Usuario:</strong><font color="Blue"> <strong>'{{ $nombreusu}}' <strong></font>
			
		</h6>
		<div style="text-align:center;">
		<table>
			<tr>		
				<th colspan="2"><h4 align="center">{{ $usuario->name}}</h4></th>
			</tr>
			<tr>
				<td><h4 align="right"><strong>Dirección:</strong></h4></td>
				<td><h4 align="left"><font color="Blue">{{ $usuario->direccion}}</font></h4></td>
			</tr>
			<tr>
				<td><h4 align="right"><strong>Teléfono:</strong></h4></td>
				<td><h4 align="left"><font color="Blue">{{ $usuario->telefono}}</font></h4></td>
			</tr>
			<tr>
				<td><h4 align="right"><strong>País:</strong></h4></td>
				<td><h4 align="left"><font color="Blue">{{ $usuario->pais}}</font></h4></td>
			</tr>
			<tr>
				<td><h4 align="right"><strong>Departamento/Estado:</strong></h4></td>
				<td><h4 align="left"><font color="Blue">{{ $usuario->departamento}}</font></h4></td>
			</tr>
			<tr>
				<td><h4 align="right"><strong>Email:</strong></h4></td>
				<td><h4 align="left"><font color="Blue">{{ $usuario->email}}</font></h4></td>
			</tr>
			<tr>
				<td><h4 align="right"><strong>No. Documento:</strong></h4></td>
				<td><h4 align="left"><font color="Blue">{{ $usuario->num_documento}}</font></h4></td>
			</tr>
		</table>
		</div>
		<br>
		<div style="text-align:center;">
		<table>
			<tr>		
				<th colspan="2"><h4 align="center">Acceso y Configuración</h4></th>
			</tr>
			<tr>
				<td><h4 align="right"><strong>Usuario Principal:</strong></h4></td>
				<td><h4 align="left"><font color="Blue">{{ $usuario->principal}}</font></h4></td>
			</tr>
			<tr>
				<td><h4 align="right"><strong>Tipo:</strong></h4></td>
				<td><h4 align="left"><font color="Blue">{{ $usuario->tipo_usuario}}</td>
			</tr>
		</table>
		</div>
		<br>
		<h6>Reporte generado en: <a href="https://szystems.com/" target="_blank">SZ-Ventas Version 1.0</a> &copy; 2019 <a class="link-muted" href="https://szystems.com/" target="_blank">Szystems</a>. Todos los derechos reservados.</h6>
	</body>
</html>