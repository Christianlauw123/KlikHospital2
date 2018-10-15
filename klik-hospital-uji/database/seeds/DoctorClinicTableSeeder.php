<?php

use Illuminate\Database\Seeder;
use App\DoctorClinic;
class DoctorClinicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dcl1 = new DoctorClinic([
            'hari_praktek'=>"Senin,Rabu,Jumat",
            'jam_praktek'=>"13.00-15.00, 18.00-20.00",
            "isOpen"=>1,
            "isActive"=>1,
            "doctor_id"=>1,
            "clinic_id"=>1,
        ]);
        $dcl1->save();

        $dcl2 = new DoctorClinic([
        	'hari_praktek'=>"Senin,Rabu,Jumat",
            'jam_praktek'=>"13.00-15.00, 18.00-20.00",
            "isOpen"=>1,
            "isActive"=>1,
            "doctor_id"=>2,
            "clinic_id"=>2,
        ]);
        $dcl2->save();

        $dcl3 = new DoctorClinic([
        	'hari_praktek'=>"Senin,Rabu,Jumat",
            'jam_praktek'=>"13.00-15.00, 18.00-20.00",
            "isOpen"=>1,
            "isActive"=>1,
            "doctor_id"=>3,
            "clinic_id"=>1,
        ]);
        $dcl3->save();
        
    }
}
