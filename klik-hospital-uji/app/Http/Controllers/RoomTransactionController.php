<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomTransaction;
use App\Pasien;
use Auth;
class RoomTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Untuk user biasa , hospital->null , clinic->null, pharmacy->null
        $getTrans = RoomTransaction::where('user_id',Auth::user()->id)->get();
        return response()->json([
            'myTrax'=>$getTrans,
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
        //Daftarkan diri sendiri
        if($request->get('jenis')==0)
        {
            //Insert Transaksi
            $newRoom = new RoomTransaction([
                'lamaInap'=>$request->get('lamaInap'),
                'totalBiaya'=>$request->get('biayaTotal'),
                'alasan_kunjungan'=>$request->get('alasan'),
                'statusTransaksi'=>0,
                'isActive'=>1,
                'room_id'=>$request->get('idRoom'),
                'user_id'=>Auth::user()->id,
            ]);
            $newRoom->save();
        }
        else
        {
            //Insert Pasien Baru
            $pasien = new Pasien([
                'nama'=>$request->get('namaPas'),
                'no_telepon'=>$request->get('noTelepon'),
                'tgl_lahir'=>$request->get('bdate'),
                'alamat'=>$request->get('alamat'),
                'isActive'=>1,
            ]);
            $pasien->save();
            // return response()->json([
            //     'data'=>$request->get('namaPas'),
            // ]);

            //Insert Transaksi
            $newRoom = new RoomTransaction([
                'lamaInap'=>$request->get('lamaInap'),
                'totalBiaya'=>$request->get('biayaTotal'),
                'statusTransaksi'=>0,
                'alasan_kunjungan'=>$request->get('alasan'),
                'isActive'=>1,
                'room_id'=>$request->get('idRoom'),
                'pasien_id'=>$pasien->id,
                'user_id'=>Auth::user()->id,
            ]);
            $newRoom->save();
        }
        return response()->json([
            'success' =>1,
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
    public function getAllTransRoom()
    {
        if(Auth::user()!=null)
        {
            if(Auth::user()->hospital)
            {
                //Get Room Trans based on worker
                $allRoomTrans = RoomTransaction::join('rooms','room_transactions.room_id','=','rooms.id')
                                                ->join('hospitals','rooms.hospital_id','=','hospitals.id')
                                                ->join('pasiens','room_transactions.pasien_id','=','pasiens.id')
                                                ->where('hospitals.id','=',Auth::user()->hospital->id)
                                                ->get();
                return response()->json([
                    'roomTrans' => $allRoomTrans,
                ]);
            }
            return redirect('/');
        }
        return redirect('/');

    }
}
