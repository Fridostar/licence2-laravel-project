<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Outfit;
use App\Models\Room;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::orderBy('id', 'desc')->paginate(50);
        $outfits = Outfit::pluck('name', 'id');

        $title = "Êtes-vous sûr de vouloir supprimer ? ";
        $text = "Notez bien que cette action est irreversible !";

        confirmDelete($title, $text);

        return view('backoffice.managers.room.index', [
            'roomLists' => $rooms,
            'outfits' => $outfits,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required|string',
            'site_url' => 'nullable|string',
            'description' => 'required|string',
            'cover_image' => 'required|mimes:jpeg,png,jpg,gif',
            'overview_image' => 'required|mimes:jpeg,png,jpg,gif',
            'status' => ['required', Rule::in(0, 1)],
            'outfits' => 'required|array',
        ]);

        dd($validatedData);

        (isset($request->site_url) == false) ? $siteUrl = 'http://127.0.0.1:8000' : $siteUrl = $validatedData['site_url'];

        /* 2nd method
            if( isset($request->site_url) ) {
                $siteUrl = $validatedData['site_url'];
            } else {
                $siteUrl = 'http://127.0.0.1:8000';
            }
        */

        /* 3rd method
            $siteUrl = 'http://127.0.0.1:8000';
            if( isset($request->site_url) )  $siteUrl = $validatedData['site_url'];
        */

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

        // next connect the room to outfits
        $room->outfits()->sync($validatedData['outfits']);

        // then update the room images url
        $file1 = $validatedData['cover_image'];
        $file2 = $validatedData['overview_image'];

        $fileService = new FileService;
        $coverImageUrl = $fileService->upload($file1, $room->id);
        $overviewImageUrl = $fileService->upload($file2, $room->id);

        $room->cover_image = $coverImageUrl;
        $room->overview_image = $overviewImageUrl;
        $room->save();

        // finaly redirect with success msg
        toast("Nouvelle salle ajouté avec succes", 'success');
        return redirect()->back();
    }

    public function show($id)
    {
        $room = Room::find($id);

        return view('backoffice.managers.room.show', [
            'room' => $room
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'sale_price' => 'required|numeric',
            'cover_image' => 'nullable|mimes:jpeg,png,jpg,gif',
            'status' => ['required', Rule::in(0, 1)],
        ]);

        // dd($validatedData);
        $room = Room::find($id);

        if ($request['cover_image']) {
            $fileService = new FileService;
            $filePublicUrl = $fileService->upload($request['cover_image'], $id);

            $room->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'cover_image' => $filePublicUrl,
                'overview_image' => $filePublicUrl['overview_image'],
                'status' => $validatedData['status'],
                
            ]);
        } else {
            $room->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'sale_price' => $validatedData['sale_price'],
                'status' => $validatedData['status'],
            ]);
        }

        toast("Equipement mise-à-jour avec succes", 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        // first delete the related resource image

        // next delete resource
        $room = Room::find($id);
        $room->delete();

        // finaly redirect with success msg
        toast("Equipement supprimé avec succes", 'success');
        return redirect()->back();
    }
}


