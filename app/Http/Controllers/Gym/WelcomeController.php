<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        // get the search field value
        $search = $request->input('search');

        // do filtering
        if(isset($search)) {
            $rooms = Room::where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->paginate();
        } else {
            $rooms = Room::orderBy('id', 'desc')->paginate(9);
        }

        // return the view with de rooms data
        return view(
            'gym.welcome', [ "listRooms" => $rooms ]
        );
    }
}
