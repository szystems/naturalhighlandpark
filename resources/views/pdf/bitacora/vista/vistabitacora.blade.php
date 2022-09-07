<html html>
	<head>
  		<title>Vista de Venta SZ-Ventas</title>
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
		<h6>
			<strong>Fecha:</strong><font color="Blue"> <strong>'{{ $hoy}}' </strong></font>
			<strong>Empresa:</strong><font color="Blue"> <strong>'{{ $empresa}}' </strong></font>
			<strong>Usuario:</strong><font color="Blue"> <strong>'{{ $nombreusu}}' <strong></font>
			
		</h6>
		<h4 align="center">
			<strong><u>Venta</u></strong>
		</h4>
		<h6>
			<?php
				$fecha = date("d-m-Y", strtotime($venta->fecha));
			?>
			<strong>Fecha Venta:</strong><font color="Blue"> <strong>{{ $fecha}} </strong></font>
			<br><strong>Comprobante:</strong><font color="Blue"> <strong>{{$venta->tipo_comprobante}} {{$venta->serie_comprobante}}-{{$venta->num_comprobante}} </strong></font>
			<br><strong>Cliente:</strong><font color="Blue"> <strong>{{ $venta->nombre}}<strong></font>
				<strong>Teléfono:</strong><font color="Blue"> <strong>{{ $venta->telefono}}<strong></font>
				<strong>Dirección:</strong><font color="Blue"> <strong>{{ $venta->direccion}}<strong></font>
			<br><strong>Documento:</strong><font color="Blue"> <strong>{{ $venta->tipo_documento}} {{$venta->num_documento}}<strong></font>
			<br><strong>Saldo:</strong><font color="Blue"> <strong>{{ $venta->estadosaldo}}<strong></font>
			@if ($venta->estadosaldo == "Pendiente")
			<br><strong>Saldo Total:</strong><font color="Red"> <strong>{{ Auth::user()->moneda }}{{ number_format($venta->total_venta-$venta->abonado,2, '.', ',')}}<strong></font>
			@endif
			<br><strong>Tipo pago:</strong><font color="Blue"> <strong>{{ $venta->tipopago}}<strong></font>
			<br><strong>Estado Venta:</strong><font color="Blue"> <strong>{{ $venta->estadoventa}}<strong></font>
		</h6>
		<h4 align="left">
			<strong><u>Detalle de Venta</u></strong>
		</h4>
		<div style="text-align:center;">
		<table>
			<tr>		
				<th><h4 align="center">Codigo/Articulo</h4></th>
                <th><h4 align="center">Cantidad</h4></th>
                <th><h4 align="center">Precio Unidad</h4></th>
                <th><h4 align="center">Descuento Total</h4></th>
                <th><h4 align="center">Subtotal</h4></th>
			</tr>
			@foreach($detalles as $det)
            <tr>
                <td><h4 align="left">{{ $det->codigo}} {{ $det->articulo}}</h4></td>
                <td><h4 align="center">{{ $det->cantidad}}</h4></td>
                <td><h4 align="right">{{ Auth::user()->moneda }}{{ number_format($det->precio_venta,2, '.', ',')}}</h4></td>
                <td><h4 align="right">{{ Auth::user()->moneda }}{{ number_format((($det->descuento)),2, '.', ',')}}</h4></td>
                <td><h4 align="right">{{ Auth::user()->moneda }}{{ number_format(((((($det->cantidad)*($det->precio_venta))-($det->descuento))*$venta->impuesto)/100)+((($det->cantidad)*($det->precio_venta))-($det->descuento)),2, '.', ',')}}</h4></td>
            </tr>
            @endforeach
			<tr>
                <td></td>
                <td></td>
                <td></td>
                <td><h2 align="right">Total: </h2></td>
				<td><h2 align="right">{{ Auth::user()->moneda }}{{ number_format($venta->total_venta,2, '.', ',')}}</h2></td>
            </tr>
		</table>
		</div>
		<br>
		<h6>Reporte generado en: <a href="https://szystems.com/" target="_blank">SZ-Ventas Version 1.0</a> &copy; 2019 <a class="link-muted" href="https://szystems.com/" target="_blank">Szystems</a>. Todos los derechos reservados.</h6>
	</body>
</html>