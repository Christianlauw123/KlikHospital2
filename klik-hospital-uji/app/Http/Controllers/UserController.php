<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function getDetailUser($id)
    {
        $dataUser = User::find($id);
        return response()->json([
            "dataUs"=>$dataUser,
        ]);
    }
}
