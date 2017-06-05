<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cotizacion;

use App\Orden;

use PDF;

class PdfController extends Controller
{
    public function pdfCotizacion($id){
    	$cotizacion = Cotizacion::find($id);
    	$pdf = PDF::loadView('pdf.cotizacion', ['cotizacion' => $cotizacion]);
		return $pdf->save("//Lenovo-pc/cotizaciones/Cotizacion-Num-".$cotizacion->id.".pdf")->stream("Cotizacion-Num-".$cotizacion->id.".pdf");
    }

    public function pdfOrden($id){
    	$orden = Orden::find($id);
        $pre = array();
        foreach ($orden->copias as $copia) {
            $pre[$copia->copia] = $copia->descripcion;
        }
    	$pdf = PDF::loadView('pdf.orden', ['orden' => $orden, 'pre' => $pre]);
		return $pdf->stream('Orden-Num-'.$orden->id.'.pdf');
    }
}
