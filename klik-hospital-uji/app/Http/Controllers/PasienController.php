<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
class PasienController extends Controller
{
    public function getDetailPasien($id)
    {
        $dataPas = Pasien::find($id);
        return response()->json([
            "dataPas"=>$dataPas,
        ]);
    }
}
