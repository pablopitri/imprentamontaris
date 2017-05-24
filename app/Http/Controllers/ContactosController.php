<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contacto;
use App\Cotizacion;
use App\Orden;

class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = Contacto::orderBy('id', 'desc')->simplePaginate(15);
        return view('contactos.index', ['contactos'=> $contactos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacto = new Contacto;
        return view('contactos.create', ["contacto" => $contacto]);
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
        $contacto->razon_social = $request->razon_social;
        $contacto->rut = $request->rut;
        $contacto->empresa = $request->empresa;
        $contacto->nombre_contacto = $request->nombre_contacto;
        $contacto->giro = $request->giro;
        $contacto->ciudad = $request->ciudad;
        $contacto->ciudad_empresa = $request->ciudad_empresa;
        $contacto->direccion = $request->direccion;
        $contacto->fono_empresa = $request->fono_empresa;
        $contacto->mail = $request->mail;
        $contacto->nombre_fantasia = $request->nombre_fantasia;
        $contacto->comuna = $request->comuna;
        $contacto->nombre_contador = $request->nombre_contador;
        $contacto->fono_contador = $request->fono_contador;
        $contacto->email_contador = $request->email_contador;
        $contacto->email_empresa = $request->email_empresa;
        $contacto->sucursal = $request->sucursal;

        $contacto->fono_contacto = $request->fono_contacto;
        $contacto->nombre_contacto2 = $request->nombre_contacto2;
        $contacto->fono_contacto2 = $request->fono_contacto2;
        $contacto->email_contacto2 = $request->email_contacto2;

        $rut = Contacto::where('rut', $contacto->rut)->get();
        if(count($rut))
        {
            $contacto->rut = '';
            return view('contactos.create', ["contacto" => $contacto, "notice" => "Error, el RUT ingresado ya se encuentra registrado. Por favor intente ingresando un nuevo RUT."]);
        }else{
            if($contacto->save()){
                return redirect('/contactos');
            }else{
                return view('contactos.create', ["contacto" => $contacto]);
            }
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
        $contacto = Contacto::find($id);
        return view('contactos.show', ["contacto" => $contacto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacto = Contacto::find($id);
        return view('contactos.edit', ["contacto" => $contacto]);
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
        $contacto = Contacto::find($id);
        $contacto->razon_social = $request->razon_social;
        $contacto->rut = $request->rut;
        $contacto->empresa = $request->empresa;
        $contacto->nombre_contacto = $request->nombre_contacto;
        $contacto->giro = $request->giro;
        $contacto->ciudad = $request->ciudad;
        $contacto->ciudad_empresa = $request->ciudad_empresa;
        $contacto->direccion = $request->direccion;
        $contacto->fono_empresa = $request->fono_empresa;
        $contacto->mail = $request->mail;
        $contacto->nombre_fantasia = $request->nombre_fantasia;
        $contacto->comuna = $request->comuna;
        $contacto->nombre_contador = $request->nombre_contador;
        $contacto->fono_contador = $request->fono_contador;
        $contacto->email_contador = $request->email_contador;
        $contacto->fono_contacto = $request->fono_contacto;
        $contacto->nombre_contacto2 = $request->nombre_contacto2;
        $contacto->fono_contacto2 = $request->fono_contacto2;
        $contacto->email_contacto2 = $request->email_contacto2;
        $contacto->sucursal = $request->sucursal;
        $contacto->fono_empresa = $request->fono_empresa;
        $contacto->email_empresa = $request->email_empresa;

        if($contacto->save()){
            return redirect('/contactos/'.$contacto->id);
        }else{
            return view('contactos.edit', ["contacto" => $contacto]);
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
        $contacto = Contacto::find($id);
        $cotizaciones = Cotizacion::where('contacto_id', $contacto->id)->get();
        $ordenes = Orden::where('contacto_id', $contacto->id)->get();
        foreach ($cotizaciones as $cotizacion) {
            $cotizacion->contacto()->dissociate();
            $cotizacion->save();
        }
        foreach ($ordenes as $orden) {
            $orden->contacto()->dissociate();
            $orden->save();
        }
        if($contacto->delete())
        {
            return redirect('/contactos');
        }
    }

    public function find($id){
        $contacto = Contacto::where('rut', $id)->first();
        return response()->json($contacto);
    }

    public function search($id, $razon, $nombre, $ciudad, $fantasia, $giro){
        $contacto = Contacto::rut($id)
                            ->razon($razon)
                            ->nombrecontacto($nombre)
                            ->ciudad($ciudad)
                            ->nombrefantasia($fantasia)
                            ->giro($giro)
                            ->order()
                            ->get();

        return response()->json($contacto);
    }
}
