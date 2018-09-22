<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klinik extends Model
{
    public function dokterkliniks()
    {
    	return $this->hasMany('App/DokterKlinik');
    }
}
