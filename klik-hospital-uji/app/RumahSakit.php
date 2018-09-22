<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    protected $table = 'rumah_sakits';

    //1 RS banyak Ruangan
    public function ruangs()
    {
    	return $this->hasMany('App/Ruang');
    }

    public function dokterrumahsakits()
    {
    	return $this->hasMany('App/DokterRumahSakit');
    }
}
