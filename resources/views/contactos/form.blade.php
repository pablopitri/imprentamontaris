{!! Form::open(['url' => $url, 'method' => $method ]) !!}
	<div class="panel panel-default">
		<div class="panel-heading">
		DATOS EMPRESA
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-xs-1" for="rut">RUT</label>
				<div class="col-xs-4">
				{{ Form::text('rut', $contacto->rut, ['class' => 'form-control', $option => 'true', 'required' => 'true', 'id' => 'rut']) }}
				</div>
				<label class="control-label col-xs-1" for="razon_social">RAZÓN&nbsp;SOCIAL</label>
				<div class="col-xs-6">
				{{ Form::text('razon_social', $contacto->razon_social, ['class' => 'form-control',  $option => 'true', 'required' => 'true']) }}
				</div>
			</div>
				
			<div class="form-group">
				<br>
				<label class="control-label col-xs-1" for="giro">GIRO</label>
				<div class="col-xs-6">
					{{ Form::text('giro', $contacto->giro, ['class' => 'form-control', $option => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="sucursal">SUCURSAL</label>
				<div class="col-xs-4">
					{{ Form::text('sucursal', $contacto->sucursal, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>
				
			<div class="form-group">
				<br>
				<label class="control-label col-xs-1" for="nombre_fantasia">NOMBRE&nbsp;FANT.</label>
				<div class="col-xs-6">
					{{ Form::text('nombre_fantasia', $contacto->nombre_fantasia, ['class' => 'form-control', $option => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="ciudad">CIUDAD</label>
				<div class="col-xs-4">
					{{ Form::text('ciudad', $contacto->ciudad, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>

			<div class="form-group">
				<br>
				<label class="control-label col-xs-1" for="comuna">COMUNA</label>
				<div class="col-xs-5">
					{{ Form::text('comuna', $contacto->comuna, ['class' => 'form-control', $option => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="direccion">DIRECCIÓN</label>
				<div class="col-xs-5">
					{{ Form::text('direccion', $contacto->direccion, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>

			<div class="form-group">
				<br>
				<label class="control-label col-xs-1" for="fono_empresa">FONO</label>
				<div class="col-xs-5">
					{{ Form::text('fono_empresa', $contacto->fono_empresa, ['class' => 'form-control solo-numero', $option => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="email_empresa">MAIL</label>
				<div class="col-xs-5">
					{{ Form::email('email_empresa', $contacto->email_empresa, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-default margin-top">
		<div class="panel-heading">
		DATOS CONTACTO
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-xs-1" for="email">EMPRESA</label>
				<div class="col-xs-3">
					{{ Form::text('empresa', $contacto->empresa, ['class' => 'form-control', $option => 'true', 'id' => 'empresa']) }}
				</div>
				<label class="control-label col-xs-1" for="email">CIUDAD</label>
				<div class="col-xs-3">
					{{ Form::text('ciudad_empresa', $contacto->ciudad_empresa, ['class' => 'form-control', $option => 'true', 'id' => 'ciudad_empresa']) }}
				</div>
			</div>

			<div class="form-group">
				<br>
				<label class="control-label col-xs-1" for="nombre_contacto">CONTACTO</label>
				<div class="col-xs-3">
					{{ Form::text('nombre_contacto', $contacto->nombre_contacto, ['class' => 'form-control', $option => 'true', 'required' => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="fono_contacto">FONO</label>
				<div class="col-xs-3">
					{{ Form::tel('fono_contacto', $contacto->fono_contacto, ['class' => 'form-control solo-numero', $option => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="mail">MAIL</label>
				<div class="col-xs-3">
					{{ Form::email('mail', $contacto->mail, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>
			
		</div>
	</div>

	<div class="panel panel-default margin-top">
		<div class="panel-heading">
		OTRO CONTACTO
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-xs-1" for="nombre_contacto2">CONTACTO</label>
				<div class="col-xs-3">
					{{ Form::text('nombre_contacto2', $contacto->nombre_contacto2, ['class' => 'form-control', $option => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="fono_contacto2">FONO</label>
				<div class="col-xs-3">
					{{ Form::tel('fono_contacto2', $contacto->fono_contacto2, ['class' => 'form-control solo-numero', $option => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="email_contacto2">MAIL</label>
				<div class="col-xs-3">
					{{ Form::email('email_contacto2', $contacto->email_contacto2, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>
			
		</div>
	</div>

	<div class="panel panel-default margin-top">
		<div class="panel-heading">
		DATOS CONTADOR
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-xs-1" for="nombre_contacto">CONTACTO</label>
				<div class="col-xs-3">
					{{ Form::text('nombre_contador', $contacto->nombre_contador, ['class' => 'form-control', $option => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="fono_contador">FONO</label>
				<div class="col-xs-3">
					{{ Form::tel('fono_contador', $contacto->fono_contador, ['class' => 'form-control solo-numero', $option => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="email_contador">MAIL</label>
				<div class="col-xs-3">
					{{ Form::email('email_contador', $contacto->email_contador, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>
		</div>
	</div>

	@if(!$option)
		<div class="float-bottom">
			<table>
				<tr>
					<td>
						<a href="{{ url('/contactos/'.$contacto->id) }}" class="btn btn-default btn-lg margin-r">
							<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
							REGRESAR
						</a>
					</td>
					<td>
						<button type="submit" class="btn btn-success btn-lg">
							<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
							GUARDAR
						</button>
						</td>
				</tr>
			</table>
		</div>
	@endif
	
{!! Form::close() !!}