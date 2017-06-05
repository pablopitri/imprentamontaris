{!! Form::open(['url' => $url, 'method' => $method, 'class' => 'form-horizontal', 'id' => 'cotizacion' ]) !!}
	
	<div class="row">
		<div class="col-xs-2">
			<div class="panel panel-default">
				<div class="panel-body">
						<table>
							<tr>
								<td class="custom-table"><label for="id" class="margin-r">N°</label></td>
								<td class="custom-table">{{ Form::text('id', $cotizacion->id, ['class' => 'form-control', 'readonly' => 'true']) }}</td>
							</tr>
						</table>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">

					<div class="form-group">
				    <label class="control-label col-xs-1" for="fecha">FECHA</label>
				    <div class="col-xs-5">
				    @php
				    	$datepicker = ($cotizacion->created_at) ? "datepicker" : "getdate"
				    @endphp
				      {{ Form::text('fecha', Carbon\Carbon::parse($cotizacion->created_at)->format('d-m-Y'), ['class' => 'form-control '.$datepicker, $option => 'true', 'id' => 'fecha']) }}
				    </div>
				  </div>
					
					<div class="form-group">
						<label class="control-label col-xs-1" for="rut">RUT</label>
						<div class="col-xs-5">
							{{ Form::text('rut', $cotizacion->contacto->rut, ['class' => 'form-control', $option => 'true', 'data-n' => '3', 'id' => 'rut', 'required' => 'true']) }}
						</div>
						<label class="control-label col-xs-1" for="email">EMPRESA</label>
						<div class="col-xs-5">
							{{ Form::text('empresa', $cotizacion->contacto->empresa, ['class' => 'form-control', $option => 'true', 'id' => 'empresa']) }}
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-xs-1" for="nombre_contacto">CONTACTO</label>
						<div class="col-xs-5">
							{{ Form::text('nombre_contacto', $cotizacion->contacto->nombre_contacto, ['class' => 'form-control', $option => 'true', 'id' => 'nombre_contacto', 'required' => 'true']) }}
						</div>
						<label class="control-label col-xs-1" for="fono_empresa">FONO</label>
						<div class="col-xs-5">
							{{ Form::tel('fono_empresa', $cotizacion->contacto->fono_empresa, ['class' => 'form-control solo-numero', $option => 'true', 'id' => 'fono_contacto']) }}
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-1" for="razon_social">RAZÓN&nbsp;SOCIAL</label>
						<div class="col-xs-11">
							{{ Form::text('razon_social', $cotizacion->contacto->razon_social, ['class' => 'form-control', $option => 'true', 'id' => 'razon_social', 'required' => 'true']) }}
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-1" for="giro">GIRO</label>
						<div class="col-xs-5">
							{{ Form::text('giro', $cotizacion->contacto->giro, ['class' => 'form-control', $option => 'true', 'id' => 'giro']) }}
						</div>
						<label class="control-label col-xs-1" for="ciudad">CIUDAD</label>
						<div class="col-xs-5">
							{{ Form::text('ciudad', $cotizacion->contacto->ciudad, ['class' => 'form-control', $option => 'true', 'id' => 'ciudad']) }}
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-1" for="giro">DIRECCIÓN</label>
						<div class="col-xs-5">
							{{ Form::text('direccion', $cotizacion->contacto->direccion, ['class' => 'form-control', $option => 'true', 'id' => 'direccion']) }}
						</div>
						<label class="control-label col-xs-1" for="mail">MAIL&nbsp;EMPRESA</label>
						<div class="col-xs-5">
							{{ Form::email('mail', $cotizacion->contacto->email_empresa, ['class' => 'form-control', $option => 'true', 'id' => 'mail']) }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>