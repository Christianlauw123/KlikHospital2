<?php

use Illuminate\Database\Seeder;
use App\Clinic;
class ClinicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cl1 = new Clinic([
            "nama" => "Clinic1",
            "alamat" => "Jalan Clinic 1",
            "telepon_1" => "031123456",
            "telepon_2" => "031678901",
            "isOpen" =>1,
            "isActive"=>1,
            "city_id"=>1,
            "user_id"=>1,
        ]);
        $cl1->save();

        $cl2 = new Clinic([
        	"nama" => "Clinic2",
            "alamat" => "Jalan Clinic 2",
            "telepon_1" => "031123456",
            "telepon_2" => "031678901",
            "isOpen" =>1,
            "isActive"=>1,
            "city_id"=>2,
            "user_id"=>2,
        ]);
        $cl2->save();

        $cl3 = new Clinic([
        	"nama" => "Clinic3",
            "alamat" => "Jalan Clinic 3",
            "telepon_1" => "031123456",
            "telepon_2" => "031678901",
            "isOpen" =>1,
            "isActive"=>1,
            "city_id"=>1,
            "user_id"=>3,
        ]);
        $cl3->save();
    }
}
