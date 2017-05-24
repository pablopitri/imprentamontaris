@extends('layouts.app')

@section("content")
	<div class="row">
      <div class="col-xs-12">
          <h1 class="page-head-line">EDITAR CONTACTO</h1>
      </div>
  </div>
	<div class="row">
		<div class="col-xs-12">
			@if (isset($notice))
				<strong>{{ $notice }}</strong>
			@endif
			@include('contactos/form', ['method' => 'PATCH', 'contacto' => $contacto, 'url' => '/contactos/'.$contacto->id, 'option' => ''])
		</div>
	</div>
@endsection