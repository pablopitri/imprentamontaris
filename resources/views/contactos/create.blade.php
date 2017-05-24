@extends('layouts.app')

@section("content")
	<div class="row">
      <div class="col-xs-12">
          <h1 class="page-head-line">NUEVO CONTACTO</h1>
      </div>
  </div>
	<div class="row">
		<div class="col-xs-12">
			@if (isset($notice))
				<div class="alert alert-danger">
				  {{ $notice }}
				</div>
			@endif
			@include('contactos/form', ['method' => 'POST', 'contacto' => $contacto, 'url' => '/contactos', 'option' => ''])
		</div>
	</div>
@endsection