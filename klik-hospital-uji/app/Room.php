<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ["nama","jum_pasien","jum_penunggu","harga","rating","fasilitas","isFull","isActive","hospital_id"];

    public function hospital()
    {
    	return $this->belongsTo('App/Hospital');
    }
}
