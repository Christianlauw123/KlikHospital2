<?php

use Illuminate\Database\Seeder;
use App\DoctorHospital;
class DoctorHospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctHostp1 = new DoctorHospital([
            'hari_praktek'=>"Senin,Rabu,Jumat",
            'jam_praktek'=>"13.00-15.00, 18.00-20.00",
            'isOpen'=>1,
            'isActive'=>1,
            'doctor_id'=>1,
            'hospital_id'=>1,
        ]);
        $doctHostp1->save();

        $doctHostp2 = new DoctorHospital([
            'hari_praktek'=>"Selasa,Kamis",
            'jam_praktek'=>"18.00-20.00",
            'isOpen'=>1,
            'isActive'=>1,
            'doctor_id'=>2,
            'hospital_id'=>1,
        ]);
        $doctHostp2->save();

        $doctHostp3 = new DoctorHospital([
            'hari_praktek'=>"Senin",
            'jam_praktek'=>"15.00-19.00",
            'isOpen'=>1,
            'isActive'=>1,
            'doctor_id'=>3,
            'hospital_id'=>1,
        ]);
        $doctHostp3->save();
    }
}
