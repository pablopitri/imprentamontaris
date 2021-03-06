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
									<td class="custom-table">{{ Form::text('id_chile_compra', $orden->id_chile_compra, ['class' => 'form-control', $option => 'true']) }}</td>
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
										<td>{{ Form::text('nombre_contacto', $orden->contacto->nombre_contacto, ['class' => 'form-control', $option => 'true']) }}</td>
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
							<td colspan="3">{{ Form::text('oc', $orden->oc, ['class' => 'form-control', $option => 'true']) }}</td>
						</tr>
						<tr>
							<td><label for="fecha_ingreso">INGRESO</label></td>
							<td>{{ Form::text('fecha_ingreso', Carbon\Carbon::parse($orden->fecha_ingreso)->format('d-m-Y'), ['class' => 'form-control datepicker', $option => 'true']) }}</td>
							<td><label for="fecha_entrega" class="padding-left">ENTREGA</label></td>
							<td>{{ Form::text('fecha_entrega', Carbon\Carbon::parse($orden->fecha_entrega)->format('d-m-Y'), ['class' => 'form-control datepicker', $option => 'true']) }}</td>
						</tr>
						<tr>
							<td><label for="rut">RUT</label></td>
							<td colspan="2">{{ Form::text('rut', $orden->contacto->rut, ['class' => 'form-control', $option => 'true', 'data-n' => '4', 'id' => 'rut']) }}</td>
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
					{{ Form::text('razon_social', $orden->contacto->razon_social, ['class' => 'form-control',  $option => 'true']) }}
				</div>
				<label class="custom-label control-label col-xs-1" for="fono_empresa">FONO</label>
				<div class="col-xs-3">
				{{ Form::tel('fono_empresa', $orden->contacto->fono_empresa, ['class' => 'form-control solo-numero', $option => 'true']) }}
				</div>
			</div>
	
			<div class="form-group">
				<br />
				<label class="custom-label control-label col-xs-1" for="nombre_fantasia">N. FANTASIA</label>
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
				<label class="custom-label control-label col-xs-1" for="mail">MAIL</label>
				<div class="col-xs-3">
				{{ Form::email('mail', $orden->contacto->email_empresa, ['class' => 'form-control', $option => 'true']) }}
				</div>
			</div>
			<div class="form-group">
				<br>
				<label class="custom-label control-label col-xs-1" for="comuna">SUCURSAL</label>
				<div class="col-xs-6">
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
							@foreach($orden->productos as $producto)
							@php
								$required = ($i === 1) ? 'required' : '';
							@endphp
								<tr>
									<td>
										@if($edit)
											<div class="cancel" id="{{ 'cancel-'.$i }}">
												<p class="no-margin" id="{{ 'cancel-'.$i }}">{{ $i }}</p>
												<span class="glyphicon glyphicon-remove hidden" id="{{ 'cancel-'.$i }}" aria-hidden="true" style="color: red;"></span>
											</div>
										@else
											<div>
												<p class="no-margin">{{ $i }}</p>
											</div>
										@endif
									</td>
									<td>
										<div class="form-group">
											{{ Form::text('codigo-'.$i , $producto->codigo, ['class' => 'form-control custom-input solo-numero', 'id' => 'codigo-'.$i, $option => 'true', 'data-n' => '2', 'data-z' => '1']) }}
										</div>
									</td>
									<td>
										<div class="form-group">
											{{ Form::number('cantidad-'.$i, $producto->pivot->cantidad, ['class' => 'form-control custom-input solo-numero', 'id' => 'cantidad-'.$i, 'data-n' => '1', $option => 'true', 'data-z' => '1', $required => 'true']) }}
										</div>
									</td>
									<td>
										<div class="form-group">
											{{ Form::textarea('descripcion-'.$i, $producto->descripcion, ['class' => 'form-control custom-input-desc','id' => 'descripcion-'.$i, $option => 'true', 'data-z' => '1',$required => 'true', 'rows' => '3']) }}
										</div>
									</td>
									<td>
										<div class="form-group">
											{{ Form::number('unitario-'.$i, $producto->unitario, ['class' => 'form-control custom-input solo-numero', 'id' => 'unitario-'.$i, 'data-n' => '1', $option => 'true', 'data-z' => '1', $required => 'true', 'step' => '0.01']) }}
										</div>
									</td>
									<td>
										<div class="form-group">
											{{ Form::text('total-'.$i, $producto->pivot->total, ['class' => 'form-control custom-input solo-numero', 'readonly' => 'true', 'id' => 'total-'.$i]) }}
										</div>
									</td>
								</tr>
								@php
								  $i++;
								@endphp
							@endforeach
							@if ($edit)
								@php
									$i = $filas + 1;
								@endphp
								<tr>
									<td>
										<div class="cancel" id="{{ 'cancel-'.$i }}">
											<p class="no-margin" id="{{ 'cancel-'.$i }}">{{ $i }}</p>
											<span class="glyphicon glyphicon-remove hidden" id="{{ 'cancel-'.$i }}" aria-hidden="true" style="color: red;"></span>
										</div>
									</td>
									<td>
										<div class="form-group">
											{{ Form::text('codigo-'.$i , '', ['class' => 'form-control custom-input solo-numero', 'id' => 'codigo-'.$i, $option => 'true', 'data-n' => '2', 'data-z' => '1']) }}
										</div>
									</td>
									<td>
										<div class="form-group">
											{{ Form::number('cantidad-'.$i, '', ['class' => 'form-control custom-input solo-numero', 'id' => 'cantidad-'.$i, 'data-n' => '1', $option => 'true', 'data-z' => '1']) }}
										</div>
									</td>
									<td>
										<div class="form-group">
											{{ Form::text('descripcion-'.$i, '', ['class' => 'form-control custom-input-desc', 'id' => 'descripcion-'.$i, $option => 'true', 'data-z' => '1']) }}
										</div>
									</td>
									<td>
										<div class="form-group">
											{{ Form::number('unitario-'.$i, '', ['class' => 'form-control custom-input', 'id' => 'unitario-'.$i, 'data-n' => '1', $option => 'true', 'data-z' => '1']) }}
										</div>
									</td>
									<td>
										<div class="form-group">
											{{ Form::text('total-'.$i, '', ['class' => 'form-control custom-input solo-numero', 'readonly' => 'true', 'id' => 'total-'.$i]) }}
										</div>
									</td>
								</tr>
							@endif
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
								@php
									$d = ($option) ? 'disabled' : '';
								@endphp
									<table class="max-width">
										<tr>
											<th>CAMBIOS</th>
											<th style="width: 25%"></th>
											<th style="width: 10%;" class="center">PRE</th>
											<th>CAMBIOS</th>
											<th style="width: 25%"></th>
											<th style="width: 10%;" class="center">PRE</th>
										</tr>
										<tr>
											<td>ORIGINAL</td>
											<td>{{ Form::text('desc-1', isset($pre[1]) ? $pre[1] : '', ['class' => 'form-control', $option => 'true']) }}</td>
											<td class="center">{{ Form::checkbox('pre1', '1', isset($pre[1]) ? 1 : 0 , [$d => 'true'] ) }}</td>
											<td>CUADRUPLICADO</td>
											<td>{{ Form::text('desc-4', isset($pre[4]) ? $pre[4] : '', ['class' => 'form-control', $option => 'true']) }}</td>
											<td class="center">{{ Form::checkbox('pre4', '4', isset($pre[4]) ? 1 : 0 , [$d => 'true'] ) }}</td>
										</tr>
										<tr>
											<td>DUPLICADO</td>
											<td>{{ Form::text('desc-2', isset($pre[2]) ? $pre[2] : '', ['class' => 'form-control', $option => 'true']) }}</td>
											<td class="center">{{ Form::checkbox('pre2', '2', isset($pre[2]) ? 1 : 0 , [$d => 'true'] ) }}</td>
											<td>QUINTUPLICADO</td>
											<td>{{ Form::text('desc-5', isset($pre[5]) ? $pre[5] : '', ['class' => 'form-control', $option => 'true']) }}</td>
											<td class="center">{{ Form::checkbox('pre5', '5', isset($pre[5]) ? 1 : 0 , [$d => 'true'] ) }}</td>
										</tr>
										<tr>
											<td>TRIPLICADO</td>
											<td>{{ Form::text('desc-3', isset($pre[3]) ? $pre[3] : '', ['class' => 'form-control', $option => 'true']) }}</td>
											<td class="center">{{ Form::checkbox('pre3', '3', isset($pre[3]) ? 1 : 0 , [$d => 'true'] ) }}</td>
											<td>SEXTUPLICADO</td>
											<td>{{ Form::text('desc-6', isset($pre[6]) ? $pre[6] : '', ['class' => 'form-control', $option => 'true']) }}</td>
											<td class="center">{{ Form::checkbox('pre6', '6', isset($pre[6]) ? 1 : 0 , [$d => 'true'] ) }}</td>
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
									    	{{ Form::text('neto', $orden->neto, ['class' => 'form-control custom-input solo-numero','id' => 'neto', 'readonly' => 'true']) }}
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
												{{ Form::text('vendedor', $orden->vendedor->nombre, ['class' => 'form-control custom-input','id' => 'vendedor', $option => 'true']) }}
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
						@if(count($orden->pagos) > 0)
							@php
								$i = 1;
							@endphp
							@foreach($orden->pagos as $pago)
								<tr>
									<td>{{ Form::text('forma_pago'.$i, $pago->forma_pago, ['class' => 'form-control custom-input', $option => 'true', 'id'=> 'forma-'.$i]) }}</td>
									<td>{{ Form::text('numero_documento'.$i, $pago->numero_documento, ['class' => 'form-control custom-input solo-numero', $option => 'true']) }}</td>
									<td>{{ Form::text('banco'.$i, $pago->banco, ['class' => 'form-control custom-input', $option => 'true']) }}</td>
									<td>{{ Form::text('fecha'.$i, Carbon\Carbon::parse($pago->fecha)->format('d-m-Y'), ['class' => 'datepicker form-control custom-input', $option => 'true']) }}</td>
									<td>{{ Form::number('monto'.$i, $pago->monto, ['class' => 'form-control custom-input', $option => 'true', 'id' => 'monto-'.$i]) }}</td>
									<td style="text-align: center">{{ Form::checkbox('pagado-'.$i, '1', $pago->pivot->pagado, [$d => 'true', 'id' => 'pagado-'.$i]) }}</td>
								</tr>
								@php
									$i++;
								@endphp
							@endforeach
						@endif
						@if (count($orden->pagos) < 1 && $edit)
							@for ($i = 1; $i <= 3; $i++)
								<tr>
									<td>{{ Form::text('forma_pago'.$i, '', ['class' => 'form-control custom-input', 'id'=> 'forma-'.$i]) }}</td>
									<td>{{ Form::text('numero_documento'.$i, '', ['class' => 'form-control custom-input']) }}</td>
									<td>{{ Form::text('banco'.$i, '', ['class' => 'form-control custom-input']) }}</td>
									<td>{{ Form::text('fecha'.$i, '', ['class' => 'form-control custom-input getdate']) }}</td>
									<td>{{ Form::number('monto'.$i, '', ['class' => 'form-control custom-input', 'id' => 'monto-'.$i]) }}</td>
									<td style="text-align: center">{{ Form::checkbox('pagado-'.$i, '1','', ['id' => 'pagado-'.$i]) }}</td>
								</tr>
							@endfor
						@endif
						@if (count($orden->pagos) > 0 && $edit)
							@for ($i = count($orden->pagos) + 1; $i <= 3; $i++)
								<tr>
									<td>{{ Form::text('forma_pago'.$i, '', ['class' => 'form-control custom-input', 'id'=> 'forma-'.$i]) }}</td>
									<td>{{ Form::text('numero_documento'.$i, '', ['class' => 'form-control custom-input']) }}</td>
									<td>{{ Form::text('banco'.$i, '', ['class' => 'form-control custom-input']) }}</td>
									<td>{{ Form::text('fecha'.$i, '', ['class' => 'form-control custom-input getdate']) }}</td>
									<td>{{ Form::number('monto'.$i, '', ['class' => 'form-control custom-input', 'id' => 'monto-'.$i]) }}</td>
									<td style="text-align: center">{{ Form::checkbox('pagado-'.$i, '1','', ['id' => 'pagado-'.$i]) }}</td>
								</tr>
							@endfor
						@endif
					</table>
					<div class="row">
						<div class="col-xs-8"></div>
						<div class="col-xs-4">
							<table class="max-width">
								<tr>
									<td>PENDIENTE</td>
									<td><strong id="pendiente" class="margin-r">{{ $pendiente }}</strong></td>
									<td>PAGADO</td>
									<td><strong id="pagado">{{ $pagado }}</strong></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<input type="text" name="filas" id="filas" hidden="true" value="{{ $filas + 1 }}">
@if($edit)
	<input type="button" id="btnAdd" value="+" hidden="true" />
@endif
<div class="row {{ $hidden }}">
	<div class="col-xs-8"></div>
	<div class="col-xs-4">
		<div class="form-group text-right">
			<a href="{{ url('/ordenes') }}" class="btn btn-default btn-lg margin-r">
				<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
				REGRESAR
			</a>
			<button type="submit" class="btn btn-success btn-lg">
				<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
				GUARDAR
			</button>
		</div>
	</div>
</div>
	
{!! Form::close() !!}