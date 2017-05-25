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
  	return $this->belongsToMany('App\Orden')->withPivot('pagado', 'created_at');
  }

  public static function recaudacion_dia($f){
    $fecha = ($f) ? $f : date('Y-m-d');
    return Pago::where('fecha', $fecha)
                ->whereHas('ordenes', function($q) use ($fecha){
                  $q->where('orden_pago.pagado', 1);})
                ->sum('monto');
  }

  public function recaudacion($fecha){
    return Pago::where('fecha', $fecha)
                  ->whereHas('ordenes', function($q) use ($fecha){
                  $q->where('orden_pago.pagado', 1);})
                  ->sum('monto');
  }

  public function scopePagado($query){
    $query->whereHas('ordenes', function($q){
            $q->where('orden_pago.pagado', 1);
          });
  }

    public function scopeInicio($query, $fecha_inicio){
      if ($fecha_inicio != 'null')
      {
          $query->where('fecha', '>=', $fecha_inicio)
            ->whereHas('ordenes', function($q){
              $q->where('orden_pago.pagado', 1);})
            ->sum('monto');
      }
    }

    public function scopeFinal($query, $fecha_final){
      if ($fecha_final != 'null')
      {
          $query->where('fecha', '<=' , $fecha_final)->whereHas('ordenes', function($q){
            $q->where('orden_pago.pagado', 1);})
            ->sum('monto');
      }
    }
}
