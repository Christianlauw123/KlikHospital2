<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HospitalClinicMessageTransaction extends Model
{
    protected $table = "hospital_clinic_message_transactions";
    protected $fillable = ["isiPesan","statusPenjawab","isSelesai","isActive","hCTrans_id","admin_id"];

    public function hospitalclinictransaction()
    {
    	return $this->belongsTo('App\HospitalClinicTransaction',"hCTrans_id");
    }
    public function admin()
    {
    	return $this->belongsTo('App\Admin');
    }
}
