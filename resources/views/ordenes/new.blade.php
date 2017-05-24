@extends('layouts.app')

@section("content")
	<div class="row">
      <div class="col-md-12">
          <h1 class="page-head-line">NUEVA ORDEN DE TRABAJO</h1>
      </div>
  </div>
	<div class="row">
		<div class="col-md-12">
			@include('ordenes/form_show',['method' => 'POST', 'orden' => $orden, 'url' => '/ordenes', 'option' => '', 'i' => '1', 'filas' => $filas, 'hidden' => '', 'edit' => 'true'])
		</div>
	</div>	
@endsection