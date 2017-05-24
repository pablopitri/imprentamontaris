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
						@foreach($cotizacion->productos as $producto)
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
										{{ Form::number('unitario-'.$i, $producto->unitario, ['class' => 'form-control custom-input solo-numero', 'id' => 'unitario-'.$i, 'data-n' => '1', $option => 'true', 'data-z' => '1',$required => 'true', 'step' => '0.01']) }}
									</div>
								</td>
								<td>
									<div class="form-group">
										{{ Form::text('total-'.$i, $producto->pivot->total, ['class' => 'form-control custom-input solo-numero', 'placeholder' => 'Total', 'readonly' => 'true', 'id' => 'total-'.$i]) }}
									</div>
								</td>
							</tr>
							@php
							  $i++;
							@endphp
						@endforeach
						@if ($edit)
						@php
							$filas++;
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
										{{ Form::text('codigo-'.$i , '' ,['class' => 'form-control custom-input solo-numero', 'id' => 'codigo-'.$i, $option => 'true', 'data-n' => '2', 'data-z' => '1']) }}
									</div>
								</td>
								<td>
									<div class="form-group">
										{{ Form::number('cantidad-'.$i, '', ['class' => 'form-control custom-input solo-numero', 'id' => 'cantidad-'.$i, 'data-n' => '1', $option => 'true', 'data-z' => '1']) }}
									</div>
								</td>
								<td>
									<div class="form-group">
										{{ Form::textarea('descripcion-'.$i, '', ['class' => 'form-control custom-input-desc','id' => 'descripcion-'.$i, $option => 'true', 'data-z' => '1', 'rows' => '3']) }}
									</div>
								</td>
								<td>
									<div class="form-group">
										{{ Form::number('unitario-'.$i, '', ['class' => 'form-control custom-input solo-numero', 'id' => 'unitario-'.$i, 'data-n' => '1', $option => 'true', 'data-z' => '1', 'step' => '0.01']) }}
									</div>
								</td>
								<td>
									<div class="form-group">
										{{ Form::text('total-'.$i, '', ['class' => 'form-control custom-input solo-numero', 'placeholder' => 'Total', 'readonly' => 'true', 'id' => 'total-'.$i]) }}
									</div>
								</td>
							</tr>
						@endif
					</tbody>
				</table>
				<hr />
				<div class="row">
					<div class="col-xs-12 col-md-8">
						<div class="form-group">
							{{ Form::textarea('observacion', $cotizacion->observacion, ['class' => 'form-control custom-textarea', 'placeholder' => 'Observaciones','id' => 'observacion', 'rows' => '6', $option => 'true']) }}
						</div>
					</div>	
					<div class="col-xs-12 col-md-1"></div>
					<div class="col-xs-12 col-md-3">
						<div class="row">
							<div class="form-group">
						    <label class="control-label col-xs-3" for="email">NETO</label>
						    <div class="col-xs-9">
						    	{{ Form::text('neto', number_format($cotizacion->neto, 0, '', '.'), ['class' => 'form-control custom-input','id' => 'neto', 'readonly' => 'true']) }}
						    </div>
						  </div>
						</div>
						<div class="row">
							<div class="form-group">
						    <label class="control-label col-xs-3" for="email">IVA</label>
						    <div class="col-xs-9">
						      {{ Form::text('iva', number_format($cotizacion->iva, 0, '', '.'), ['class' => 'form-control custom-input','id' => 'iva', 'readonly' => 'true']) }}
						    </div>
						  </div>
						</div>
						<div class="row">
							<div class="form-group">
						    <label class="control-label col-xs-3" for="email">TOTAL</label>
						    <div class="col-xs-9">
						      {{ Form::text('total', number_format($cotizacion->total, 0, '', '.'), ['class' => 'form-control custom-input','id' => 'total', 'readonly' => 'true']) }}
						    </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<input type="text" name="filas" id="filas" hidden="true" value="{{ $filas }}">
@if($edit)
	<input type="button" id="btnAdd" value="+" hidden="true"/>
@endif
<div class="row {{ $hidden }}">
	<div class="col-xs-8"></div>
	<div class="col-xs-4">
		<div class="form-group text-right">
			<a href="{{ url('/cotizaciones') }}" class="btn btn-default btn-lg margin-r">
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