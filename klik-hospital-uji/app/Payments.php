<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = "payments";
    protected $fillable =['nama','keterangan','isActive'];

    protected function airplanetransactions()
    {
    	return $this->hasMany('App/AirplaneTransaction',"payment_id");
    }
    protected function clinictransactions()
    {
    	return $this->hasMany('App/ClinicTransaction',"payment_id");
    }
    protected function hospitalclinictransactions()
    {
    	return $this->hasMany('App/HospitalClinicTransaction',"payment_id");
    }
    protected function pharmacytransactions()
    {
    	return $this->hasMany('App/PharmacyTransaction',"payment_id");
    }
    protected function roomtransactions()
    {
    	return $this->hasMany('App/RoomTransaction',"payment_id");
    }
}
