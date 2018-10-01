<?php

use Illuminate\Database\Seeder;
use App\Specialist;
class SpecialistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sps1 = new Specialist([
        	'nama'=>"Specialist 1",
        	'isActive'=>1,
        ]);
        $sps1->save();

        $sps2 = new Specialist([
        	'nama'=>"Specialist 2",
        	'isActive'=>1,
        ]);
        $sps2->save();
        
        $sps3 = new Specialist([
        	'nama'=>"Specialist 3",
        	'isActive'=>1,
        ]);
        $sps3->save();
    }
}
