<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DoctorHospital;
class DoctorHospitalController extends Controller
{
    public function getDoctorHospital($id)
    {
        $docHosp = DoctorHospital::find($id)->doctor;
        return response()->json([
            'datadocHosp'=>$docHosp,
        ]);
    }
}
