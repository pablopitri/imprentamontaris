<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Cotizacion;
use App\Contacto;
use App\Producto;

use PDF;

class CotizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones = Cotizacion::orderBy('id', 'desc')->simplePaginate(15);
        foreach ($cotizaciones as $cotizacion) {
            if(!$cotizacion->contacto)
                $cotizacion->contacto = new Contacto;
        }
        return view('cotizaciones.index', ['cotizaciones' => $cotizaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Cotizacion::count() ? Cotizacion::all()->last()->id + 1 : 1;
        $cotizacion = new Cotizacion;
        $cotizacion->contacto = new Contacto;
        $cotizacion->id = $id;
        return view('cotizaciones.create', ['cotizacion' => $cotizacion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contacto = new Contacto;
        $cotizacion = new Cotizacion;
        $contacto->rut = $request->rut;
        $contact = Contacto::where('rut', $contacto->rut)->first();
        if(count($contact))
        {
            $contacto = $contact;
        }else{
            $contacto->razon_social = $request->razon_social;
            $contacto->empresa = $request->empresa;
            $contacto->nombre_contacto = $request->nombre_contacto;
            $contacto->giro = $request->giro;
            $contacto->ciudad = $request->ciudad;
            $contacto->direccion = $request->direccion;
            $contacto->fono_empresa = $request->fono_empresa;
            $contacto->email_empresa = $request->mail;
            $contacto->save();
        }
        $cotizacion->id = $request->id;
        $cotizacion->total = str_replace('.', "", $request->total);
        $cotizacion->neto = str_replace('.', "", $request->neto);
        $cotizacion->iva = str_replace('.', "", $request->iva);
        $cotizacion->observacion = $request->observacion;
        $cotizacion->contacto_id = $contacto->id;
        $date = Carbon::parse($request->fecha)->format('Y-m-d');
        $cotizacion->created_at = $date;
        if($cotizacion->save()){
            $n_productos = $request->filas;
            for ($i=1; $i <= $n_productos; $i++) {
                $codigo = $request->input("codigo-".$i);
                $total = $request->input("total-".$i);
                $cantidad = $request->input("cantidad-".$i);
                $producto = Producto::where('codigo', $codigo)->first();
                if(count($producto) < 1)
                {
                    $producto = new Producto;
                    $producto->codigo = $codigo;
                }
                $producto->descripcion = $request->input("descripcion-".$i);
                $producto->unitario = $request->input("unitario-".$i);
                if($producto->descripcion){
                    if($producto->save()){
                        $producto->cotizaciones()->attach($cotizacion->id, ['cantidad' => $cantidad, 'total' => $total ]);
                    }
                }
            }
            $pdf = PDF::loadView('pdf.cotizacion', ['cotizacion' => $cotizacion]);
            $pdf->save("//Lenovo-pc/cotizaciones/Cotizacion-Num-".$cotizacion->id.".pdf");
            return redirect('/cotizaciones/'.$cotizacion->id);
        }else{
            return view('cotizaciones.create', ["cotizacion" => $cotizacion]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cotizacion = Cotizacion::find($id);
        if(!$cotizacion->contacto){
            $cotizacion->contacto = new Contacto;
        }
        $filas = count($cotizacion->productos);
        return view('cotizaciones.show', ["cotizacion" => $cotizacion, 'filas' => $filas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cotizacion = Cotizacion::find($id);
        if(!$cotizacion->contacto){
            $cotizacion->contacto = new Contacto;
        }
        $filas = count($cotizacion->productos);
        return view('cotizaciones.edit', ["cotizacion" => $cotizacion, 'filas' => $filas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rut = $request->rut;
        $contacto = Contacto::where('rut', $rut)->first();
        if(count($contacto) < 1)
        {
            $contacto = new Contacto;
        }

        $contacto->razon_social = $request->razon_social;
        $contacto->empresa = $request->empresa;
        $contacto->nombre_contacto = $request->nombre_contacto;
        $contacto->giro = $request->giro;
        $contacto->ciudad = $request->ciudad;
        $contacto->direccion = $request->direccion;
        $contacto->fono_empresa = $request->fono_empresa;
        $contacto->email_empresa = $request->mail;
        if($contacto->save()){
            $cotizacion = Cotizacion::find($id);
            $cotizacion->total = str_replace('.', "", $request->total);
            $cotizacion->neto = str_replace('.', "", $request->neto);
            $cotizacion->iva = str_replace('.', "", $request->iva);
            $cotizacion->observacion = $request->observacion;
            $cotizacion->contacto_id = $contacto->id;
            $date = Carbon::parse($request->fecha)->format('Y-m-d');
            $cotizacion->created_at = $date;
            $cotizacion->contacto()->associate($contacto);
            $cotizacion->productos()->detach();
            if($cotizacion->save()){
                $n_productos = $request->filas;
                for ($i=1; $i <= $n_productos; $i++) {
                    $descripcion = $request->input("descripcion-".$i);
                    $codigo = $request->input("codigo-".$i);
                    $total = $request->input("total-".$i);
                    $cantidad = $request->input("cantidad-".$i);
                    $producto = Producto::where('codigo', $codigo)->first();
                    if(count($producto) < 1)
                    {
                        $producto = new Producto;
                        $producto->codigo = $codigo;
                    }
                    $producto->descripcion = $descripcion;
                    $producto->unitario = round($request->input("unitario-".$i), 2);
                    if($descripcion)
                    {
                        if($producto->save()){
                            $producto->cotizaciones()->attach($cotizacion->id, ['cantidad' => $cantidad, 'total' => $total ]);
                        }
                    }
                }
                $pdf = PDF::loadView('pdf.cotizacion', ['cotizacion' => $cotizacion]);
                $pdf->save("//Lenovo-pc/cotizaciones/Cotizacion-Num-".$cotizacion->id.".pdf");
                return redirect('/cotizaciones/'.$cotizacion->id);
            }else{
                return view('cotizaciones.create', ["contacto" => $contacto]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cotizacion = Cotizacion::find($id);
        $cotizacion->productos()->detach();
        if($cotizacion->delete())
        {
            return redirect('/cotizaciones');
        }
    }

    public function search($id, $fecha_inicio, $fecha_final, $rut, $razon_social,$pendiente, $cod_producto, $nom_producto){
        $cotizacion = Cotizacion::with('contacto')
                                    ->id($id)
                                    ->fecha_inicio($fecha_inicio)
                                    ->fecha_final($fecha_final)
                                    ->rut($rut)
                                    ->razonsocial($razon_social)
                                    ->cod_producto($cod_producto)
                                    ->nom_producto($nom_producto)
                                    ->order()
                                    ->get();
        return response()->json($cotizacion);
    }
}
