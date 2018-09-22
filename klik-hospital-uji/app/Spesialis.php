<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spesialis extends Model
{
    protected $table= 'spesialis';

    public function dokters()
    {
    	return $this->hasMany('App/Dokter');
    }
}
