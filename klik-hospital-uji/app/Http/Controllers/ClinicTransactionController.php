<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClinicTransaction;
use App\Pasien;
use Auth;
class ClinicTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getTrans = ClinicTransaction::where('user_id',Auth::user()->id)->get();
        return response()->json([
            'myTraxClinic'=>$getTrans,
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
        if($request->get('dataRoom')[0]=="Clinic")
        {
            //Cek diriSendiri
            if($request->get('jenis')==0)
            {
                $newTrans = new ClinicTransaction([
                    'hari_praktek'=>$request->get('dataRoom')[2],
                    'jam_praktek'=>$request->get('dataRoom')[3],
                    'statusTransaksi'=>0,
                    'alasan_kunjungan'=>$request->get('alasan'),
                    'isActive'=>1,
                    'doctorclinic_id'=>$request->get('dataRoom')[1],
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
                
                $newTrans = new ClinicTransaction([
                    'alasan_kunjungan'=>$request->get('alasan'),
                    'hari_praktek'=>$request->get('dataRoom')[2],
                    'jam_praktek'=>$request->get('dataRoom')[3],
                    'statusTransaksi'=>0,
                    'isActive'=>1,
                    'doctorclinic_id'=>$request->get('dataRoom')[1],
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
}
