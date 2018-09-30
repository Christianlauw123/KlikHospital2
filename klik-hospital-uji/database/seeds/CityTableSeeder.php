<?php

use Illuminate\Database\Seeder;
use App\City;
class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city1 = new City([
        	'nama'=>"Surabaya",
        	'isActive'=>1,
        	"province_id"=>1,
        ]);
        $city1->save();

        $city2 = new City([
        	'nama'=>"Jakarta",
        	'isActive'=>1,
        	"province_id"=>2,
        ]);
        $city2->save();

        $city3 = new City([
        	'nama'=>"Malang",
        	'isActive'=>1,
        	"province_id"=>1,
        ]);
        $city3->save();
    }
}
