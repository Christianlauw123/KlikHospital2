<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Hospital;
use App\Room;
use App\RoomTransaction;
use App\DoctorHospital;
use Auth;
class KlikRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(Auth::user()->hospital))
        {
            //Get Room Trans based on worker
            $allRoomTrans = RoomTransaction::join('rooms','room_transactions.room_id','=','rooms.id')
                                            ->join('hospitals','rooms.hospital_id','=','hospitals.id')
                                            ->where('hospitals.id','=',Auth::user()->hospital->id)
                                            ->get();

            //Get Klinik di Rumah Sakit Trans
            
            //Get list dokter dirumah sakit
            $allDoctInRS = DoctorHospital::where('hospital_id','=',Auth::user()->hospital->id)->get();
            return view('klik-room.index',compact('allDoctInRS'));
        }
        else
        {
            $allKotaRS = City::all();
            $allRS = Hospital::all();
            return view('klik-room.index',compact('allKotaRS','allRS'));
        }
        
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
        $dataHosp = Hospital::find($id);
        //ListKamar
        return view('klik-room.detail_rs',compact('dataHosp'));
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
