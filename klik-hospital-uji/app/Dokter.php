<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    public function spesialis()
    {
    	return $this->belongsTo('App/Spesialis');
    }
    public function dokterrumahsakits()
    {
    	return $this->hasMany('App/DokterRumahSakit');
    }
    public function dokterkliniks()
    {
    	return $this->hasMany('App/DokterKlinik');
    }
}
