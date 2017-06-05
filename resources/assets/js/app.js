
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 require('./rut');

 require('./jquery-ui.min');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
*/	
//FORMATO RUT
// formateará el RUT cada vez que se escriba en el campo y
// validará cuando el texto haya cambiado
// muestra un mensaje de error cuando el rut es inválido

$("#search-rut").rut({formatOn: 'keyup'});

$("#rut").rut({formatOn: 'keyup'}).on('rutInvalido', function(e) {
	if ($(this).val()) 
		alert("El rut " + $(this).val() + " es inválido");
});
// END FORMATO RUT
// SOLO NUMEROS
$(document).on('keydown', '.solo-numero', function(event){
	if(event.shiftKey)
	{
		return false;
	}

	if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 190)    {
		return true;
	}
	else {
		if (event.keyCode < 95) {
			if (event.keyCode < 48 || event.keyCode > 57) {
				return false;
			}
		} 
		else {
			if (event.keyCode < 96 || event.keyCode > 105) {
				return false;
			}
		}
	}
});
// END SOLO NUMEROS
// DATAPICKER
$.datepicker.regional['es'] = {
	closeText: 'Cerrar',
	prevText: '<Ant',
	nextText: 'Sig>',
	currentText: 'Hoy',
	monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	weekHeader: 'Sm',
	dateFormat: 'dd-mm-yy',
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);

$(".datepicker").datepicker();

$(".getdate").datepicker().datepicker("setDate", new Date());

// END DATAPICKER

$("input[id*='pagado']").change(function(){
	var input = $(this).attr("id");
	var input = input.split('-');
	var n = input[1];
	if($(this).is(':checked'))
	{
		var deuda = new Number($("#total").val());
		if(deuda > 0)
		{
			if( $(`#forma-${n}`).val() !== undefined && $(`#monto-${n}`).val() !== undefined)
			{
				var pagado = totalPago();
				if(deuda >= pagado)
				{
					var pendiente = (deuda - pagado);
					pago(pendiente);
					$("#pagado").html(pagado);
				}else{
					$(this).prop("checked", "");
					alert("ERROR, EL MONTO TOTAL NO PUEDE SER MAYOR AL PAGADO")
				}
			}
		}
	}else if(!($(this).is(':checked')))
	{
		if( $(`#forma-${n}`).val() !== undefined && $(`#monto-${n}`).val() !== undefined)
		{
			var deuda = new Number($("#total").val());
			var pagado = totalPago();
			var pendiente = (deuda - pagado);
			pago(pendiente);
			$("#pagado").html(pagado);
		}
	}
});

function totalPago(){
	var pagado = 0;

	var monto1 = ($("#pagado-1").is(':checked')) ? new Number($("#monto-1").val()) : 0;
	var monto2 = ($("#pagado-2").is(':checked')) ? new Number($("#monto-2").val()) : 0;
	var monto3 = ($("#pagado-3").is(':checked')) ? new Number($("#monto-3").val()) : 0;

	pagado = (monto1 + monto2 + monto3);
	return pagado;
}
function pago(total){
	$("#pendiente").html(total);
}

function resetPago(total){
	pago(total);
	$("#pagado").html(0);
	$("#pagado-1").prop("checked", "");
	$("#pagado-2").prop("checked", "");
	$("#pagado-3").prop("checked", "");
}

$(document).on('mouseover', 'div[id*="cancel"]', function(){
	$('div[id*="cancel"]').hover(function(){
		var input = $(this).attr("id");
		var input = input.split('-');
		var n = input[1];
		$(`p[id="cancel-${n}"]`).addClass('hidden');
		$(`span[id="cancel-${n}"]`).removeClass('hidden');
	},function(){
		var input = $(this).attr("id");
		var input = input.split('-');
		var n = input[1];
		$(`p[id="cancel-${n}"]`).removeClass('hidden');
		$(`span[id="cancel-${n}"]`).addClass('hidden');
	});
});

$(document).on('keyup', 'input[data-n="1"]', function(){
	var num = new Number($('#filas').val());
	var total = 0;
	var input = $(this).attr("id");
	var input = input.split('-');
	var n = input[1];
	var cantidad = $(`#cantidad-${n}`).val();
	var unitario = $(`#unitario-${n}`).val();
	if(cantidad !== null && unitario !== null){
		var res = Math.round(cantidad * unitario);
		$(`#total-${n}`).val(res);
		for (var i = 1; i <= num; i++) {
			total+=new Number($(`#total-${i}`).val());
		};
		var neto = Math.round(total);
		$('#neto').val(neto);
		var iva = Math.round(neto * 0.19);
		$('#iva').val(iva);
		var t = iva + neto;
		$('#total').val(t);
		resetPago(t);
	}
});

$(document).on('change', 'input[data-n="2"]', function(){
	var input = $(this).attr("id");
	var input = input.split('-');
	var n = input[1];
	var codigo = $(this).val();
	var url = "/ImprentaMontaris/public/cotizaciones/find/" + codigo;
	$.get(url, function (data) {
    //success data
    $(`#descripcion-${n}`).val(data.descripcion);
    $(`#unitario-${n}`).val(data.unitario);
  }) 
});

$(document).on('change', 'input[data-z="1"]', function(){
	var input = $(this).attr("id");
	var input = input.split('-');
	var n = input[1];
	var num = new Number($('#filas').val());
	var newNum = new Number(num + 1);
	if(n == num){
		addFila(newNum);
	}

});

$(document).on('change', 'input[data-n="3"]', function(){
	var rut = $(this).val();
	var url = "/ImprentaMontaris/public/contactos/find/" + rut;
	$.get(url, function (data) {
		$(`#empresa`).val(data.empresa);
		$(`#nombre_contacto`).val(data.nombre_contacto);
		$(`#fono_contacto`).val(data.fono_contacto);
		$(`#razon_social`).val(data.razon_social);
		$(`#giro`).val(data.giro);
		$(`#direccion`).val(data.direccion);
		$(`#ciudad`).val(data.ciudad);
		$(`#mail`).val(data.mail);
	}) 
});

$(document).on('change', 'input[data-n="4"]', function(){
	var rut = $(this).val();
	var url = "/ImprentaMontaris/public/contactos/find/" + rut;
	$.get(url, function (data) {
    //success data
    $(`input[name="razon_social"`).val(data.razon_social);
    $(`input[name="nombre_fantasia"]`).val(data.nombre_fantasia);
    $(`input[name="fono_contacto"`).val(data.fono_contacto);
    $(`input[name="fono_empresa"`).val(data.fono_empresa);
    $(`input[name="giro"`).val(data.giro);
    $(`input[name="ciudad"`).val(data.ciudad);
    $(`input[name="ciudad_empresa"`).val(data.ciudad_empresa);
    $(`input[name="direccion"`).val(data.direccion);
    $(`input[name="comuna"]`).val(data.comuna);
    $(`input[name="sucursal"]`).val(data.sucursal);
    $(`input[name="mail"`).val(data.mail);
    $(`input[name="empresa"`).val(data.empresa);
    $(`input[name="nombre_contacto"`).val(data.nombre_contacto);
    $(`input[name="nombre_contacto2"]`).val(data.nombre_contacto2);
    $(`input[name="fono_contacto2"]`).val(data.fono_contacto2);
    $(`input[name="email_contacto2"]`).val(data.email_contacto2);
    $(`input[name="nombre_contador"]`).val(data.nombre_contador);
    $(`input[name="fono_contador"]`).val(data.fono_contador);
    $(`input[name="email_contador"]`).val(data.email_contador);
  }) 
});

$(document).on('click', 'div[id*="cancel"]', function(){
	var total = 0;
	var neto_anterior = 0;
	var nuevo_neto = 0;
	var input = $(this).attr("id");
	var input = input.split('-');
	var n = input[1];
	total = $(`#total-${n}`).val();
	neto_anterior = $('#neto').val();
	neto_anterior = neto_anterior.replace(/\./g, '');
	nuevo_neto = neto_anterior - total;
	$(`#descripcion-${n}`).val('');
	$(`#unitario-${n}`).val('');
	$(`#total-${n}`).val('0');
	$(`#codigo-${n}`).val('');
	$(`#cantidad-${n}`).val('');

	$('#neto').val(nuevo_neto);
	var iva = Math.round(nuevo_neto * 0.19);
	$('#iva').val(iva);
	var t = iva + nuevo_neto;
	$('#total').val(t);
	resetPago(t);
});

function addFila(newNum) {
	$('#filas').val(newNum);
	var newElem = `<tr>
	<td>
	<div class="cancel" id="cancel-${newNum}">
	<p class="no-margin" id="cancel-${newNum}">${newNum}</p>
	<span class="glyphicon glyphicon-remove hidden" id="cancel-${newNum}" aria-hidden="true" style="color: red;"></span>
	</div>
	</td>
	<td>
	<div class='form-group'>
	<input type='text' name='codigo-${newNum}' class='form-control custom-input solo-numero' id='codigo-${newNum}' data-n= '2' data-z='1'/>
	</div>
	</td>
	<td>
	<div class='form-group'>
	<input type='number' name='cantidad-${newNum}' class='form-control custom-input solo-numero' id='cantidad-${newNum}' data-n= '1' data-z='1'/>
	</div>
	</td>
	<td>
	<div class='form-group'>
	<input type='text' name='descripcion-${newNum}' class='form-control custom-input-desc' id='descripcion-${newNum}' data-z='1'/>
	</div>
	</td>
	<td>
	<div class='form-group'>
	<input type='number' name='unitario-${newNum}' step='0.01' class='form-control custom-input solo-numero' id='unitario-${newNum}' data-n= '1' data-z='1'/>
	</div>
	</td>
	<td>
	<div class='form-group'>
	<input type='text' name='total-${newNum}' class='form-control custom-input solo-numero' readonly='true' id='total-${newNum}'/>
	</div>
	</td>
	</tr>`;
	$('#js-table tr:last').after(newElem);
};

$('#btnAdd').click(function() {
	var num = new Number($('#filas').val());
	var newNum = new Number(num + 1);;
	addFila(newNum);
});

$('#busqueda_avanzada').click(function(e){
	e.preventDefault();
	$('#busqueda_avanzada').addClass('hidden');
	$('#tr-hidden').removeClass('hidden');
});

$('#mostrar_menos').click(function(e){
	e.preventDefault();
	$('#busqueda_avanzada').removeClass('hidden');
	$('#tr-hidden').addClass('hidden');
});

function search(url, n, mod){
	var template_error = `<div class="col-md-12">
	<div class="alert alert-info">
	NO SE HAN ECONTRADO RESULTADOS.
	</div>
	</div>`;
	var loader = `<div class="col-md-12 margin-top center">
	<img src="/ImprentaMontaris/public/img/loader.gif" />
	</div>`;
	$('#resultado').html(loader);
	$.get(url, function (data) {
		if(data.length)
		{
			if(n === 1)
				$('#resultado').html(template_contacto(data));
			else if(n === 2)
				$('#resultado').html(template(data, mod));
			else if(n === 3)
				$('#resultado').html(template_pagos(data, mod));
		}else{
			$('#resultado').html(template_error);
		}
	});
}

$('#buscar-contacto').click(function(e){
	e.preventDefault();
	var rut = $("#search-rut").val();
	var razon_social = $("#search-razon_social").val();
	var nombre_contacto = $("#search-nombre_contacto").val();
	var ciudad = $("#search-ciudad").val();
	var fantasia = $("#search-nombre_fantasia").val();
	var giro = $("#search-giro").val();
	rut = (rut) ? rut : 'null';
	razon_social = (razon_social) ? razon_social : 'null';
	nombre_contacto = (nombre_contacto) ? nombre_contacto : 'null';
	ciudad = (ciudad) ? ciudad : 'null';
	fantasia = (fantasia) ? fantasia : 'null';
	giro = (giro) ? giro : 'null';
	if(rut != 'null' || razon_social != 'null' || nombre_contacto != 'null'|| ciudad != 'null' || fantasia != 'null' || giro != 'null')
	{  
		var url = "/ImprentaMontaris/public/contactos/search/"+ rut+"/"+ razon_social+"/"+ nombre_contacto+"/"+ciudad+"/"+fantasia+"/"+giro;
		search(url, 1, 0);
		$("#back").removeClass('hidden');
		$("#paginacion").addClass('hidden');
	}
});

function template_contacto(data){
	return `<div class="col-md-12">
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
	${ each_data_contacto(data) }
	</tbody>
	</table>
	</div>
	`;
};

function each_data_contacto(dates){
	var token = $('meta[name="csrf-token"]').attr('content');
	var template = '';
	dates.map(function(data){
		template+=`<tr><td><a href="/ImprentaMontaris/public/contactos/${data.id}">${data.rut}</a></td>
		<td>${data.razon_social ? data.razon_social : ''}</td>
		<td>${data.nombre_fantasia ? data.nombre_fantasia : ''}</td>
		<td>${data.nombre_contacto ? data.nombre_contacto : ''}</td>
		<td>${data.giro ? data.giro : ''}</td>
		<td>${data.ciudad ? data.ciudad : ''}</td>
		<td>${data.fono_contacto ? data.fono_contacto : ''}</td>
		<td style="width: 100px">
		<table>
		<tr>
		<td>
		<a href="http://localhost/ImprentaMontaris/public/contactos/${data.id}/edit" class="btn btn-sm btn-warning margin-r">
		<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		Editar
		</a>
		</td>
		<td>
		<form method="POST" action="http://localhost/ImprentaMontaris/public/contactos/${data.id}" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">
		<input name="_token" type="hidden" value="${token}">
		<button type="submit" class="btn btn-sm btn-danger">
		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		ELIMINAR
		</button>
		</form>
		</td>
		</tr>
		</table>
		</td></tr>`;
	});
	return template;
}

/* BUSQUEDA COTIZACIONES Y ORDENES*/
$('button[data-w="1"]').click(function(e){
	e.preventDefault();
	var input = $(this).attr("id");
	var input = input.split('-');
	var mod = input[1];
	var id = $("#search-id").val();
	var fecha_i = ($("#search-fecha_inicio").val()).split('-');
	var fecha_inicio = (fecha_i.length === 3) ? fecha_i[2] + '-' + fecha_i[1] + '-' + fecha_i[0] : '';
	var fecha_f = ($("#search-fecha_final").val()).split('-');
	var fecha_final = (fecha_f.length === 3) ? fecha_f[2] + '-' + fecha_f[1] + '-' + fecha_f[0] : '';
	var rut = $("#search-rut").val();
	var razon_social = $("#search-razon_social").val();
	var pendientes = ($("#search-pendientes").is(':checked')) ? '1' : 'null';
	var cod_producto = $("#search-cod_producto").val();
	var nom_producto = $("#search-nom_producto").val();
	id = (id) ? id : 'null';
	fecha_inicio = (fecha_inicio) ? fecha_inicio : 'null';
	fecha_final = (fecha_final) ? fecha_final : 'null';
	rut = (rut) ? rut : 'null';
	cod_producto = (cod_producto) ? cod_producto : 'null';
	nom_producto = (nom_producto) ? nom_producto : 'null';
	razon_social = (razon_social) ? razon_social : 'null';
	if(id != 'null' || fecha_inicio != 'null' || fecha_final != 'null' || rut != 'null' || razon_social != 'null' || pendientes != 'null' || cod_producto != 'null' || nom_producto != 'null')
	{  
		var url = `/ImprentaMontaris/public/${mod}/search/${id}/${fecha_inicio}/${fecha_final}/${rut}/${razon_social}/${pendientes}/${cod_producto}/${nom_producto}`;
		search(url, 2, mod);
		$("#back").removeClass('hidden');
		$("#paginacion").addClass('hidden');
	}
});

function template(data, mod){
	return `<div class="col-md-12">
	<table class="table table-bordered table-hover">
	<thead>
	<tr>
	<td>N°</td>
	<td>FECHA</td>
	<td>RAZÓN SOCIAL</td>
	<td>RUT</td>
	<td>NETO</td>
	<td>IVA</td>
	<td>TOTAL</td>
	<td>ACCIONES</td>
	</tr>
	</thead>
	<tbody>
	${ each_data(data, mod) }
	</tbody>
	</table>
	</div>
	`;
};

function each_data(dates, mod){
	var token = $('meta[name="csrf-token"]').attr('content');
	var template = '';
	dates.map(function(data){
		var date = data.fecha_ingreso ? new Date(data.fecha_ingreso) : new Date(data.created_at);
		var dia = (date.getDate() < 10) ? 0 : '';
		var mes = ((date.getMonth() + 1) < 10) ? 0 : '';
		template+=`<tr><td><a href="/ImprentaMontaris/public/${mod}/${data.id}">${data.id}</a></td>
		<td>${dia}${date.getDate()}-${mes}${(date.getMonth() + 1)}-${date.getFullYear()}</td>
		<td>${data.contacto ? data.contacto.razon_social : ''}</td>
		<td>${data.contacto ? data.contacto.rut : ''}</td>
		<td>${data.neto ? data.neto : ''}</td>
		<td>${data.iva ? data.iva : ''}</td>
		<td>${data.total ? data.total : ''}</td>
		<td style="width: 100px">
		<table>
		<tr>
		<td>
		<a href="http://localhost/ImprentaMontaris/public/${mod}/${data.id}/edit" class="btn btn-sm btn-warning margin-r">
		<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
		Editar
		</a>
		</td>
		<td>
		<form method="POST" action="http://localhost/ImprentaMontaris/public/${mod}/${data.id}" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">
		<input name="_token" type="hidden" value="${token}">
		<button type="submit" class="btn btn-sm btn-danger">
		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
		ELIMINAR
		</button>
		</form>
		</td>
		</tr>
		</table>
		</td></tr>`;
	});
	return template;
}

//BUSCAR PAGO
$('#buscar-pagos').click(function(e){
	e.preventDefault();
	var fecha_i = ($("#search-fecha_inicio").val()).split('-');
	var fecha_inicio = (fecha_i.length === 3) ? fecha_i[2] + '-' + fecha_i[1] + '-' + fecha_i[0] : 'null';
	var fecha_f = ($("#search-fecha_final").val()).split('-');
	var fecha_final = (fecha_f.length === 3) ? fecha_f[2] + '-' + fecha_f[1] + '-' + fecha_f[0] : 'null';
	if(fecha_inicio != 'null' || fecha_final != 'null' )
	{  
		var url = "/ImprentaMontaris/public/pagos/search/"+ fecha_inicio +"/"+ fecha_final;
		search(url, 3, 0);
		$("#back").removeClass('hidden');
		$("#paginacion").addClass('hidden');
	}
});

function template_pagos(data){
	return `<div class="col-md-12">
	<table class="table table-bordered table-hover center">
		<thead>
			<tr>
				<th class="center">N°</th>
				<th class="center">FECHA</th>
				<th class="center">RECAUDACIÓN</th>
			</tr>
		</thead>
		<tbody>
			${ each_data_pagos(data) }
		</tbody>
	</table>
	</div>
	`;
};

function each_data_pagos(pagos){
	var template = '';
	var i = 1;
	pagos.map(function(pago){
		var date = new Date(pago.fecha);
		var dia = (date.getDate() < 10) ? 0 : '';
		var mes = ((date.getMonth() + 1) < 10) ? 0 : '';
		template+=`
		<tr>
			<td><a href="/ImprentaMontaris/public/pagos/${date.getFullYear()}-${mes}${(date.getMonth() + 1)}-${dia}${date.getDate()}">${i++}</a></td>
			<td>${dia}${date.getDate()}-${mes}${(date.getMonth() + 1)}-${date.getFullYear()}</td>
			<td><strong>$ ${pago.sum}</strong></td>
		</tr>`;
	});
	return template;
}

