<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PharmacyMessageTransaction extends Model
{
    protected $table = "pharmacy_message_transactions";
    protected $fillable = ["isiPesan","statusPenjawab","isSelesai","isActive","pharmacyTransactions_id","admin_id"];

    public function pharmacytransaction()
    {
    	return $this->belongsTo('App/PharmacyTransaction',"pharmacyTransactions_id");
    }
    public function admin()
    {
    	return $this->belongsTo('App/Admin');
    }
}
