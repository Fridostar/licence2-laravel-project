<?php

namespace App\Http\Controllers\Gym;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('keyWords');

        // $rooms = Room::latest()->paginate(9);
        // $rooms = Room::orderBy('id', 'desc')->paginate(9);

        $rooms = Room::where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orderBy('id', 'desc')
            ->paginate(9);

        return view(
            'gym.welcome',
            [
                "listRooms" => $rooms
            ]
        );
    }
}
