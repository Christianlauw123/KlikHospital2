<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $table = "pharmacies";
    protected $fillable =['nama','alamat','telepon_1','telepon_2','isOpen','isActive','city_id','user_id'];

    public function user()
    {
    	return $this->belongsTo('App/User');
    }
    public function city()
    {
    	return $this->belongsTo('App/City');
    }
    public function pharmacytransactions()
    {
    	return $this->hasMany('App/PharmacyTransaction');
    }
    public function drugs()
    {
    	return $this->hasMany('App/Drug');
    }
}
