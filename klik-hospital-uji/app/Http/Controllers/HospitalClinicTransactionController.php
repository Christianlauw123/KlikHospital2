<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\HospitalClinicTransaction;
use Auth;
class HospitalClinicTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getTrans = HospitalClinicTransaction::where('user_id',Auth::user()->id)->get();
        return response()->json([
            'myTraxHospitalClinic'=>$getTrans,
        ]);
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
        //Trans Klinik Hospital
        if($request->get('dataRoom')[0]=="ClinicHos")
        {
            //Cek diriSendiri
            if($request->get('jenis')==0)
            {
                $newTrans = new HospitalClinicTransaction([
                    'hari_praktek'=>$request->get('dataRoom')[2],
                    'jam_praktek'=>$request->get('dataRoom')[3],
                    'statusTransaksi'=>0,
                    'alasan_kunjungan'=>$request->get('alasan'),
                    'isActive'=>1,
                    'doctorhospital_id'=>$request->get('dataRoom')[1],
                    'user_id'=>Auth::user()->id,
                ]);
                $newTrans->save();
            }
            else
            {
                $newPas = new Pasien([
                    'nama'=>$request->get('namaPas'),
                    'no_telepon'=>$request->get('noTelepon'),
                    'tgl_lahir'=>$request->get('bdate'),
                    'alamat'=>$request->get('alamat'),
                    'isActive'=>1,
                ]);
                $newPas->save();    
                
                $newTrans = new HospitalClinicTransaction([
                    'alasan_kunjungan'=>$request->get('alasan'),
                    'hari_praktek'=>$request->get('dataRoom')[2],
                    'jam_praktek'=>$request->get('dataRoom')[3],
                    'statusTransaksi'=>0,
                    'isActive'=>1,
                    'doctorhospital_id'=>$request->get('dataRoom')[1],
                    'pasien_id'=>$newPas->id,
                    'user_id'=>Auth::user()->id,
                ]);
                $newTrans->save();
            }
            return response()->json([
                'res' => 'ok',
            ]);
        }
        return response()->json([
            'res' => 'no',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    //Get Trans For Hospital Admin
    public function getAllTransClinicHospital()
    {
        if(Auth::user()!=null)
        {
            if(Auth::user()->hospital)
            {
                //Get Room Trans based on worker
                $hospClinicTrans = HospitalClinicTransaction::join('doctor_hospitals','hospital_clinic_transactions.doctorhospital_id','=','doctor_hospitals.id')
                                                ->join('hospitals','doctor_hospitals.hospital_id','=','hospitals.id')
                                                ->join('doctors','doctor_hospitals.doctor_id','=','doctors.id')
                                                ->where('hospitals.id','=',Auth::user()->hospital->id)
                                                ->select('hospital_clinic_transactions.*')
                                                ->get();
                return response()->json([
                    'hospClinicTrans' => $hospClinicTrans,
                ]);
            }
            return redirect('/');
        }
        return redirect('/');

    }
}
