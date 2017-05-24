@extends('layouts.app')

@section('content')
  <div class="relative">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="page-head-line">{{ $contacto->razon_social }}</h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-xs-12">
    		@include('contactos.form', ['contacto' => $contacto, 'method' => '', 'url' => '', 'option' => 'readonly'])
    	</div>
    </div>
    <div class="float">
      <table>
        <tr>
          <td>
            <a href="{{ url('/contactos') }}" class="btn btn-default btn-lg margin-r">
              <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
              REGRESAR
            </a>
          </td>
          <td>
            <a href="{{ url('/contactos/'.$contacto->id.'/edit') }}" class="btn btn-warning btn-lg margin-r">
              <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
              EDITAR
            </a>
          </td>
          <td>
            @include('contactos.delete', ['contacto' => $contacto, 'class' => 'btn btn-danger btn-lg'])
          </td>
        </tr>
      </table>
    </div>
  </div>
@endsection

	