<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomTransaction extends Model
{
    protected $table = "room_transactions";
    protected $fillable = ["lamaInap","totalBiaya","statusTransaksi","isActive","room_id","doctorHospital_id","pasien_id","user_id","payment_id","promotion_id"];

    public function doctorhospital()
    {
    	return $this->belongsTo('App\DoctorHospital','doctorHospital_id');
    }
    public function patient()
    {
    	return $this->belongsTo('App\Pasien');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function payment()
    {
    	return $this->belongsTo('App\Payments',"payment_id");
    }
    public function promotion()
    {
    	return $this->belongsTo('App\Promotion');
    }
}
