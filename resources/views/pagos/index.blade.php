@extends('layouts.app')

@section('content')
	<div class="relative">
		<div class="row">
      <div class="col-xs-12">
          <h1 class="page-head-line">RECAUDACIONES DIARIAS</h1>
      </div>
	  </div>
	  
	  <div class="float">
	  	<table>
        <tr>
          <td>
            <a href="{{ url('/pagos') }}" id="back" class="btn btn-default btn-lg margin-r hidden">
              <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
              REGRESAR
            </a>
          </td>
        </tr>
      </table>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="max-width">
							<tr>
								<td><label class="control-label" for="search-fecha_inicio">FECHA&nbsp;INICIO</label></td>
								<td><input type="text" name="search-fecha_inicio" id="search-fecha_inicio" class="datepicker" data-n='search'></td>
								<td><label class="control-label" for="search-fecha_final">FECHA FINAL</label></td>
								<td><input type="text" name="search-fecha_final" id="search-fecha_final" class="datepicker" data-n='search'></td>
								<td colspan="2" style="text-align: center;">
									<button class="btn btn-default" id="buscar-pagos">
										<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
										BUSCAR
									</button>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row margin-top" id="resultado">
			<div class="col-md-12">
				@if(count($pagos))
					@php
						$i = count($pagos);
					@endphp
					<div class="table-responsive">
						<table class="table table-bordered" style="text-align: center">
							<thead>
								<tr>
									<th class="center">N°</th>
									<th class="center">FECHA</th>
									<th class="center">RECAUDACIÓN</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($pagos as $pago)
									<tr>
										<td>
											<a href="{{ url('pagos/'.$pago->fecha) }}">
												{{ $i-- }}
											</a>
										</td>
										<td>{{ date('d-m-Y', strtotime($pago->fecha)) }}</td>
										<td><strong>$ {{ number_format($pago->recaudacion($pago->fecha), 0, '', '.') }}</strong></td>
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
		<div class="row" id="paginacion">
			<div class="col-xs-12">
				{{ $pagos->links() }}
			</div>
		</div>
	</div>
@endsection