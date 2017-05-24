@extends('layouts.app')

@section('content')
	<div class="relative">
		<div class="row">
      <div class="col-xs-12">
          <h1 class="page-head-line">ORDEN DE TRABAJO N° {{ $orden->id }}</h1>
      </div>
	  </div>
	  <div class="row">
			<div class="col-md-12">
				@include('ordenes/form_show', ['method' => 'POST', 'orden' => $orden, 'url' => '/ordenes', 'option' => 'readonly', 'i' => '1', 'filas' => $filas, 'hidden' => 'hidden', 'edit' => '', 'pagado' => $pagado, 'pendiente' => $pendiente])
			</div>
		</div>
		<div class="float">
			<table>
				<tr>
					<td>
						<a href="{{ url('/ordenes') }}" class="btn btn-default btn-lg margin-r">
							<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
							REGRESAR
						</a>
					</td>
					<td>
						<a href="{{ url('/ordenes/'.$orden->id.'/edit') }}" class="btn btn-warning btn-lg margin-r">
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							EDITAR
						</a>
					</td>
					<td>@include('ordenes.delete', ['orden' => $orden, 'class' => 'btn btn-danger btn-lg'])</td>
				</tr>
			</table>
		</div>
		<div class="float-bottom">
			<table>
				<tr>
					<td>
						<a href="{{ url('/ordenes/pdf/'.$orden->id) }}" target="_blank_" class="btn btn-info btn-lg margin-r">
							<span class="glyphicon glyphicon-print" aria-hidden="true"></span>
							IMPRIMIR
						</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
@endsection