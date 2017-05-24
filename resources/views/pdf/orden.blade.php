<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>ORDEN N° {{ $orden->id }}</title>
	<style>
		body{
			height: 100%;
			width: 100%;
			padding: -45px -35px -80px -45px !important;
		}
		.body{
			background: yellow;
			width: 90% !important;
			height: 90% !important;
			padding: 45px 45px 30px 45px !important;
		}
		h2{
			margin-top: 0px !important;
			margin-bottom: 0px !important;
		}
		table{
			width: 100%;
		}
		table td{
			font-size: 13px;
		}
		img{
			width: 150px;
		}
		body{
			height: 100%;
		}
		h3{
			margin: 0;
			padding: 0;
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
		.bottom{
			height: 100%;
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
			border-right: solid 1px yellow;
			border-left: solid 1px yellow;
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
		.tbl{
			border-collapse: collapse;
   	 	border-spacing: 0;
		}
		.border-bottom-td{
			border-bottom: solid 1px #000;
		}
		.border-td{
			border-bottom: solid 1px #000;
			border-left: solid 1px #000;
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
	<div class="body">
		<table>
			<tr>
				<td class="left" rowspan="3">
					<img src="{{ url('/img/logo.png') }}">
				</td>
				<td class="right">
					<h2>ORDEN DE TRABAJO {{ $orden->id }}</h2>
				</td>
			</tr>
			<tr>
				<td>
					<div class="border-radius">
						<table>
							<tr>
								<td class="left"><h3>OC:</h3></td>
								<td class="right"><h3>{{ $orden->oc }}</h3></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<div class="border-radius">
						<table>
							<tr>
								<td class="left"><h3>FECHA INGRESO: </h3></td>
								<td class="right"><h3>{{ Carbon\Carbon::parse($orden->fecha_ingreso)->format('d-m-Y') }}</h3></td>
							</tr>
						</table>
					</div>
				</td>
			</tr>
			<tr>
				<td rowspan="2" class="border-radius">
						<table>
							<tr>
								<td class="center"><h3>ID CHILE COMPRA</h3></td>
							</tr>
							<tr>
								<td class="center" style="height: 22px"><h3>{{ $orden->id_chile_compra }}</h3></td>
							</tr>
						</table>
					</div>
				</td>
				<td>
					<div class="border-radius">
						<table>
							<tr>
								<td class="left"><h3>ENTREGA: </h3></td>
								<td class="right"><h3>{{ Carbon\Carbon::parse($orden->fecha_entrega)->format('d-m-Y') }}</h3></td>
							</tr>
						</table>
					</div>
				</td>
				<tr>
					<td>
						<div class="border-radius">
							<table>
								<tr>
									<td class="left"><h3>RUT</h3></td>
									<td class="right"><h3>{{ $orden->contacto->rut }}</h3></td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
			</tr>
		</table>
		<table class="left border-radius margin-top">
			<tr>
				<td class="right td-width">RAZÓN SOCIAL</td>
				<td colspan="3"><strong>{{ $orden->contacto->razon_social }}</strong></td>
			</tr>
			<tr>
				<td class="right td-width">NOMBRE FANT.</td>
				<td><strong>{{ $orden->contacto->razon_social }}</strong></td>
				<td class="right td-width">FONO</td>
				<td><strong>{{ $orden->contacto->fono_empresa }}</strong></td>
			</tr>
			<tr>
				<td class="right td-width">GIRO</td>
				<td><strong>{{ $orden->contacto->giro }}</strong></td>
				<td class="right td-width">CIUDAD</td>
				<td><strong>{{ $orden->contacto->ciudad }}</strong></td>
			</tr>
			<tr>
				<td class="right td-width">SUCURSAL</td>
				<td><strong>{{ $orden->contacto->sucursal }}</strong></td>
				<td class="right td-width">COMUNA</td>
				<td><strong>{{ $orden->contacto->comuna }}</strong></td>
			</tr>
			<tr>
				<td class="right td-width">DIRECCIÓN</td>
				<td><strong>{{ $orden->contacto->direccion }}</strong></td>
				<td class="right td-width">MAIL</td>
				<td><strong>{{ $orden->contacto->email_empresa }}</strong></td>
			</tr>
		</table>

		<table class="left border-radius margin-top">
			<tr>
				<td class="right td-width">EMPRESA</td>
				<td><strong>{{ $orden->contacto->empresa }}</strong></td>
				<td class="right td-width">CIUDAD</td>
				<td><strong>{{ $orden->contacto->ciudad_empresa }}</strong></td>
			</tr>
			<tr>
				<td class="right td-width">CONTACTO</td>
				<td><strong>{{ $orden->contacto->nombre_contacto }}</strong></td>
				<td class="right td-width">FONO</td>
				<td><strong>{{ $orden->contacto->fono_contacto }}</strong></td>
			</tr>
		</table>

		<table class="left border-radius margin-top">
			<tr>
				<td class="right td-width">CONTACTO</td>
				<td><strong>{{ $orden->contacto->nombre_contacto2 }}</strong></td>
				<td class="right td-width">FONO</td>
				<td><strong>{{ $orden->contacto->fono_contacto2 }}</strong></td>
			</tr>
			<tr>
				<td class="right td-width">CONTADOR</td>
				<td><strong>{{ $orden->contacto->nombre_contador }}</strong></td>
				<td class="right td-width">FONO</td>
				<td><strong>{{ $orden->contacto->fono_contador }}</strong></td>
			</tr>
		</table>

		<table class="left border-radius margin-top">
			<tr>
				<td>
					<table class="custom-table">
						<tr>
							<th class="center">CODIGO</th>
							<th class="center">CANTIDAD</th>
							<th class="left">DETALLE</th>
							<th class="center">UNITARIO</th>
							<th class="center">TOTAL</th>
						</tr>
						@foreach($orden->productos as $producto)
							<tr>
								<td class="border-bottom-td center" style="width:70px"><strong>{{ $producto->codigo }}</strong></td>
								<td class="border-bottom-td center" style="width:70px"><strong>{{ $producto->pivot->cantidad }}</strong></td>
								<td class="border-bottom-td"><strong>{{ $producto->descripcion }}</strong></td>
								<td class="border-td right" style="width:90px"><strong>{{ number_format($producto->unitario, 2, ',', '.') }}</strong></td>
								<td class="border-td right" style="width:90px"><strong>{{ number_format($producto->pivot->total, 0, '', '.') }}</strong></td>
							</tr>
						@endforeach
					</table>
					<table>
						<tr>
							<td style="width: 75%"></td>
							<td style="width: 10%" class="right">NETO</td>
							<td style="width: 15%" class="right"><strong class="padding-right">{{ number_format($orden->neto, 0, '', '.') }}</strong></td>
						</tr>
						<tr>
							<td style="width: 75%"></td>
							<td style="width: 10%" class="right">IVA</td>
							<td style="width: 15%" class="right"><strong class="padding-right">{{ number_format($orden->iva, 0, '', '.') }}</strong></td>
						</tr>
						<tr>
							<td style="width: 75%"></td>
							<td style="width: 10%" class="right">TOTAL</td>
							<td style="width: 15%" class="right"><strong class="padding-right">{{ number_format($orden->total, 0, '', '.') }}</strong></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<table class="border-radius margin-top">
			<tr>
				<td>PAPEL</td>
				<td><strong>{{ $orden->papel }}</strong></td>
				<td>TAPA</td>
				<td colspan="3"><strong>{{ $orden->tapa }}</strong></td>
			</tr>
			<tr>
				<td>FOLIO</td>
				<td><strong>{{ $orden->folio }}</strong></td>
				<td>INTER</td>
				<td><strong>{{ $orden->inter }}</strong></td>
				<td>COLOR</td>
				<td><strong>{{ $orden->color }}</strong></td>
			</tr>
			<tr>
				<td style="width: 100px;">OBSERVACION</td>
				<td colspan="3"><strong>{{ $orden->observacion }}</strong></td>
				<td>TAMAÑO</td>
				<td><strong>{{ $orden->tamaño }}</strong></td>
			</tr>
		</table>
			
		<table class="border-radius margin-top ">
			<tr>
				<th class="center">CAMBIO</th>
				<th style="width: 10%;">PRE.</th>
				<th class="center">CAMBIO</th>
				<th style="width: 10%;">PRE.</th>
			</tr>
			<tr>
				<td>ORIGINAL</td>
				<td>{{ Form::checkbox('pre1', '1', $pre[0] ) }}</td>
				<td>CUADRUPLICADO</td>
				<td>{{ Form::checkbox('pre4', '4', $pre[3] ) }}</td>
			</tr>
			<tr>
				<td>DUPLICADO</td>
				<td>{{ Form::checkbox('pre2', '2', $pre[1] ) }}</td>
				<td>QUINTUPLICADO</td>
				<td>{{ Form::checkbox('pre5', '5', $pre[4] ) }}</td>
			</tr>
			<tr>
				<td>TRIPLICADO</td>
				<td>{{ Form::checkbox('pre3', '3', $pre[2] ) }}</td>
				<td>SEXTUPLICADO</td>
				<td>{{ Form::checkbox('pre6', '6', $pre[5] ) }}</td>
			</tr>
		</table>

		<table class="margin-top">
			<tr>
			@php
				$saldo = 0;
				$pagado = 0;
			@endphp
				<td style="width:80%;" class="border-radius">
					<table class="custom-table">
						<tr>
							<th>FORMA PAGO</th>
							<th>N° DOCUMENTO</th>
							<th>BANCO</th>
							<th>FECHA</th>
							<th>MONTO</th>
						</tr>
						@foreach ($orden->pagos as $pago)
							@php
								$pagado += ($pago->pivot->pagado) ? $pago->monto : 0;
							@endphp
							<tr>
								<td class="border-bottom-td"><strong>{{ $pago->forma_pago }}</strong></td>
								<td class="border-bottom-td"><strong>{{ $pago->numero_documento }}</strong></td>
								<td class="border-bottom-td"><strong>{{ $pago->banco }}</strong></td>
								<td class="border-bottom-td"><strong>{{ Carbon\Carbon::parse($pago->fecha)->format('d-m-Y') }}</strong></td>
								<td class="border-bottom-td"><strong>{{ number_format($pago->monto, 0, '', '.') }}</strong></td>
							</tr>
						@endforeach
					</table>
					<table>
						<tr>
							<td style="width: 50%"></td>
							<td>PAGADO</td>
							<td><strong>{{ number_format($pagado, 0, '', '.') }}</strong></td>
							<td>SALDO</td>
							<td><strong>{{ number_format(($orden->total - $pagado), 0, '', '.') }}</strong></td>
						</tr>
					</table>
				</td>
				<td style="width:20%;" class="border-radius">
					<table>
						<tr>
							<td class="center">ATENDIDO POR:</td>
						</tr>
						<tr>
							<td class="center"><strong>{{ $orden->vendedor->nombre }}</strong></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<table style="margin-top:10px;font-size: 12px;">
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
	</div>
</body>
</html>