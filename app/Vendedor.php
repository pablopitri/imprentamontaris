<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
		public function setNombreAttribute($value)
	  {
	      $this->attributes['nombre'] = strtoupper($value);
	  }

    public function ordenes(){
    	return $this->hasMany('App\Orden');
    }
}
