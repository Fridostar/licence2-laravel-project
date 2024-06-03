<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        return view('gym.overview');
    }

    public function showMap(){
        return "Google Map goes here !";
    }
}
