<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = ["nama","no_telepon","tgl_lahir","alamat","isActive","user_id"];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function clinictransactions()
    {
    	return $this->hasMany('App\ClinicTransaction');
    }
    public function hospitalclinictransactions()
    {
    	return $this->hasMany('App\HospitalClinicTransaction');
    }
    public function pharmacytransactions()
    {
    	return $this->hasMany('App\PharmacyTransaction');
    }
    public function roomtransactions()
    {
    	return $this->hasMany('App\RoomTransaction');
    }
}
