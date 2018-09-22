<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    public function rumahsakit()
    {
    	return $this->belongsTo('App/RumahSakit');
    }
    public function transaksiruangs()
    {
    	return $this->hasMany('App/TransaksiRuang');
    }
}
