<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomTransaction;
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
        //Insert Pasien Baru
        $pasien = new Pasien([
            'nama'=>$request->get('namaPas'),
            'no_telepon'=>$request->get('noTelepon'),
            'tgl_lahir'=>$request->get('bdate'),
            'alamat'=>$request->get('alamat'),
            'alasan_kunjungan'=>$request->get('alasan'),
            'isActive'=>1,
        ]);
        $pasien->save();

        //Insert Transaksi
        $newRoom = new RoomTransaction([
            'lamaInap'=>$request->get('lamaInap'),
            'totalBiaya'=>$request->get('biayaTotal'),
            'statusTransaksi'=>0,
            'isActive'=>1,
            'room_id'=>$request->get('idRoom'),
            'pasien_id'=>$pasien->id,
            'user_id'=>Auth::user()->id,
        ]);
        $newRoom->save();
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
}
