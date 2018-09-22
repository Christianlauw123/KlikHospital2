<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokterKlinik extends Model
{
    protected $table ='dokter_kliniks';

    public function dokter()
    {
    	return $this->belongsTo('App/Dokter');
    }
    public function transaksidokters()
    {
        return $this->hasMany('App/TransaksiDokter');
    }
    public function klinik()
    {
    	return $this->belongsTo('App/Klinik');
    }
}
