<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nama','alamat','telepon','poin','wallet'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    //Role User
    public function clinic()
    {
        return $this->hasOne('App\Clinic');
    }

    public function hospital()
    {
        return $this->hasOne('App\Hospital');
    }

    public function pharmacy()
    {
        return $this->hasOne('App\Pharmacy');
    }

    public function airplane()
    {
        return $this->hasOne('App\Airplane');
    }

    public function pasien()
    {
        return $this->hasOne('App\Pasien');
    }

    public function admin()
    {
        return $this->hasOne('App\Admin');
    }

    //Transaksi
    public function clinictransactions()
    {
        return $this->hasMany('App\ClinicTransaction');
    }
    public function roomtransactions()
    {
        return $this->hasMany('App\RoomTransaction');
    }
    public function pharmacytransactions()
    {
        return $this->hasMany('App\PharmacyTransaction');
    }
    public function hospitalclinictransactions()
    {
        return $this->hasMany('App\HospitalClinicTransaction');
    }
    public function airplanetransactions()
    {
        return $this->hasMany('App\AirplaneTransaction');
    }
}
