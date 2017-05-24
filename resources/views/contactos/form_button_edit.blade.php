<div class="form-group text-right">
	<div class="row">
		<div class="col-md-6"></div>
		<div class="col-md-1 col-xs-12">
			<a href="{{ url('/contactos/') }}" class="btn btn-default btn-lg">REGRESAR</a>
		</div>
		<div class="col-md-2 col-xs-12">
			<a href="{{ url('/contactos/'.$contacto->id.'/edit') }}" class="btn btn-warning btn-lg">EDITAR</a>
		</div>
	</div>
</div>