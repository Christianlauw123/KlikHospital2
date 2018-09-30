<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
class HospitalController extends Controller
{
    public function getHospital($lokasiId=null,$tipeRumahSakit=null,$tipeKamar=null)
    {
    	$allHospital = Hospital::all();

    	if($lokasiId!=null)
    		$allHospital = Hospital::where('city_id',$lokasiId)->get();
    	return response()->json($allHospital->toArray());

    }
    public function getHospitalByNama($keterangan=null)
    {
        $allHospital = Hospital::all();
        if($keterangan!=null)
            $allHospital = Hospital::where('nama','like','%$keterangan%')->get();
        return response()->json($allHospital->toArray());

    }
}
