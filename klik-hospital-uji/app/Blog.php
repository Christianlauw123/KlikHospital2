<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ["judul","isi_content","isActive","admin_id"];

    public function admin()
    {
    	return $this->belongsTo('App/Admin');
    }
}
