<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorClinic extends Model
{
    protected $table = "doctor_clinics";
    protected $fillable = ["hari_praktek","jam_praktek","isOpen","isActive","doctor_id","clinic_id"];

    public function doctor()
    {
    	return $this->belongsTo('App/Doctor');
    }

    public function clinictransactions()
    {
    	return $this->belongsTo('App/ClinicTransaction');
    }
}
