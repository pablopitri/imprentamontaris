<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Orden extends Model
{
    public function setPapelAttribute($value)
    {
        $this->attributes['papel'] = strtoupper($value);
    }

    public function setTapaAttribute($value)
    {
        $this->attributes['tapa'] = strtoupper($value);
    }

    public function setFolioAttribute($value)
    {
        $this->attributes['folio'] = strtoupper($value);
    }

    public function setColorAttribute($value)
    {
        $this->attributes['color'] = strtoupper($value);
    }

    public function setTamañoAttribute($value)
    {
        $this->attributes['tamaño'] = strtoupper($value);
    }

    public function setInterAttribute($value)
    {
        $this->attributes['inter'] = strtoupper($value);
    }

    public function setObservacionAttribute($value)
    {
        $this->attributes['observacion'] = strtoupper($value);
    }

    public function getCreatedAtAttribute(){
        return Carbon::parse( $this->attributes['created_at'])->format('d-m-Y');
    }

    public function productos(){
    	return $this->belongsToMany('App\Producto')->withPivot('cantidad', 'total');
    }

    public function pagos(){
    	return $this->belongsToMany('App\Pago')->withPivot('pagado', 'created_at');
    }

    public function copias(){
        return $this->belongsToMany('App\Copia');
    }

    public function contacto(){
    	return $this->belongsTo('App\Contacto');
    }

    public function vendedor(){
    	return $this->belongsTo('App\Vendedor');
    }

    public function scopeOrder($query){
        $query->orderBy('id', 'asc');
    }

    public function scopeId($query, $id){
        if($id != 'null')
            $query->where('id', $id);
    }

    public function scopeFecha_inicio($query, $fecha_inicio){
        if($fecha_inicio != 'null')
            $query->where('fecha_ingreso', '>=', $fecha_inicio);
    }

    public function scopeFecha_final($query, $fecha_final){
        if($fecha_final != 'null')
            $query->where('fecha_ingreso', '<=', $fecha_final);
    }
    public function scopeRut($query, $rut){
        if($rut != 'null'){
            $query->whereHas('contacto', function($q) use ($rut) {
                $q->where('contactos.rut', $rut);
            });
        }
    }
    
    public function scopeRazonsocial($query, $razon_social){
        if($razon_social != 'null'){
            $query->whereHas('contacto', function($q) use ($razon_social) {
                $q->where('contactos.razon_social', 'LIKE', '%'.$razon_social.'%');
            });
        }
    }

    public function scopePendientes($query, $pendientes){
        if($pendientes != 'null')
            $query->where('fecha_entrega', '>=', Carbon::now());
    }

    public function scopeCod_producto($query, $cod_prod){
        if($cod_prod != 'null')
        {
            $query->whereHas('productos', function($q) use ($cod_prod) {
                $q->where('productos.codigo', $cod_prod);
            });
        }
    }

    public function scopeNom_producto($query, $nom_prod){
        if ($nom_prod != 'null') {
            $query->whereHas('productos', function($q) use ($nom_prod) {
                $q->where('productos.descripcion', 'LIKE', '%'.$nom_prod.'%');
            });
        }
    }

    public function scopeFecha($query, $fecha){
        if ($fecha != null) {
            $query->whereHas('pagos', function($q) use ($fecha){
                $q->where('pagos.fecha', $fecha)
                  ->where('orden_pago.pagado', 1);
            });
        }
    }
}
