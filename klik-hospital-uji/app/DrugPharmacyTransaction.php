<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrugPharmacyTransaction extends Model
{
    protected $table = "drug_pharmacy_transactions";
    protected $fillable = ["jumlah","isOpen","isActive","drug_id","pharmacyTransaction_id"];

    public function drug()
    {
    	return $this->belongsTo('App/Drug');
    }
    public function pharmacytransaction()
    {
    	return $this->belongsTo('App/PharmacyTransaction','pharmacyTransaction_id');
    }
}
