@extends('layouts.app')

@section('content')
<div class="relative">
	<div class="row">
		<div class="col-xs-12">
			<h1 class="page-head-line">RECAUDACIONES DEL {{ date('d-m-Y', strtotime($fecha)) }}</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="col-md-12">
				@if(count($ordenes))
				<div class="table-responsive">
					<table class="table table-bordered" style="text-align: center">
						<thead>
							<tr>
								<th class="center">N° ORDEN</th>
								<th class="center">FECHA PAGO</th>
								<th class="center">TOTAL</th>
								<th class="center">ABONADO</th>
								<th class="center">MONTO PAGADO</th>
								<th class="center">PENDIENTE</th>
								<th class="center">ESTADO</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($ordenes as $orden)
							@php
								$abonado = 0;
								$pagado = 0;
							@endphp
							@foreach($orden->pagos as $pago)
								@php
									$abonado += ($pago->pivot->pagado && $pago->fecha === $fecha) ? $pago->monto : 0;
									$pagado += ($pago->pivot->pagado) ? $pago->monto : 0;
								@endphp
							@endforeach
							<tr>
								<td>
									<a href="{{ url('ordenes/'.$orden->id) }}">
										{{ $orden->id }}
									</a>
								</td>
								<td>{{ date('d-m-Y', strtotime($fecha)) }}</td>
								<td><strong>$ {{ number_format($orden->total, 0, '', '.') }}</strong></td>
								<td>
									<strong>
										$ {{ number_format($abonado, 0, '', '.') }}
									</strong>
								</td>
								<td><strong>$ {{ $pagado }}</strong></td>
								<td><strong>$ {{ $orden->total - $pagado }}</strong></td>
								<td class="no-padding">
									@if ($pagado < $orden->total)
										<div class="alert alert-danger no-margin">
											<strong>PENDIENTE</strong>
										</div>
									@else
										<div class="alert alert-success no-margin">
											<strong>PAGADO</strong>
										</div>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@else
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-info">
							NO HAY RECAUDACIONES PARA MOSTRAR
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
	<div class="float">
		<table>
			<tr>
				<td>
					<a href="{{ url('/pagos') }}" class="btn btn-default btn-lg margin-r">
						<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
						REGRESAR
					</a>
				</td>
			</tr>
		</table>
	</div>
	<div class="float-bottom">
			<table>
				<tr>
					<td>
						<h3>RECAUDACIÓN DÍA :&nbsp;</h3>
					</td>
					<td>
						<h2> $ {{ $total }}</h2>
				</tr>
			</table>
		</div>
</div>
@endsection

