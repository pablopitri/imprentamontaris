{!! Form::open(['url' => $url, 'method' => $method ]) !!}
	<div class="row">
		<div class="col-xs-6">
			<div class="row">
				<div class="col-xs-4 padding-cero-right">
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="max-width">
								<tr>
									<td class="custom-table"><label for="id" class="margin-r">N°</label></td>
									<td class="custom-table">{{ Form::text('id', $orden->id, ['class' => 'form-control', 'readonly' => 'true']) }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-xs-8 padding-siete-left padding-cero-right">
					<div class="panel panel-default">
						<div class="panel-body">
							<table class="max-width">
								<tr>
									<td class="custom-table"><label for="id_chile_compra">ID CHILE COMPRA</label></td>
									<td class="custom-table">{{ Form::text('id_chile_compra', $orden->id_chile_compra, ['class' => 'form-control', 'option' => 'true']) }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
				<div class="row">
					<div class="col-xs-12 padding-cero-right">
						<div class="panel panel-default">
							<div class="panel-body">
								<table>
									<tr>
										<td><label class="control-label col-xs-2" for="email">EMPRESA</label></td>
										<td>{{ Form::text('empresa', $orden->contacto->empresa, ['class' => 'form-control', $option => 'true', 'id' => 'empresa']) }}</td>
										<td><label class="control-label col-xs-1" for="fono_contacto">FONO</label></td>
										<td>{{ Form::tel('fono_contacto', $orden->contacto->fono_contacto, ['class' => 'form-control solo-numero', $option => 'true']) }}</td>
									</tr>
									<tr>
										<td><label class="control-label col-xs-2" for="nombre_contacto">CONTACTO</label></td>
										<td>{{ Form::text('nombre_contacto', $orden->contacto->nombre_contacto, ['class' => 'form-control', $option => 'true', 'required' => 'true']) }}</td>
										<td><label class="control-label col-xs-1" for="ciudad_empresa">CIUDAD</label></td>
										<td>{{ Form::text('ciudad_empresa', $orden->contacto->ciudad_empresa, ['class' => 'form-control', $option => 'true']) }}</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
		</div>

		<div class="col-xs-6 custom-height padding-siete-left">
			<div class="panel panel-default">
				<div class="panel-body custom-height">
					<table class="no-margin max-width">
						<tr>
							<td><label for="numero">OC</label></td>
							<td colspan="3">{{ Form::text('oc', $orden->oc, ['class' => 'form-control', 'option' => 'true']) }}</td>
						</tr>
						<tr>
							<td><label for="fecha_ingreso">INGRESO</label></td>
							<td>{{ Form::date('fecha_ingreso', Carbon\Carbon::parse($orden->fecha_ingreso)->format('d-m-Y'), ['class' => 'form-control datepicker', 'option' => 'true']) }}</td>
							<td><label for="fecha_entrega" class="padding-left">ENTREGA</label></td>
							<td>{{ Form::date('fecha_entrega', Carbon\Carbon::parse($orden->fecha_entrega)->format('d-m-Y'), ['class' => 'form-control datepicker', 'option' => 'true']) }}</td>
						</tr>
						<tr>
							<td><label for="rut">RUT</label></td>
							<td colspan="2">{{ Form::text('rut', $orden->contacto->rut, ['class' => 'form-control', $option => 'true', 'data-n' => '4', 'id' => 'rut', 'required' => 'true']) }}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>

		
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
				<label class="custom-label control-label col-xs-1" for="razon_social">RAZÓN&nbsp;SOCIAL</label>
				<div class="col-xs-7">
					{{ Form::text('razon_social', $orden->contacto->razon_social, ['class' => 'form-control',  $option => 'true', 'required' => 'true']) }}
				</div>
				<label class="custom-label control-label col-xs-1" for="fono_empresa">FONO</label>
				<div class="col-xs-3">
				{{ Form::tel('fono_empresa', $orden->contacto->fono_empresa, ['class' => 'form-control solo-numero', $option => 'true']) }}
				</div>
			</div>
	
			<div class="form-group">
				<br />
				<label class="custom-label control-label col-xs-1" for="nombre_fantasia">NOMBRE&nbsp;FANT.</label>
				<div class="col-xs-7">
					{{ Form::text('nombre_fantasia', $orden->contacto->nombre_fantasia, ['class' => 'form-control', $option => 'true']) }}
				</div>
				<label class="custom-label control-label col-xs-1" for="ciudad">CIUDAD</label>
				<div class="col-xs-3">
					{{ Form::text('ciudad', $orden->contacto->ciudad, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>

			<div class="form-group">
				<br>
				<label class="custom-label control-label col-xs-1" for="giro">GIRO</label>
				<div class="col-xs-7">
					{{ Form::text('giro', $orden->contacto->giro, ['class' => 'form-control', $option => 'true']) }}
				</div>
				<label class="custom-label control-label col-xs-1" for="comuna">COMUNA</label>
				<div class="col-xs-3">
					{{ Form::text('comuna', $orden->contacto->comuna, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>

			<div class="form-group">
				<br>
				<label class="custom-label control-label col-xs-1" for="direccion">DIRECCIÓN</label>
				<div class="col-xs-7">
					{{ Form::text('direccion', $orden->contacto->direccion, ['class' => 'form-control', $option => 'true']) }}
				</div>
				<label class="custom-label control-label col-xs-1" for="mail">MAIL&nbsp;EMPRESA</label>
				<div class="col-xs-3">
				{{ Form::email('mail', $orden->contacto->email_empresa, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>
			<div class="form-group">
				<br>
				<label class="custom-label control-label col-xs-1" for="comuna">SUCURSAL</label>
				<div class="col-xs-5">
					{{ Form::text('sucursal', $orden->contacto->sucursal, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-xs-1" for="nombre_contacto2">CONTACTO</label>
				<div class="col-xs-3">
					{{ Form::text('nombre_contacto2', $orden->contacto->nombre_contacto2, ['class' => 'form-control', $option => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="fono_contacto2">FONO</label>
				<div class="col-xs-3">
					{{ Form::tel('fono_contacto2', $orden->contacto->fono_contacto2, ['class' => 'form-control solo-numero', $option => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="email_contacto2">MAIL</label>
				<div class="col-xs-3">
					{{ Form::email('email_contacto2', $orden->contacto->email_contacto2, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>

			<div class="form-group">
				<br>
				<label class="control-label col-xs-1" for="nombre_contacto">CONTADOR</label>
				<div class="col-xs-3">
					{{ Form::text('nombre_contador', $orden->contacto->nombre_contador, ['class' => 'form-control', $option => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="fono_contador">FONO</label>
				<div class="col-xs-3">
					{{ Form::tel('fono_contador', $orden->contacto->fono_contador, ['class' => 'form-control solo-numero', $option => 'true']) }}
				</div>
				<label class="control-label col-xs-1" for="email_contador">MAIL</label>
				<div class="col-xs-3">
					{{ Form::email('email_contador', $orden->contacto->email_contador, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="max-width table custom-table table-bordered" id="js-table">
						<thead>
							<tr>
								<th style="width: 3%"></th>
								<th style="width: 9%">CÓDIGO</th>
								<th style="width: 10%">CANTIDAD</th>
								<th style="width: 58%">DESCRIPCIÓN</th>
								<th style="width: 10%">UNITARIO</th>
								<th style="width: 10%">TOTAL</th>
							</tr>
						</thead>
						<tbody>
							@for ($i = 1; $i <= 2; $i++)
							@php
								$required = ($i == 1) ? 'required' : '';
							@endphp
								<tr>
									<td>
										<p>{{ $i }}</p>
									</td>
									<td>
										<div class="form-group">
											{{ Form::text('codigo-'.$i , '', ['class' => 'form-control custom-input  solo-numero', 'id' => 'codigo-'.$i, $option => 'true', 'data-n' => '2', 'data-z' => '1']) }}
										</div>
									</td>
									<td>
										<div class="form-group">
											{{ Form::number('cantidad-'.$i, '', ['class' => 'form-control custom-input  solo-numero', 'id' => 'cantidad-'.$i, 'data-n' => '1', 'data-z' => '1', $option => 'true', $required => 'true']) }}
										</div>
									</td>
									<td>
										<div class="form-group">
											{{ Form::textarea('descripcion-'.$i, '', ['class' => 'form-control custom-input-desc','id' => 'descripcion-'.$i, $option => 'true', $required => 'true', 'data-z' => '1', 'rows' => '3']) }}
										</div>
									</td>
									<td>
										<div class="form-group">
											{{ Form::number('unitario-'.$i, '', ['class' => 'form-control custom-input solo-numero', 'id' => 'unitario-'.$i, 'data-n' => '1', $option => 'true', $required => 'true', 'data-z' => '1', 'step' => '0.01']) }}
										</div>
									</td>
									<td>
										<div class="form-group">
											{{ Form::text('total-'.$i, '', ['class' => 'form-control custom-input  solo-numero', 'readonly' => 'true', 'id' => 'total-'.$i, $required => 'true']) }}
										</div>
									</td>
								</tr>
							@endfor
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="row">

				<div class="col-xs-9 padding-cero-right">
					<div class="row">
						<div class="col-xs-12">
							<div class="panel panel-default">
								<div class="panel-body">
				
									<div class="form-group">
										<label class="custom-label control-label col-xs-1" for="papel">PAPEL</label>
										<div class="col-xs-5">
											{{ Form::text('papel', $orden->papel, ['class' => 'form-control', $option => 'true']) }}
										</div>
										<label class="custom-label control-label col-xs-1" for="tapa">TAPA</label>
										<div class="col-xs-5">
											{{ Form::text('tapa', $orden->tapa, ['class' => 'form-control', $option => 'true']) }}
										</div>
									</div>

									<div class="form-group">
										<br />
										<label class="custom-label control-label col-xs-1" for="folio">FOLIO</label>
										<div class="col-xs-3">
											{{ Form::text('folio', $orden->folio, ['class' => 'form-control', $option => 'true']) }}
										</div>
										<label class="custom-label control-label col-xs-1" for="inter">INTER.</label>
										<div class="col-xs-3">
											{{ Form::text('inter', $orden->inter, ['class' => 'form-control', $option => 'true']) }}
										</div>
										<label class="custom-label control-label col-xs-1" for="color">COLOR</label>
										<div class="col-xs-3">
											{{ Form::text('color', $orden->color, ['class' => 'form-control', $option => 'true']) }}
										</div>
									</div>

									<div class="form-group">
										<br />
										<label class="custom-label control-label col-xs-1" for="observacion">OBSERV.</label>
										<div class="col-xs-7">
											{{ Form::text('observacion', $orden->observacion, ['class' => 'form-control', $option => 'true']) }}
										</div>
										<label class="custom-label control-label col-xs-1" for="tamaño">TAMAÑO</label>
										<div class="col-xs-3">
											{{ Form::text('tamaño', $orden->tamaño, ['class' => 'form-control', $option => 'true']) }}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<table class="max-width">
										<tr>
											<th>CAMBIOS</th>
											<th style="width: 10%;">PRE</th>
											<th>CAMBIOS</th>
											<th style="width: 10%;">PRE</th>
										</tr>
										<tr>
											<td>ORIGINAL</td>
											<td>{{ Form::checkbox('pre1', '1', false) }}</td>
											<td>CUADRUPLICADO</td>
											<td>{{ Form::checkbox('pre4', '4', false) }}</td>
										</tr>
										<tr>
											<td>DUPLICADO</td>
											<td>{{ Form::checkbox('pre2', '2', false) }}</td>
											<td>QUINTUPLICADO</td>
											<td>{{ Form::checkbox('pre5', '5', false) }}</td>
										</tr>
										<tr>
											<td>TRIPLICADO</td>
											<td>{{ Form::checkbox('pre3', '3', false) }}</td>
											<td>SEXTUPLICADO</td>
											<td>{{ Form::checkbox('pre6', '6', false) }}</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xs-3 padding-siete-left">
					<div class="row">
						<div class="col-xs-12">
							<div class="panel panel-default">
								<div class="panel-body">	
									<div class="row">
										<div class="form-group">
									    <label class="control-label col-xs-3" for="email">NETO</label>
									    <div class="col-xs-9">
									    	{{ Form::text('neto', $orden->neto, ['class' => 'form-control custom-input  solo-numero','id' => 'neto', 'readonly' => 'true']) }}
									    </div>
									  </div>
									</div>
									<div class="row margin-top-sm">
										<div class="form-group">
									    <label class="control-label col-xs-3" for="email">IVA</label>
									    <div class="col-xs-9">
									      {{ Form::text('iva', $orden->iva, ['class' => 'form-control custom-input solo-numero','id' => 'iva', 'readonly' => 'true']) }}
									    </div>
									  </div>
									</div>
									<div class="row margin-top-sm">
										<div class="form-group">
									    <label class="control-label col-xs-3" for="email">TOTAL</label>
									    <div class="col-xs-9">
									      {{ Form::text('total', $orden->total, ['class' => 'form-control custom-input solo-numero','id' => 'total', 'readonly' => 'true']) }}
									    </div>
									  </div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<table class="max-width">
										<tr>
											<td>
												<label class="control-label" for="vendedor">ATENDIDO POR</label>
												{{ Form::text('vendedor', $orden->vendedor->nombre, ['class' => 'form-control custom-input','id' => 'vendedor', 'required' => 'true']) }}
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-hover max-width">
						<tr>
							<th style="text-align: center">FORMA PAGO</th>
							<th style="text-align: center">N° DOCTO.</th>
							<th style="text-align: center">BANCO</th>
							<th style="text-align: center">FECHA</th>
							<th style="text-align: center">MONTO</th>
							<th style="text-align: center;width: 50px;">PAGADO</th>
						</tr>
						@for ($i = 1; $i <= 3; $i++)
							<tr>
								<td>{{ Form::text('forma_pago'.$i, $orden->pago->forma_pago, ['class' => 'form-control custom-input', 'id'=> 'forma-'.$i]) }}</td>
								<td>{{ Form::text('numero_documento'.$i, $orden->pago->numero_documento, ['class' => 'form-control custom-input  solo-numero']) }}</td>
								<td>{{ Form::text('banco'.$i, $orden->pago->banco, ['class' => 'form-control custom-input']) }}</td>
								<td>{{ Form::date('fecha'.$i, '', ['class' => 'form-control custom-input getdate']) }}</td>
								<td>{{ Form::number('monto'.$i, $orden->pago->monto, ['class' => 'form-control custom-input solo-numero', 'id' => 'monto-'.$i]) }}</td>
								<td style="text-align: center">{{ Form::checkbox('pagado-'.$i, '1','', ['id' => 'pagado-'.$i]) }}</td>
							</tr>
						@endfor
					</table>
					<div class="row">
						<div class="col-xs-8"></div>
						<div class="col-xs-4">
							<table class="max-width">
								<tr>
									<td>PENDIENTE</td>
									<td><strong id="pendiente" class="margin-r">0</strong></td>
									<td>PAGADO</td>
									<td><strong id="pagado">0</strong></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<input type="text" name="filas" id="filas" hidden="true" value="2">
	<input type="button" id="btnAdd" value="+" hidden="true" />
	@if(!$option)
		<div class="float-bottom">
			<table>
				<tr>
					<td>
						<a href="{{ url('/ordenes/'.$orden->contacto->id) }}" class="btn btn-default btn-lg margin-r">
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