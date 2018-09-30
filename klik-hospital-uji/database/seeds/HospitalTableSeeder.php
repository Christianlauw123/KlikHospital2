<?php

use Illuminate\Database\Seeder;
use App\Hospital;
class HospitalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hospital1 = new Hospital([
        	'nama'=>"RS 1 Siloam",
        	'alamat'=>"Jalan1",
        	'telepon_1'=>"031-333111",
        	'telepon_2'=>"031-333222",
        	'isOpen' =>1,
        	'isActive'=>1,
        	'city_id'=>1,
        	'user_id'=>1,
        ]);
        $hospital1->save();

        $hospital2 = new Hospital([
        	'nama'=>"RS 2 Siloam",
        	'alamat'=>"Jalan1",
        	'telepon_1'=>"031-333111",
        	'telepon_2'=>"031-333222",
        	'isOpen' =>1,
        	'isActive'=>1,
        	'city_id'=>1,
        	'user_id'=>2,
        ]);
        $hospital2->save();

        $hospital3 = new Hospital([
        	'nama'=>"RS Malang",
        	'alamat'=>"Jalan1",
        	'telepon_1'=>"031-333111",
        	'telepon_2'=>"031-333222",
        	'isOpen' =>1,
        	'isActive'=>1,
        	'city_id'=>3,
        	'user_id'=>3,
        ]);
        $hospital3->save();
    }
}
