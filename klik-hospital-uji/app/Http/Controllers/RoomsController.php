<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
class RoomsController extends Controller
{
    public function show($id)
    {
    	$roomData = Room::find($id);
    	return view('rooms.show',compact('roomData'));
    }
}
