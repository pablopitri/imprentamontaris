@extends('layouts.app')

@section("content")
	<div class="row">
      <div class="col-md-12">
          <h1 class="page-head-line">EDITAR COTIZACION</h1>
      </div>
  </div>
	<div class="row">
		<div class="col-md-12">
			@include('contactos/form_cotizacion', ['method' => 'PATCH', 'cotizacion' => $cotizacion, 'url' => '/cotizaciones/'.$cotizacion->id, 'option' => '', 'edit' => 'TRUE'])
			@include('cotizaciones/form_show', ['option' => '', 'i' => '1', 'filas' => $filas, 'hidden' => '', 'edit' => 'TRUE'])
		</div>
	</div>	
@endsection