<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacyTransaction extends Model
{
    protected $table = "pharmacy_transactions";
    protected $fillable = ["totalBiaya","statusPesanan","isResep","gambarResep","isActive","pharmacy_id","user_id","pasien_id","payment_id","promotion_id"];

    public function pharmacymessagetransactions()
    {
    	return $this->hasMany('App\PharmacyMessageTransaction',"pharmacyTransactions_id");
    }
    public function pharmacy()
    {
    	return $this->belongsTo('App\Pharmacy');
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
