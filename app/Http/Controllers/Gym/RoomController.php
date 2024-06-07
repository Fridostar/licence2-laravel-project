<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Models\Outfit;
use App\Models\Room;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function search(Request $request, $id)
    {
        // get the search field value
        // $search = $request->input('search');
        $search = $request['search'];
        $room = Room::findOrFail($id);

        // do filtering
        if (isset($search)) {
            $outfits = $room->outfits()
                ->when($search, function ($query) use ($search) {
                    $query->orWhere(['name', 'description'], 'like', '%' . $search . '%')->get();
                })
                ->when($search, function ($query) use ($search) {
                    $query->orWhere(['name', 'description'], 'like', '%' . $search . '%')->get();
                })
                ->orderBy('id', 'desc')
                ->paginate();
        } else {
            $outfits = $room->outfits()->orderBy('id', 'desc')->paginate(3);
        }

        // return the view with de rooms data
        return view(
            'gym.overview',
            [
                "room" => $room,
                "listOutfits" => $outfits,
            ]
        );
    }

    public function roomDetail($id)
    {
        $room = Room::findOrFail($id);

        $outfits = $room->outfits()->orderBy('id', 'desc')->paginate(3);

        return view(
            'gym.overview',
            [
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
