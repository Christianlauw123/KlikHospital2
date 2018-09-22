<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokterRumahSakit extends Model
{
    protected $table='dokter_rumah_sakits';

    public function dokter()
    {
    	return $this->belongsTo('App/Dokter');
    }

    public function rumahsakit()
    {
    	return $this->belongsTo('App/RumahSakit');
    }

    public function transaksiruangs()
    {
    	return $this->hasMany('App/TransaksiRuang');
    }
    public function transaksidokters()
    {
        return $this->hasMany('App/TransaksiDokter');
    }
}
