@extends('layouts.app')

@section("content")
	<div class="row">
      <div class="col-md-12">
          <h1 class="page-head-line">NUEVA COTIZACION</h1>
      </div>
  </div>
	<div class="row">
		<div class="col-md-12">
			@include('contactos/form_cotizacion', ['method' => 'POST', 'cotizacion' => $cotizacion, 'url' => '/cotizaciones', 'option' => ''])
			@include('cotizaciones/form', ['option' => ''])
		</div>
	</div>	
@endsection