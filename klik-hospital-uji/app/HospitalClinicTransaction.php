<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalClinicTransaction extends Model
{
    protected $table = "hospital_clinic_transactions";
    protected $fillable = ["hari_praktek","jam_praktek","noAntrian","totalBiaya","statusTransaksi","isActive","doctorhospital_id","user_id","pasien_id","payment_id","promotion_id"];

    public function hospitalclinicmessagetransactions()
    {
    	return $this->hasMany('App/HospitalClinicMessageTransaction',"hCTrans_id");
    }
    public function doctorhospital()
    {
    	return $this->belongsTo('App/DoctorHospital')
    }
    public function pasien()
    {
    	return $this->belongsTo('App/Pasien');
    }
    public function user()
    {
    	return $this->belongsTo('App/User');
    }
    public function payment()
    {
    	return $this->belongsTo('App/Payments','payment_id');
    }
    public function promotion()
    {
    	return $this->belongsTo('App/Promotion');
    }
}
