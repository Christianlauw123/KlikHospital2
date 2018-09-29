<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorHospital extends Model
{
    protected $table = "doctor_hospitals";
    protected $fillable = ["hari_praktek","jam_praktek","isOpen","isActive","doctor_id","hospital_id"];

    public function doctor()
    {
    	return $this->belongsTo('App/Doctor');
    }
    public function hospital()
    {
    	return $this->belongsTo('App/Hospial');
    }
    public function hospitalclinictransactions()
    {
    	return $this->hasMany('App/HospitalClinicTransaction');
    }
    public function roomtransactions()
    {
        return $this->hasMany('App/RoomTransaction','doctorHospital_id');
    }
}
