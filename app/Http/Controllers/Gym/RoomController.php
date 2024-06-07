<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Models\Outfit;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function roomDetail($id)
    {
        $room = Room::findOrFail($id);

        $outfits = $room->outfits()->orderBy('id', 'desc')->paginate(3);

        return view('gym.overview', [
                "room" => $room,
                "listOutfits" => $outfits,
            ]
        );
    }

    public function showMap()
    {
        return "Google Map goes here !";
    }
}
