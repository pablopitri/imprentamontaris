<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Orden;
use App\Contacto;
use App\Producto;
use App\Vendedor;
use App\Pago;
use App\Cotizacion;
use App\Copia;

class OrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenes = Orden::orderBy('id', 'desc')->simplePaginate(15);
        foreach ($ordenes as $orden) {
            if(!$orden->contacto)
                $orden->contacto = new Contacto;
        }
        return view('ordenes.index', ['ordenes' => $ordenes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Orden::count() ? Orden::all()->last()->id + 1 : 1;
        $orden = new Orden;
        $orden->id = $id;
        $orden->fecha_ingreso = Carbon::now();
        $orden->fecha_entrega = Carbon::now()->addDays(6);
        $orden->contacto = new Contacto;
        $orden->producto = new Producto;
        $orden->vendedor = new Vendedor;
        $orden->pago = new Pago;
        return view('ordenes.create', ['orden' => $orden]);
    }

    public function new($id)
    {
        $cotizacion = Cotizacion::find($id);
        $filas = count($cotizacion->productos);
        $id = Orden::count() ? Orden::all()->last()->id + 1 : 1;
        $orden = $cotizacion;
        $orden->id = $id;
        $orden->contacto = $cotizacion->contacto;
        $orden->productos = $cotizacion->productos;
        $orden->fecha_ingreso = Carbon::now();
        $orden->fecha_entrega = Carbon::now()->addDays(6);
        $orden->vendedor = new Vendedor;
        $orden->pago = new Pago;
        $pre = [0,0,0,0,0,0];
        $pendiente = $cotizacion->total;
        return view('ordenes.new', ['orden' => $orden, 'filas' => $filas, 'pagado' => '0', 'pendiente' => $pendiente, 'pre' => $pre]);
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
        $orden = new Orden;
        $vendedor = new Vendedor;

        $contacto->rut = $request->rut;
        $contact = Contacto::where('rut', $contacto->rut)->first();
        if(count($contact))
        {
            $contacto = $contact;
        }

        $contacto->empresa = $request->empresa;
        $contacto->fono_contacto = $request->fono_contacto;
        $contacto->nombre_contacto = $request->nombre_contacto;
        $contacto->ciudad = $request->ciudad;
        $contacto->ciudad_empresa = $request->ciudad_empresa;
        $contacto->razon_social = $request->razon_social;
        $contacto->fono_empresa = $request->fono_empresa;
        $contacto->nombre_fantasia = $request->nombre_fantasia;
        $contacto->giro = $request->giro;
        $contacto->comuna = $request->comuna;
        $contacto->direccion = $request->direccion;
        $contacto->email_empresa = $request->mail;
        $contacto->sucursal = $request->sucursal;
        $contacto->nombre_contacto2 = $request->nombre_contacto2;
        $contacto->fono_contacto2 = $request->fono_contacto2;
        $contacto->email_contacto2 = $request->email_contacto2;
        $contacto->nombre_contador = $request->nombre_contador;
        $contacto->fono_contador = $request->fono_contador;
        $contacto->email_contador= $request->email_contador;
        
        $contacto->save();

        $nombre_vendedor = $request->vendedor;
        $vend = Vendedor::where('nombre', $nombre_vendedor)->first();
        if(count($vend))
        {
            $vendedor = $vend;
        }
        $vendedor->nombre = $nombre_vendedor;
        $vendedor->save();
        
        $orden->id = $request->id;
        $orden->total = str_replace('.', "", $request->total);
        $orden->neto = str_replace('.', "", $request->neto);
        $orden->iva = str_replace('.', "", $request->iva);
        $orden->observacion = $request->observacion;
        $orden->contacto_id = $contacto->id;
        $orden->vendedor_id = $vendedor->id;
        $date_ingreso = Carbon::parse($request->fecha_ingreso)->format('Y-m-d');
        $date_entrega = Carbon::parse($request->fecha_entrega)->format('Y-m-d');
        $orden->fecha_ingreso = $date_ingreso;
        $orden->fecha_entrega = $date_entrega;
        $orden->papel = $request->papel;
        $orden->tapa = $request->tapa;
        $orden->folio = $request->folio;
        $orden->inter = $request->inter;
        $orden->color = $request->color;
        $orden->id_chile_compra = $request->id_chile_compra;
        $orden->oc = $request->oc;
        $orden->tamaño = $request->tamaño;
        
        if($orden->save()){
            for ($i=1; $i <= 6; $i++) { 
                if ($request->input('pre'.$i)) {
                    $copia = Copia::where(['copia' => $i], ['descripcion' => $request->input('desc-'.$i)])->first();
                    if (count($copia) < 1) {
                        $copia = new Copia;
                        $copia->copia = $i;
                        $copia->descripcion = $request->input('desc-'.$i);
                        $copia->save();
                    }
                    $copia->ordenes()->attach($orden->id);
                }
            }

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
                if($producto->descripcion)
                {
                    if($producto->save()){
                        $producto->ordenes()->attach($orden->id, ['cantidad' => $cantidad, 'total' => $total ]);
                    }
                }
            }
            for ($i=1; $i <=3 ; $i++) {
                $pago = new Pago;
                $pago->forma_pago = $request->input("forma_pago".$i);
                $pago->numero_documento = $request->input("numero_documento".$i);
                $pago->banco = $request->input("banco".$i);
                $fecha = Carbon::parse($request->input("fecha".$i))->format('Y-m-d');
                $pago->fecha = $fecha;
                $pago->monto = $request->input("monto".$i);
                $pagado = ($request->input("pagado-".$i)) ? '1' : '0';

                if($pago->monto != null){
                    if($pago->save())
                    {

                        $pago->ordenes()->attach($orden->id, ['pagado' => $pagado]);
                    }
                }
            }
            return redirect('/ordenes/'.$orden->id);
        }else{
            $cotizacion->contacto = $contacto;
            $cotizacion->vendedor = $vendedor;
            return view('ordenes.create', ["cotizacion" => $cotizacion]);
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
        $orden = Orden::find($id);
        $pre = array();
        if(!$orden->contacto){
            $orden->contacto = new Contacto;
        }
        $total = $orden->total;
        $pagado = 0;
        foreach ($orden->pagos as $pago) {
            if($pago->pivot->pagado)
                $pagado += $pago->monto;
        }
        foreach ($orden->copias as $copia) {
            $pre[$copia->copia] = $copia->descripcion;
        }
        $pendiente = $total - $pagado;
        $filas = count($orden->productos);
        return view('ordenes.show', ["orden" => $orden, 'filas' => $filas, 'pagado' => $pagado, 'pendiente' => $pendiente, 'pre' => $pre]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orden = Orden::find($id);
        $pre = array();
        if(!$orden->contacto){
            $orden->contacto = new Contacto;
        }
        $total = $orden->total;
        $pagado = 0;
        foreach ($orden->pagos as $pago) {
            if($pago->pivot->pagado)
                $pagado += $pago->monto;
        }
        foreach ($orden->copias as $copia) {
            $pre[$copia->copia] = $copia->descripcion;
        }
        $pendiente = $total - $pagado;
        $filas = count($orden->productos);
        return view('ordenes.edit', ["orden" => $orden, 'filas' => $filas, 'pagado' => $pagado, 'pendiente' => $pendiente, 'pre' => $pre]);
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
        $orden = Orden::find($id);
        $contacto = new Contacto;
        $vendedor = new Vendedor;

        $contacto->rut = $request->rut;
        $contact = Contacto::where('rut', $contacto->rut)->first();
        if(count($contact))
        {
            $contacto = $contact;
        }

        $contacto->empresa = $request->empresa;
        $contacto->fono_contacto = $request->fono_contacto;
        $contacto->nombre_contacto = $request->nombre_contacto;
        $contacto->ciudad = $request->ciudad;
        $contacto->ciudad_empresa = $request->ciudad_empresa;
        $contacto->razon_social = $request->razon_social;
        $contacto->fono_empresa = $request->fono_empresa;
        $contacto->nombre_fantasia = $request->nombre_fantasia;
        $contacto->giro = $request->giro;
        $contacto->comuna = $request->comuna;
        $contacto->direccion = $request->direccion;
        $contacto->email_empresa = $request->mail;
        $contacto->sucursal = $request->sucursal;
        $contacto->nombre_contacto2 = $request->nombre_contacto2;
        $contacto->fono_contacto2 = $request->fono_contacto2;
        $contacto->email_contacto2 = $request->email_contacto2;
        $contacto->nombre_contador = $request->nombre_contador;
        $contacto->fono_contador = $request->fono_contador;
        $contacto->email_contador= $request->email_contador;
        
        $contacto->save();

        $nombre_vendedor = $request->vendedor;
        $vend = Vendedor::where('nombre', $nombre_vendedor)->first();
        if(count($vend))
        {
            $vendedor = $vend;
        }
        $vendedor->nombre = $nombre_vendedor;
        $vendedor->save();
        
        $orden->total = str_replace('.', "", $request->total);
        $orden->neto = str_replace('.', "", $request->neto);
        $orden->iva = str_replace('.', "", $request->iva);
        $orden->observacion = $request->observacion;
        $orden->contacto_id = $contacto->id;
        $orden->vendedor_id = $vendedor->id;
        $date_ingreso = Carbon::parse($request->fecha_ingreso)->format('Y-m-d');
        $date_entrega = Carbon::parse($request->fecha_entrega)->format('Y-m-d');
        $orden->fecha_ingreso = $date_ingreso;
        $orden->fecha_entrega = $date_entrega;
        $orden->papel = $request->papel;
        $orden->tapa = $request->tapa;
        $orden->folio = $request->folio;
        $orden->inter = $request->inter;
        $orden->color = $request->color;
        $orden->id_chile_compra = $request->id_chile_compra;
        $orden->oc = $request->oc;
        $orden->tamaño = $request->tamaño;
        $pre1 = $request->pre1;
        $pre2 = $request->pre2;
        $pre3 = $request->pre3;
        $pre4 = $request->pre4;
        $pre5 = $request->pre5;
        $pre6 = $request->pre6;
        $orden->cambios = $pre1.','.$pre2.','.$pre3.','.$pre4.','.$pre5.','.$pre6;
        
        if($orden->save()){
            $orden->productos()->detach();
            $ids = array();
            foreach ($orden->pagos as $pago) {
                $ids[] = $pago->id;
            }
            $orden->pagos()->detach();
            $orden->copias()->detach();
            Pago::whereIn('id',$ids)->delete();

            for ($i=1; $i <= 6; $i++) { 
                if ($request->input('pre'.$i)) {
                    $copia = Copia::where(['copia' => $i], ['descripcion' => $request->input('desc-'.$i)])->first();
                    if (count($copia) < 1) {
                        $copia = new Copia;
                        $copia->copia = $i;
                        $copia->descripcion = $request->input('desc-'.$i);
                        $copia->save();
                    }
                    $copia->ordenes()->attach($orden->id);
                }
            }

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
                if($producto->descripcion)
                {
                    if($producto->save()){
                        $producto->ordenes()->attach($orden->id, ['cantidad' => $cantidad, 'total' => $total ]);
                    }
                }
            }
            for ($i=1; $i <=3 ; $i++) {
                $pago = new Pago;
                $pago->forma_pago = $request->input("forma_pago".$i);
                $pago->numero_documento = $request->input("numero_documento".$i);
                $pago->banco = $request->input("banco".$i);
                $fecha = Carbon::parse($request->input("fecha".$i))->format('Y-m-d');
                $pago->fecha = $fecha;
                $pago->monto = $request->input("monto".$i);
                $pagado = ($request->input("pagado-".$i)) ? '1' : '0';
                if($pago->monto != null)
                {
                    if($pago->save())
                    {
                        $pago->ordenes()->attach($orden->id, ['pagado' => $pagado]);
                    }
                }
            }
            return redirect('/ordenes/'.$orden->id);
        }else{
            $orden->contacto = $contacto;
            $orden->vendedor = $vendedor;
            return view('ordenes.create', ["orden" => $orden]);
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
        $orden = Orden::find($id);
        $orden->productos()->detach();
        $orden->pagos()->detach();
        $orden->copias()->detach();
        if($orden->delete())
        {
            return redirect('/ordenes');
        }
    }

    public function search($id, $fecha_inicio, $fecha_final, $rut, $razon_social, $pendientes, $cod_producto, $nom_producto){
        $orden = Orden::with('contacto')
                        ->id($id)
                        ->fecha_inicio($fecha_inicio)
                        ->fecha_final($fecha_final)
                        ->rut($rut)
                        ->razonsocial($razon_social)
                        ->pendientes($pendientes)
                        ->cod_producto($cod_producto)
                        ->nom_producto($nom_producto)
                        ->order()
                        ->get();
        return response()->json($orden);
    }
}
