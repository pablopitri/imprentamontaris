<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
		public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = strtoupper($value);
    }

    public function cotizaciones(){
    	return $this->belongsToMany('App\Cotizacion')->withPivot('cantidad', 'total');
    }

    public function ordenes(){
    	return $this->belongsToMany('App\Orden')->withPivot('cantidad', 'total');
    }
}
