@extends('layouts.app')

@section("content")
	<div class="row">
      <div class="col-md-12">
          <h1 class="page-head-line">EDITAR ORDEN DE TRABAJO N° {{ $orden->id }}</h1>
      </div>
  </div>
	<div class="row">
		<div class="col-md-12">
			@include('ordenes/form_show', ['method' => 'PATCH', 'orden' => $orden, 'url' => '/ordenes/'.$orden->id, 'option' => '', 'i' => '1', 'filas' => $filas, 'hidden' => '', 'edit' => 'true', 'pagado' => $pagado, 'pendiente' => $pendiente])
		</div>
	</div>	
@endsection