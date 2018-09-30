<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomMessageTransaction extends Model
{
    protected $table = "room_message_transactions";
    protected $fillable = ["isiPesan","statusPenjawab","isSelesai","isActive","roomTransactions_id","admin_id"];

    public function roomtransaction()
    {
    	return $this->belongsTo('App\RoomTransaction',"roomTransactions_id ");
    }
    public function admin()
    {
    	return $this->belongsTo('App\Admin');
    }
}
