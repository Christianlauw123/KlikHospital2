<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiRuang extends Model
{
    protected $table = 'transaksi_ruangs';

    public function dokterrumahsakit()
    {
    	return $this->belongsTo('App/DokterRumahSakit');
    }
    public function ruang()
    {
    	return $this->belongsTo('App/Ruang');
    }
    public function user()
    {
    	return $this->belongsTo('App/User');
    }
}
