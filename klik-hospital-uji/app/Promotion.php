<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable =['nama','keterangan','isActive'];

    public function airplanetransactions()
    {
    	return $this->hasMany('App/AirplaneTransaction');
    }
    public function clinicransactions()
    {
    	return $this->hasMany('App/ClinicTransaction');
    }
    public function hospitalclinictransactions()
    {
    	return $this->hasMany('App/HospitalClinicTransaction');
    }
    public function pharmacytransactions()
    {
    	return $this->hasMany('App/PharmacyTransaction');
    }
    public function roomtransactions()
    {
    	return $this->hasMany('App/RoomTransaction');
    }
}
