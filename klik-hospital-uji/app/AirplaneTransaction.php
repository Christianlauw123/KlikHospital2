<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirplaneTransaction extends Model
{
    protected $table = "airplane_transactions";
    protected $fillable = ["totalBiaya","tglPenerbangan","statusTransaksi","isActive","airplane_id","hospital1_id","hospital2_id","user_id","payment_id","promotion_id"];

    public function airplane()
    {
    	return $this->belongsTo('App\Airplane');
    }

    public function hospital1()
    {
    	return $this->belongsTo('App\Hospital','hospital1_id');
    }
    public function hospital2()
    {
    	return $this->belongsTo('App\Hospital','hospital2_id');
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
