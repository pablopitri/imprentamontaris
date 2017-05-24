<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pago extends Model
{
	public function setFormaPagoAttribute($value)
  {
      $this->attributes['forma_pago'] = strtoupper($value);
  }

  public function setBancoAttribute($value)
  {
      $this->attributes['banco'] = strtoupper($value);
  }

  public function ordenes(){
  	return $this->belongsToMany('App\Orden')->withPivot('pagado');;
  }

  public static function recaudacion_dia(){
    $fecha = date('Y-m-d');
    return Pago::where('fecha', $fecha)->whereHas('ordenes')->sum('monto');
  }
}
