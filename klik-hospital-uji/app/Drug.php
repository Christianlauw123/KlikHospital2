<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $fillable = ["namaObat","keterangan","hargaObat","satuan","isReady","isActive","pharmacy_id"];

    public function pharmacy()
    {
    	return $this->belongsTo('App\Pharmacy');
    }
    public function drugpharmacytransactions()
    {
    	return $this->hasMany('App\DrugPharmacyTransaction');
    }
}
