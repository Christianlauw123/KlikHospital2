<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ["nama","no_telepon","alamat","isActive","user_id"];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function blogs()
    {
    	return $this->hasMany('App\Blog');
    }
    public function hospitalclinictransactions()
    {
    	return $this->hasMany('App\HospitalClinicTransaction');
    }
}
