<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = ["nama","isActive"];

    public function citys()
    {
    	return $this->hasMany('App\City');
    }
}
