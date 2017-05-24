<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>COTIZACION N° {{ $cotizacion->id }}</title>
	<style>
		h2{
			margin-top: 0px !important;
			margin-bottom: 0px !important;
		}
		table{
			width: 100%;
		}
		img{
			width: 150px;
		}
		body{
			height: 100%;
		}
		.left{
			text-align: left;
		}
		.right{
			text-align: right;
		}
		.center{
			text-align: center;
		}
		.border-radius{
			border: solid 1px black;
			border-radius: 8px;
			padding-top: 5px;
			padding-bottom: 5px;
		}
		.td-width{
			width: 120px;
			padding-right: 5px;
		}
		p{
			margin: 0px;
			padding: 0px;
		}
		th{
			font-weight: normal;
			font-size: 11px;
			border-bottom: solid 1px black;
			border-right: solid 1px white;
			border-left: solid 1px white;
		}
		.custom-table{
			width: 98%;
			margin: 5px auto;
			border-bottom: solid 1px black;
			border-left: solid 1px black;
			border-right: solid 1px black;
			border-collapse: collapse;
   	 	border-spacing: 0;
   	 	padding-bottom: 7px;
		}
		.border-bottom-td{
			border-bottom: solid 1px #D5D5D5;
		}
		.border-td{
			border-bottom: solid 1px #D5D5D5;
			border-left: solid 1px #D5D5D5;
			padding-right: 5px;
		}
		.border-top{
			border-top: solid 2px black;
		}
		.margin-top{
			margin-top: 3px;
		}
		.padding-top{
			padding-top: 13px;
		}
		.padding-left{
			padding-left: 15px;
		}
		.padding-right{
			padding-right: 7px;
		}
		.small{
			font-size: 12px;
		}
	</style>
</head>
<body>
	@php
		$i = 1;	
	@endphp
	<table>
		<tr>
			<td class="left">
				<h2>COTIZACIÓN</h2>
				<h2>N° {{ $cotizacion->id }}</h2>
			</td>
			<td class="right">
				<img src="{{ url('/img/logo.png') }}">
			</td>
		</tr>
	</table>
	<p class="padding-left">Estimados señores:</p>
		<table class="left border-radius margin-top">
			<tr>
				<td class="right td-width">FECHA</td>
				<td colspan="3"><strong>{{ Carbon\Carbon::parse($cotizacion->created_at)->format('d-m-Y') }}</strong></td>
			</tr>
			<tr>
				<td class="right td-width">RAZÓN SOCIAL</td>
				<td colspan="3"><strong>{{ $cotizacion->contacto->razon_social }}</strong></td>
			</tr>
			<tr>
				<td class="right td-width">RUT</td>
				<td><strong>{{ $cotizacion->contacto->rut }}</strong></td>
				<td class="right">GIRO</td>
				<td><strong>{{ $cotizacion->contacto->giro }}</strong></td>
			</tr>
			<tr>
				<td class="right">DIRECCIÓN</td>
				<td style="width: 280px;"><strong>{{ $cotizacion->contacto->direccion }}</strong></td>
				<td class="right" style="width:40px;">CIUDAD</td>
				<td><strong>{{ $cotizacion->contacto->ciudad }}</strong></td>
			</tr>
		</table>
		<table class="left border-radius margin-top">
			<tr>
				<td class="right td-width">EMPRESA</td>
				<td style="width: 290px;"><strong>{{ $cotizacion->contacto->empresa }}</strong></td>
				<td class="right" style="width: 50px">MAIL</td>
				<td><strong>{{ $cotizacion->contacto->email_empresa }}</strong></td>
			</tr>
			<tr>
				<td class="right td-width">CONTACTO</td>
				<td><strong>{{ $cotizacion->contacto->nombre_contacto }}</strong></td>
				<td class="right">FONO</td>
				<td><strong>{{ $cotizacion->contacto->fono_contacto }}</strong></td>
			</tr>
		</table>
		<p class="padding-left padding-top">
			De nuestra consideración, sírvase a recibir la cotización de los siguientes productos:
		</p>
		<div class="border-radius margin-top">
			<table class="custom-table">
				<tr>
					<th></th>
					<th class="center">CODIGO</th>
					<th class="center">CANTIDAD</th>
					<th class="left">DESCRIPCIÓN</th>
					<th class="center">UNITARIO</th>
					<th class="center">TOTAL</th>
				</tr>
				@foreach($cotizacion->productos as $producto)
					<tr>
						<td style="width: 15px" class="border-bottom-td center small">{{ $i }}</td>
						<td class="border-bottom-td center" style="width:70px"><strong>{{ $producto->codigo }}</strong></td>
						<td class="border-bottom-td center" style="width:70px"><strong>{{ $producto->pivot->cantidad }}</strong></td>
						<td class="border-bottom-td"><strong>{{ $producto->descripcion }}</strong></td>
						<td class="border-td right" style="width:90px"><strong>{{ number_format($producto->unitario, 2, ',', '.') }}</strong></td>
						<td class="border-td right" style="width:90px"><strong>{{ number_format($producto->pivot->total, 0, '', '.') }}</strong></td>
					</tr>
					@php
						$i++;	
					@endphp
				@endforeach
				<tr>
					<td style="height: 20px" colspan="6"></td>
				</tr>
			</table>
			<table>
				<tr>
					<td style="width: 75%"></td>
					<td style="width: 10%" class="right">NETO</td>
					<td style="width: 15%" class="right"><strong class="padding-right">{{ number_format($cotizacion->neto, 0, '', '.') }}</strong></td>
				</tr>
				<tr>
					<td style="width: 75%"></td>
					<td style="width: 10%" class="right">IVA</td>
					<td style="width: 15%" class="right"><strong class="padding-right">{{ number_format($cotizacion->iva, 0, '', '.') }}</strong></td>
				</tr>
				<tr>
					<td style="width: 75%"></td>
					<td style="width: 10%" class="right">TOTAL</td>
					<td style="width: 15%" class="right"><strong class="padding-right">{{ number_format($cotizacion->total, 0, '', '.') }}</strong></td>
				</tr>
			</table>
		</div>
		<p class="padding-left padding-top">
			Esperando una buena acogida se despide muy atentamente,
		</p>
		<table style="margin-top:80px">
			<tr>
				<td style="width: 60%"></td>
				<td style="width: 40%" class="border-top center"><strong>Imprenta Montaris Ltda.</strong></td>
			</tr>
		</table>
		<table style="margin-top:30px">
			<tr>
				<td class="center">
					<strong>Imprenta Montaris Ltda. - 76.098.470-1 - Yungay 710 - Fono 63 212196 - 63 270726</strong>
				</td>
			</tr>
			<tr>
				<td class="center">
					<strong>montaris@surnet.cl - Valdivia - Imprenta</strong>
				</td>
			</tr>
		</table>
</body>
</html>