<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicMessageTransaction extends Model
{
    protected $table = "clinic_message_transactions";
    protected $fillable = ["isiPesan","statusPenjawab","isSelesai","isActive","clinicTransaction_id","admin_id"];

    public function admin()
    {
    	return $this->belongsTo('App/Admin');
    }
    public function clinictransaction()
    {
    	return $this->belongsTo('App/ClinicTransaction','clinicTransaction_id');
    }
}
