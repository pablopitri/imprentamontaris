@extends('layouts.app')

@section('content')
	<div class="relative">
		<div class="row">
      <div class="col-xs-12">
          <h1 class="page-head-line">COTIZACIONES</h1>
      </div>
	  </div>
	  
	  <div class="float">
	  	<table>
        <tr>
          <td>
            <a href="{{ url('/cotizaciones') }}" id="back" class="btn btn-default btn-lg margin-r hidden">
              <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
              REGRESAR
            </a>
          </td>
          <td>
          	<a href="{{ url('/cotizaciones/create') }}" class="btn btn-primary btn-lg">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							NUEVA COTIZACIÓN
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
								<td><label class="control-label" for="search-nombre_contacto">N°</label></td>
								<td><input type="number" class="solo-numero" name="search-id" id="search-id" data-n='search'></td>
								<td><label class="control-label" for="search-fecha_inicio">FECHA INICIO</label></td>
								<td><input type="text" name="search-fecha_inicio" id="search-fecha_inicio" class="datepicker" data-n='search'></td>
								<td><label class="control-label" for="search-fecha_final">FECHA FINAL</label></td>
								<td><input type="text" name="search-fecha_final" id="search-fecha_final" class="datepicker" data-n='search'></td>
								<td colspan="2" style="text-align: center;">
									<button class="btn btn-default" id="buscar-cotizaciones" data-w="1">
										<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
										BUSCAR
									</button>
								</td>
							</tr>
							<tr>
								<td colspan="2"><a href="#" id="busqueda_avanzada">BÚSQUEDA AVANZADA</a></td>
							</tr>
							<tr id="tr-hidden" class="hidden">
								<td><label class="control-label" for="search-rut">RUT</label></td>
								<td><input type="text" name="search-rut" id="search-rut" data-n='search'></td>
								<td><label class="control-label" for="search-razon_social">RAZÓN SOC.</label></td>
								<td><input type="text" name="search-razon_social" id="search-razon_social" data-n='search'>
								</td>
								<td><label class="control-label" for="search-cod_producto">CODIGO&nbsp;PROD.</label></td>
								<td><input type="text" name="search-cod_producto" id="search-cod_producto" data-n='search'>
								</td>
								<td><label class="control-label" for="search-nom_producto">NOMBRE&nbsp;PROD.</label></td>
								<td><input type="text" name="search-nom_producto" id="search-nom_producto" data-n='search'>
								</td>
							</tr>
							<tr id="tr-hidden" class="hidden">
								<td colspan="7"><a href="#" id="mostrar_menos">MOSTRAR MENOS</a></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row margin-top" id="resultado">
			<div class="col-md-12">
				@if(count($cotizaciones))
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>N°</td>
									<td>FECHA</td>
									<td>RAZÓN SOCIAL</td>
									<td>RUT</td>
									<td>NETO</td>
									<td>IVA</td>
									<td>TOTAL</td>
									<td>ACCIONES</td>
								</tr>
							</thead>
							<tbody>
								@foreach ($cotizaciones as $cotizacion)
									<tr>
										<td>
											<a href="{{ url('cotizaciones/'.$cotizacion->id) }}">
												{{ $cotizacion->id }}
											</a>
										</td>
										<td>{{ date('d/m/Y', strtotime($cotizacion->created_at)) }}</td>
										<td>{{ $cotizacion->contacto->razon_social }}</td>
										<td>{{ $cotizacion->contacto->rut }}</td>
										<td>$ {{ number_format($cotizacion->neto, 0, '', '.') }}</td>
										<td>$ {{ number_format($cotizacion->iva, 0, '', '.') }}</td>
										<td>$ {{ number_format($cotizacion->total, 0, '', '.') }}</td>
										<td style="width: 100px">
											<table>
												<tr>
													<td>
														<a href="{{ url('/cotizaciones/'.$cotizacion->id.'/edit') }}" class="btn btn-warning btn-sm margin-r">
															<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
															Editar
														</a>
													</td>
													<td>
														@include('cotizaciones.delete', ['cotizacion' => $cotizacion, 'class' => 'btn btn-sm btn-danger'])
													</td>
												</tr>
											</table>
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
							  NO HAY COTIZACIONES PARA MOSTRAR
							</div>
						</div>
					</div>
					@endif
			</div>
		</div>
		<div class="row" id="paginacion">
			<div class="col-xs-12">
				{{ $cotizaciones->links() }}
			</div>
		</div>
	</div>
@endsection