<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDokter extends Model
{
    protected $table='transaksi_dokters';

    public function dokterrumahsakit()
    {
    	return $this->belongsTo('App/DokterRumahSakit');
    }
    public function dokterklinik()
    {
    	return $this->belongsTo('App/DokterKlinik');
    }
    public function user()
    {
    	return $this->belongsTo('App/User');
    }
}
