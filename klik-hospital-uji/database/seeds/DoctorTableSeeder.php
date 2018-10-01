<?php

use Illuminate\Database\Seeder;
use App\Doctor;
class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$doctor1 = new Doctor([
    		'nid' => '1122233',
        	'nama'=>"Dokter 1",
        	'profil' => "Dokter 1 adalah abc",
        	'pendidikan'=> "SMA,S1,S2,S3",
        	'pengalaman'=> "RS Ketintang,RS 1,RS 2",
        	'isActive'=>1,
        	'spesialist_id'=>1,
        ]);
        $doctor1->save();
        $doctor2 = new Doctor([
    		'nid' => '1122233',
        	'nama'=>"Dokter 3",
        	'profil' => "Dokter 3 adalah abc",
        	'pendidikan'=> "SMA,S1,S2,S3",
        	'pengalaman'=> "RS 1,RS 2",
        	'isActive'=>1,
        	'spesialist_id'=>1,
        ]);
        $doctor2->save();
        $doctor3 = new Doctor([
    		'nid' => '1122233',
        	'nama'=>"Dokter 3",
        	'profil' => "Dokter 3 adalah abc",
        	'pendidikan'=> "SMA,S1,S2,S3",
        	'pengalaman'=> "RS 2",
        	'isActive'=>1,
        	'spesialist_id'=>2,
        ]);
        $doctor3->save();
    }
}
