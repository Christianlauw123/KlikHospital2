<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RumahSakit;
use App\Ruang;
class KlikRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Semua RS
        $allRS = RumahSakit::all();

        //Lokasi Kota
        $allKotaRS = RumahSakit::distinct()->get(['kota']);

        //Tipe RS
        $allTipeRS = RumahSakit::distinct()->get(['tipe']);

        //Tipe Kamar
        $allTipeKamar = RumahSakit::distinct()->get(['nama']);
        return view('klik-room.index',compact('allRS','allKotaRS','allTipeRS','allTipeKamar'));
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
     * Display the specified resource. (Untuk Tampilkan Ruangan)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

    public function detailRumahSakit($id)
    {
        $getRS = RumahSakit::find($id);
        return view('klik-room.detail_rs',compact('getRS'));
    }
}
