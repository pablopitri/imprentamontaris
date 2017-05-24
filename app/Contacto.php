<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Contacto extends Model
{
    public function setRazonSocialAttribute($value)
    {
        $this->attributes['razon_social'] = strtoupper($value);
    }

    public function setEmpresaAttribute($value)
    {
        $this->attributes['empresa'] = strtoupper($value);
    }

    public function setGiroAttribute($value)
    {
        $this->attributes['giro'] = strtoupper($value);
    }

    public function setNombreFantasiaAttribute($value)
    {
        $this->attributes['nombre_fantasia'] = strtoupper($value);
    }
    public function setCiudadAttribute($value)
    {
        $this->attributes['ciudad'] = strtoupper($value);
    }
    public function setSucursalAttribute($value)
    {
        $this->attributes['sucursal'] = strtoupper($value);
    }

    public function setComunaAttribute($value)
    {
        $this->attributes['comuna'] = strtoupper($value);
    }

    public function setDireccionAttribute($value)
    {
        $this->attributes['direccion'] = strtoupper($value);
    }

    public function setCiudadEmpresaAttribute($value)
    {
        $this->attributes['ciudad_empresa'] = strtoupper($value);
    }

    public function setNombreContactoAttribute($value)
    {
        $this->attributes['nombre_contacto'] = strtoupper($value);
    }

    public function setMailAttribute($value)
    {
        $this->attributes['mail'] = strtoupper($value);
    }

    public function setEMailEmpresaAttribute($value)
    {
        $this->attributes['email_empresa'] = strtoupper($value);
    }

    public function setNombreContacto2Attribute($value)
    {
        $this->attributes['nombre_contacto2'] = strtoupper($value);
    }

    public function setEmailContacto2Attribute($value)
    {
        $this->attributes['email_contacto2'] = strtoupper($value);
    }

    public function setNombreContadorAttribute($value)
    {
        $this->attributes['nombre_contador'] = strtoupper($value);
    }

    public function setEmailContadorAttribute($value)
    {
        $this->attributes['email_contador'] = strtoupper($value);
    }

    public function cotizaciones(){
    	return $this->hasMany('App\Cotizacion');
    }

    public function scopeOrder($query){
    	$query->orderBy('id', 'asc');
    }

    public function scopeRut($query, $rut){
    	if($rut != 'null')
    		$query->where('rut', $rut);
    }

    public function scopeRazon($query, $razon){
    	if($razon != 'null')
    		$query->where('razon_social', 'LIKE', '%'.$razon.'%');
    }

    public function scopeNombrecontacto($query, $nombre){
    	if($nombre != 'null')
    		$query->where('nombre_contacto', 'LIKE', '%'.$nombre.'%');
    }

    public function scopeCiudad($query, $ciudad){
    	if($ciudad != 'null')
    		$query->where('ciudad', $ciudad);
    }

    public function scopeNombreFantasia($query, $fantasia){
        if($fantasia != 'null')
            $query->where('nombre_fantasia', 'LIKE', '%'.$fantasia.'%');
    }

    public function scopeGiro($query, $giro){
        if($giro != 'null')
            $query->where('giro', 'LIKE', '%'.$giro.'%');
    }
}
