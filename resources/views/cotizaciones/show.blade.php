@extends('layouts.app')

@section('content')
	<div class="relative">
		<div class="row">
      <div class="col-xs-12">
          <h1 class="page-head-line">{{ $cotizacion->contacto->razon_social }}</h1>
      </div>
	  </div>
	  <div class="row">
			<div class="col-md-12">
				@include('contactos/form_cotizacion', ['method' => 'POST', 'cotizacion' => $cotizacion, 'url' => '/cotizaciones', 'option' => 'readonly'])
				@include('cotizaciones/form_show', ['option' => 'readonly', 'i' => '1', 'filas' => $filas, 'hidden' => 'hidden', 'edit' => ''])
			</div>
		</div>
		<div class="float">
			<table>
				<tr>
					<td>
						<a href="{{ url('/cotizaciones') }}" class="btn btn-default btn-lg margin-r">
							<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
							REGRESAR
						</a>
					</td>
					<td>
						<a href="{{ url('/cotizaciones/'.$cotizacion->id.'/edit') }}" class="btn btn-warning btn-lg margin-r">
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							EDITAR
						</a>
					</td>
					<td>@include('cotizaciones.delete', ['cotizacion' => $cotizacion, 'class' => 'btn btn-danger btn-lg'])</td>
				</tr>
			</table>
		</div>
		<div class="float-bottom">
			<table>
				<tr>
					<td>
						<a href="{{ url('/cotizaciones/pdf/'.$cotizacion->id) }}" target="_blank_" class="btn btn-info btn-lg margin-r">
							<span class="glyphicon glyphicon-print" aria-hidden="true"></span>
							IMPRIMIR
						</a>
					</td>
					<td>
						<a href="{{ url('/ordenes/new/'.$cotizacion->id) }}" class="btn btn-success btn-lg">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							NUEVA OT
						</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
@endsection