<?php

use Illuminate\Database\Seeder;
use App\Room;
class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room1 = new Room([
        	'nama'=>"Kelas 1",
        	'jum_pasien'=>3,
        	'jum_penunggu'=>3,
        	'harga'=>1000,
        	'rating'=>5,
        	'fasilitas' =>'ac,tv,kulkas,ranjang',
        	'isFull'=>0,
        	'isActive'=>1,
        	'hospital_id'=>1,
        ]);
        $room1->save();

        $room2 = new Room([
        	'nama'=>"Kelas 2",
        	'jum_pasien'=>2,
        	'jum_penunggu'=>2,
        	'harga'=>1050,
        	'rating'=>4,
        	'fasilitas' =>'ac,tv,kulkas',
        	'isFull'=>0,
        	'isActive'=>1,
        	'hospital_id'=>1,
        ]);
        $room2->save();

        $room3 = new Room([
        	'nama'=>"Kelas 3",
        	'jum_pasien'=>1,
        	'jum_penunggu'=>1,
        	'harga'=>1200,
        	'rating'=>3,
        	'fasilitas' =>'ac,tv,ranjang',
        	'isFull'=>0,
        	'isActive'=>1,
        	'hospital_id'=>1,
        ]);
        $room3->save();
    }
}
