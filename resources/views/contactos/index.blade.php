@extends('layouts.app')

@section("content")
	<div class="relative">
		<div class="row">
	      <div class="col-md-12">
	          <h1 class="page-head-line">LISTA DE CONTACTOS </h1>
	      </div>
	  </div>

	  <div class="float">
	  	<table>
        <tr>
          <td>
            <a href="{{ url('/contactos') }}" id="back" class="btn btn-default btn-lg margin-r hidden">
              <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
              REGRESAR
            </a>
          </td>
          <td>
          	<a href="{{ url('/contactos/create') }}" class="btn btn-primary btn-lg">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
							NUEVO CONTACTO
						</a>
          </td>
        </tr>
      </table>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="max-width" >
							<tr>
								<td><label class="control-label" for="search-rut">RUT</label></td>
								<td><input type="text" name="search-rut" id="search-rut" data-n='search'></td>
								<td><label class="control-label" for="search-razon_social">RAZÓN SOC.</label></td>
								<td><input type="text" name="search-razon_social" id="search-razon_social" data-n='search'></td>
								<td><label class="control-label" for="search-nombre_contacto">NOMBRE CONT.</label></td>
								<td><input type="text" name="search-nombre_contacto" id="search-nombre_contacto" data-n='search'></td>
								<td><label class="control-label" for="search-cuidad">CUIDAD</label></td>
								<td><input type="text" name="search-ciudad" id="search-ciudad" data-n='search'></td>
								<td>
									<button class="btn btn-default" id="buscar-contacto">
										<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
										BUSCAR
									</button>
								</td>
							</tr>
							<tr>
								<td colspan="2"><a href="#" id="busqueda_avanzada">BÚSQUEDA AVANZADA</a></td>
							</tr>
							<tr id="tr-hidden" class="hidden">
								<td><label class="control-label" for="search-nombre_fantasia">NOMBRE FANT.</label></td>
								<td><input type="text" name="search-nombre_fantasia" id="search-nombre_fantasia" data-n='search'></td>
								<td><label class="control-label" for="search.giro">GIRO</label></td>
								<td><input type="text" name="search-giro" id="search-giro" data-n='search'>
								</td>
								<td><a href="#" id="mostrar_menos">MOSTRAR MENOS</a></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row margin-top" id="resultado">
			<div class="col-md-12">
				@if(count($contactos))
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<td>RUT</td>
								<td>RAZÓN SOCIAL</td>
								<td>NOMBRE FANT.</td>
								<td>NOMBRE CONTACTO</td>
								<td>GIRO</td>
								<td>CIUDAD</td>
								<td>FONO CONTACTO</td>
								<td>ACCIONES</td>
							</tr>
						</thead>
						<tbody>
							@foreach ($contactos as $contacto)
								<tr>
									<td>
										<a href="{{ url('contactos/'.$contacto->id) }}">
											{{ $contacto->rut }}
										</a>
									</td>
									<td>{{ $contacto->razon_social }}</td>
									<td>{{ $contacto->nombre_fantasia }}</td>
									<td>{{ $contacto->nombre_contacto }}</td>
									<td>{{ $contacto->giro }}</td>
									<td>{{ $contacto->ciudad }}</td>
									<td>{{ $contacto->fono_contacto }}</td>
									<td style="width: 100px">
										<table>
											<tr>
												<td>
													<a href="{{ url('/contactos/'.$contacto->id.'/edit') }}" class="btn btn-sm btn-warning margin-r">
														<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
														Editar
													</a>
												</td>
												<td>
													@include('contactos.delete', ['contacto' => $contacto, 'class' => 'btn btn-sm btn-danger'])
												</td>
											</tr>
										</table>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					<div class="row" id="paginacion">
						<div class="col-xs-12">
							{{ $contactos->links() }}
						</div>
					</div>
				@else
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-info">
							  NO HAY CONTACTOS PARA MOSTRAR
							</div>
						</div>
					</div>
					@endif
			</div>
		</div>	
	</div>
@endsection