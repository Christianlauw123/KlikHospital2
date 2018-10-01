<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ["nid","nama","profil","pendidikan","pengalaman","isActive","specialist_id"];

    public function spesialist()
    {
    	return $this->belongsTo('App\Specialist','spesialist_id');
    }

    public function doctorclinics()
    {
    	return $this->hasMany('App\DoctorClinic');
    }
    public function doctorhospitals()
    {
    	return $this->hasMany('App\DoctorHospital');
    }
}
