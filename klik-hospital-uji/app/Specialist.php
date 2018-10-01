<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    protected $table = "specialists";
    protected $fillable = ["nama","isActive"];

    public function doctors()
    {
    	return $this->hasMany('App\Doctor','spesialist_id');
    }
}
