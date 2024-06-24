<?php

namespace App\Http\Controllers\Site\Private;

use App\Http\Controllers\Controller;
use App\Models\Outfit;
use App\Models\Pricing;
use App\Models\Room;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    public $fileService;
    public $authenticatedUser;

    /**
     * 
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
        $this->authenticatedUser = Auth::user();
    }


    public function index(Request $request)
    {
        // get the search field value
        $search = $request->input('search');

        if( $this->authenticatedUser->role == "admin") {
            // do filtering
            if (isset($search)) {
                $roomLists = Room::where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orderBy('id', 'desc')
                    ->paginate();
            } else {
                $roomLists = Room::orderBy('id', 'desc')->paginate(9);
            }
        } else {
            // do filtering
            if (isset($search)) {
                $roomLists = $this->authenticatedUser->rooms()
                    ->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orderBy('id', 'desc')
                    ->paginate();
            } else {
                $roomLists = $this->authenticatedUser->rooms()->orderBy('id', 'desc')->paginate();
            }
        }

        // view with data
        return view('site.private.room.index', [
            'roomLists' => $roomLists,
        ]);
    }


    public function create()
    {
        return view('site.private.room.form', [
            'room' => new Room(),
            'outfits' => Outfit::pluck('name', 'id'),
            'pricings' => Pricing::pluck('name', 'id'),

        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'site_url' => 'nullable|string',
            'description' => 'required|string',
            'cover_image' => 'required|mimes:jpeg,png,jpg,gif',
            'overview_image' => 'required|mimes:jpeg,png,jpg,gif',
            'status' => ['required', Rule::in(0, 1)],
            'outfits' => 'required|array',
            'pricings' => 'required|array',
        ]);

        // dd($validatedData);
        (isset($request->site_url) == false) ? $siteUrl = 'http://127.0.0.1:8000' : $siteUrl = $validatedData['site_url'];

        try{
            // first create the room
            $room = Room::create([
                'name' => $validatedData['name'],
                'site_url' => $siteUrl,
                'description' => $validatedData['description'],
                'cover_image' => 'temporary_url',
                'overview_image' => 'temporary_url',
                'status' => $validatedData['status'],
                'user_id' => Auth::user()->id,
            ]);
    
            // next connect the room & pricing to outfits
            $room->outfits()->sync($validatedData['outfits']);
            $room->pricings()->sync($validatedData['pricings']);
    
            // save updated image in storage & update the room images url
            $room->update([
                'cover_image' => $this->fileService->upload($validatedData['cover_image'], $room->id),
                'overview_image' => $this->fileService->upload($validatedData['overview_image'], $room->id),
            ]);
    
            // finaly redirect with success msg
            toast("La nouvelle salle a été ajouté avec succes", 'success');
            return to_route('management.room.index');
        } catch (\Exception $e) {
            // Handle transaction failure
        }
    }

    public function show($id)
    {
        return view('site.private.room.show', [
            'room' => Room::find($id)
        ]);
    }


    public function edit($id)
    {
        return view('site.private.room.form', [
            'room' => Room::find($id),
            'outfits' => Outfit::pluck('name', 'id'),
            'pricings' => Pricing::pluck('name', 'id'),
        ]);
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'site_url' => 'nullable|string',
            'description' => 'required|string',
            'cover_image' => 'nullable',
            'overview_image' => 'nullable',
            'status' => ['required', Rule::in(0, 1)],
            'outfits' => 'required|array',
            'pricings' => 'required|array',
        ]);

        // dd($validatedData);
        try {
            $room = Room::find($id);

            // next update the connected the room & pricing on outfits
            $room->outfits()->sync($validatedData['outfits']);
            $room->pricings()->sync($validatedData['pricings']);

            // if coverImage is set, then update
            if (isset($request['cover_image'])) {
                $room->update([
                    'cover_image' => $this->fileService->upload($request['cover_image'], $id),
                ]);
            }

            // if overviewImage is set, then update
            if (isset($request['overview_image'])) {
                $room->update([
                    'overview_image' => $this->fileService->upload($request['overview_image'], $id),
                ]);
            }

            // finaly update the reste fields
            $room->update([
                'name' => $validatedData['name'],
                'site_url' => $validatedData['site_url'],
                'description' => $validatedData['description'],
                'status' => $validatedData['status'],
            ]);

            toast("La salle a été mise-à-jour avec succes", 'success');
            return to_route('management.room.index');
        } catch (\Exception $e) {
            // Handle transaction failure
        }
    }

    public function destroy($id)
    {
        try {
            $room = Room::find($id);
    
            // 1. first delete the file images
            $this->fileService->delete([$room->cover_image, $room->overview_image]);
    
            // 2. next delete relation between this room and [outfits, princings]
            $room->outfits()->detach();
            $room->pricings()->detach();
    
            // 3. delete the outfit
            $room->delete();
    
            // 4. finaly redirect with success msg
            toast("La salle a été supprimée avec succes", 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle transaction failure
        }
    }
}
