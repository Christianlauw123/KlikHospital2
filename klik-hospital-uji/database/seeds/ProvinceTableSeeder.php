<?php

use Illuminate\Database\Seeder;
use App\Province;
class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $province1 = new Province([
        	'nama'=>"Jawa Timur",
        	'isActive'=>1,
        ]);
        $province1->save();

        $province1 = new Province([
        	'nama'=>"Jakarta",
        	'isActive'=>1,
        ]);
        $province1->save();

        $province3 = new Province([
        	'nama'=>"Jawa Tengah",
        	'isActive'=>1,
        ]);
        $province3->save();
    }
}
