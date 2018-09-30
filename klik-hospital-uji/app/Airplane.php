<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airplane extends Model
{
    protected $fillable = ["nama","isActive","city_id","user_id"];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function city()
    {
    	return $this->belongsTo('App\City');
    }
    public function airplanetransactions()
    {
    	return $this->hasMany('App\AirplaneTransaction');
    }
}
