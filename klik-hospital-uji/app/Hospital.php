<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = ["nama","alamat","telepon_1","telepon_2","isOpen","isActive","city_id","user_id"];

    public function rooms()
    {
    	return $this->hasMany('App\Room');
    }
    public function city()
    {
    	return $this->belongsTo('App\City');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function airplane1transactions()
    {
        return $this->hasMany('App\AirplaneTransaction','hospital1_id');
    }
    public function airplane2transactions()
    {
        return $this->hasMany('App\AirplaneTransaction','hospital2_id');
    }
    public function doctorhospitals()
    {
        return $this->hasMany('App\DoctorHospital');
    }
}
