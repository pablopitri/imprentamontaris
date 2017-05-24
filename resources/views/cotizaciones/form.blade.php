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
										{{ Form::number('codigo-'.$i , '', ['class' => 'form-control custom-input solo-numero', 'id' => 'codigo-'.$i, $option => 'true', 'data-n' => '2', 'data-z' => '1']) }}
									</div>
								</td>
								<td>
									<div class="form-group">
										{{ Form::number('cantidad-'.$i, '', ['class' => 'form-control custom-input solo-numero', 'id' => 'cantidad-'.$i, 'data-n' => '1', 'data-z' => '1', $option => 'true', $required => 'true']) }}
									</div>
								</td>
								<td>
									<div class="form-group">
										{{ Form::textarea('descripcion-'.$i, '', ['class' => 'form-control custom-input-desc','id' => 'descripcion-'.$i, 'data-z' => '1', $option => 'true', $required => 'true', 'rows' => '3']) }}
									</div>
								</td>
								<td>
									<div class="form-group">
										{{ Form::number('unitario-'.$i, '', ['class' => 'form-control custom-input solo-numero', 'id' => 'unitario-'.$i, 'data-n' => '1', 'data-z' => '1', $option => 'true', $required => 'true', 'step' => '0.01']) }}
									</div>
								</td>
								<td>
									<div class="form-group">
										{{ Form::text('total-'.$i, '', ['class' => 'form-control custom-input solo-numero', 'readonly' => 'true', 'id' => 'total-'.$i, $required => 'true']) }}
									</div>
								</td>
							</tr>
						@endfor
					</tbody>
				</table>
				<hr />
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="form-group">
							{{ Form::textarea('observacion', $cotizacion->observacion, ['class' => 'form-control custom-textarea', 'placeholder' => 'Observaciones','id' => 'observacion', 'rows' => '6', 'option' => 'true']) }}
						</div>
					</div>	
					<div class="col-xs-12 col-md-1"></div>
					<div class="col-xs-12 col-md-3">
						<div class="row">
							<div class="form-group">
						    <label class="control-label col-xs-3" for="email">NETO</label>
						    <div class="col-xs-9">
						    	{{ Form::text('neto', $cotizacion->neto, ['class' => 'form-control custom-input','id' => 'neto', 'readonly' => 'true']) }}
						    </div>
						  </div>
						</div>
						<div class="row">
							<div class="form-group">
						    <label class="control-label col-xs-3" for="email">IVA</label>
						    <div class="col-xs-9">
						      {{ Form::text('iva', $cotizacion->iva, ['class' => 'form-control custom-input','id' => 'iva', 'readonly' => 'true']) }}
						    </div>
						  </div>
						</div>
						<div class="row">
							<div class="form-group">
						    <label class="control-label col-xs-3" for="email">TOTAL</label>
						    <div class="col-xs-9">
						      {{ Form::text('total', $cotizacion->total, ['class' => 'form-control custom-input','id' => 'total', 'readonly' => 'true']) }}
						    </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<input type="text" name="filas" id="filas" hidden="true" value="2">
<input type="button" id="btnAdd" value="+" hidden="true" />
<div class="float-bottom">
			<table>
				<tr>
					<td>
						<a href="{{ url('/cotizaciones/'.$cotizacion->contacto->id) }}" class="btn btn-default btn-lg margin-r">
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
{!! Form::close() !!}