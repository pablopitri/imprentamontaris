<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copia extends Model
{
    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = strtoupper($value);
    }

    public function ordenes(){
    	return $this->belongsToMany('App\Orden');
    }
}
