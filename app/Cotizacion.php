<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Cotizacion extends Model
{
  public function setObservacionAttribute($value)
  {
    $this->attributes['observacion'] = strtoupper($value);
  }

  public function contacto(){
  	return $this->belongsTo('App\Contacto');
  }
  
  public function productos(){
  	return $this->belongsToMany('App\Producto')->withPivot('cantidad', 'total');
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
  		$query->where('created_at', '>=', $fecha_inicio);
  }

  public function scopeFecha_final($query, $fecha_final){
  	if($fecha_final != 'null')
  		$query->where('created_at', '<=', $fecha_final);
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
}
