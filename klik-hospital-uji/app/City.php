<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";
    protected $fillable = ["nama","isActive","province_id"];

    public function province()
    {
    	return $this->belongsTo('App\Province');
    }

    public function clinics()
    {
    	return $this->hasMany('App\Clinic');
    }

    public function hospitals()
    {
    	return $this->hasMany('App\Hospital');
    }

    public function pharmacys()
    {
    	return $this->hasMany('App\Pharmacy');
    }

    public function airplanes()
    {
    	return $this->hasMany('App\Airplane');
    }
}
