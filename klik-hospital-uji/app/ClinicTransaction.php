<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicTransaction extends Model
{
    protected $table = "clinic_transactions";
    protected $fillable = ["hari_praktek","jam_praktek","noAntrian","totalBiaya","statusTransaksi","isActive","doctorclinic_id","user_id","pasien_id","payment_id","promotion_id"];

    public function doctorclinic()
    {
    	return $this->belongsTo('App\DoctorClinic');
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
