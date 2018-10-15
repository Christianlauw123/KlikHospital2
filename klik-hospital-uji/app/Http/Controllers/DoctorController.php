<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $getDoctor = Doctor::find($id);
        return view('klik-doctor.detail_doctor',compact('getDoctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function doctorByParameter($lokasiId=null, $spesialisId=null, $rumahSakitId=null)
    {
        $allDoct = Doctor::all();
        if($lokasiId!=null)
            $allDoct = Doctor::join('doctor_hospitals','doctors.id','=','doctor_hospitals.doctor_id')
                            ->join('doctor_clinics','doctors.id','=','doctor_clinics.doctor_id')
                            ->join('hospitals','hospitals.id','=','doctor_hospitals.hospital_id')
                            ->join('clinics','clinics.id','=','doctor_clinics.clinic_id')
                            ->where('hospitals.city_id',$lokasiId)
                            ->orWhere('clinics.city_id',$lokasiId)
                            ->distinct()->select('doctors.*')->get();
        if($spesialisId!=null)
        {
            if($lokasiId!=null)
            {
                $allDoct = Doctor::join('doctor_hospitals','doctors.id','=','doctor_hospitals.doctor_id')
                            ->join('doctor_clinics','doctors.id','=','doctor_clinics.doctor_id')
                            ->join('hospitals','hospitals.id','=','doctor_hospitals.hospital_id')
                            ->join('clinics','clinics.id','=','doctor_clinics.clinic_id')
                            ->where('doctors.spesialist_id',$spesialisId)
                            ->where(function ($query) use ($lokasiId) {
                                $query->where('clinics.city_id','=',$lokasiId)
                                      ->orWhere('hospitals.city_id','=',$lokasiId);
                            })->distinct()->select('doctors.*')->get();
            }
            else
            {
                $allDoct = Doctor::join('doctor_hospitals','doctors.id','=','doctor_hospitals.doctor_id')
                            ->join('doctor_clinics','doctors.id','=','doctor_clinics.doctor_id')
                            ->join('hospitals','hospitals.id','=','doctor_hospitals.hospital_id')
                            ->join('clinics','clinics.id','=','doctor_clinics.clinic_id')
                            ->where('doctors.spesialist_id',$spesialisId)
                            ->distinct()->select('doctors.*')->get();
            }
        }
        if($rumahSakitId!=null)
        {
            $allDoct = Doctor::join('doctor_hospitals','doctors.id','=','doctor_hospitals.doctor_id')
                            ->join('doctor_clinics','doctors.id','=','doctor_clinics.doctor_id')
                            ->join('hospitals','hospitals.id','=','doctor_hospitals.hospital_id')
                            ->where('hospitals.id','=',$rumahSakitId)->distinct()->select('doctors.*')->get();
        }
        return response()->json($allDoct->toArray());
    }
}
