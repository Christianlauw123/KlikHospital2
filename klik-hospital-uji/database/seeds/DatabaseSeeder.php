<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        //$this->call(ProvinceTableSeeder::class);
        //$this->call(CityTableSeeder::class);
        //$this->call(HospitalTableSeeder::class);
        //$this->call(RoomsTableSeeder::class);
        //$this->call(SpecialistTableSeeder::class);
        //$this->call(DoctorTableSeeder::class);
        $this->call(DoctorHospitalSeeder::class);
    }
}
