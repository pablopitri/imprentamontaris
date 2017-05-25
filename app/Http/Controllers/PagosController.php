<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pago;
use App\Orden;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = Pago::orderBy('id', 'desc')->groupBy('fecha')->pagado()->simplePaginate(15);
        return view('pagos.index', ['pagos' => $pagos]);
    }

    public function show($id)
    {
        $ordenes = Orden::orderBy('id', 'desc')->whereHas('pagos')->fecha($id)->get();
        $total = Pago::recaudacion_dia($id);
        return view('pagos.show', ['ordenes' => $ordenes, 'fecha' => $id, 'total' => $total]);
    }

    public function search($fecha_inicio, $fecha_final)
    {
        $i = 2;
        $pagos = Pago::orderBy('id', 'desc')
                        ->inicio($fecha_inicio)
                        ->final($fecha_final)
                        ->groupBy('fecha')
                        ->selectRaw('*, sum(monto) as sum')
                        ->get();
        return response()->json($pagos);
    }
}
