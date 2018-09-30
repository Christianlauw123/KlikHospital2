<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirplaneMessageTransaction extends Model
{
    protected $table = "airplane_message_transactions";
    protected $fillable = ["isiPesan","statusPenjawab","isSelesai","isActive","airplaneTransaction_id","admin_id"];

    public function airplane()
    {
    	return $this->belongsTo('App\Airplane');
    }
    public function airplanetransaction()
    {
    	return $this->belongsTo('App\AirplaneTransaction','airplaneTransaction_id');
    }
    public function admin()
    {
    	return $this->belongsTo('App\Admin');
    }
}
