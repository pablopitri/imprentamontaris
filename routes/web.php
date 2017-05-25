<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@home');

Route::resource('contactos', 'ContactosController');

Route::resource('cotizaciones', 'CotizacionesController');

Route::resource('ordenes', 'OrdenesController');

Route::resource('pagos', 'PagosController', ['only' => ['index', 'show']]);

Route::get('/ordenes/new/{id}', 'OrdenesController@new');

Route::get('/cotizaciones/find/{id?}', 'ProductosController@find');

Route::get('/contactos/find/{id?}', 'ContactosController@find');

Route::get('/contactos/search/{id?}/{razon?}/{nombre?}/{ciudad?}/{fantaia?}/{giro?}', 'ContactosController@search');

Route::get('/cotizaciones/search/{id}/{fecha_inicio}/{fecha_final}/{rut}/{razon_social}/{pendientes}/{cod_prod}/{nom_prod}', 'CotizacionesController@search');

Route::get('/ordenes/search/{id?}/{fecha_inicio?}/{fecha_final?}/{rut?}/{razon_social?}/{pendientes?}/{cod_prod?}/{nom_prod?}', 'OrdenesController@search');

Route::get('/pagos/search/{fecha_inicio?}/{fecha_final?}', 'PagosController@search');

Route::get('/cotizaciones/pdf/{id?}', 'PdfController@pdfCotizacion');

Route::get('/ordenes/pdf/{id?}', 'PdfController@pdfOrden');