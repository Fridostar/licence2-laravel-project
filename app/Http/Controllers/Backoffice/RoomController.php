<?php

namespace App\Http\Controllers\Backoffice;

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
    public function index()
    {
        // sweetalert msg config
        $title = "Êtes-vous sûr de vouloir supprimer ? ";
        $text = "Notez bien que cette action est irreversible !";
        confirmDelete($title, $text);

        // view with data
        return view('backoffice.managers.room.index', [
            'roomLists' => Room::orderBy('id', 'desc')->paginate(),
        ]);
    }


    public function create()
    {
        return view('backoffice.managers.room.form', [
            'room' => new Room(),
            'outfits' => Outfit::pluck('name', 'id'),
            'pricings' => Pricing::pluck('name', 'id'),

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
            'pricings' => 'required|array',
        ]);

        // dd($validatedData);
        (isset($request->site_url) == false) ? $siteUrl = 'http://127.0.0.1:8000' : $siteUrl = $validatedData['site_url'];

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

        // save new image in storage
        $fileService = new FileService;
        $coverImageUrl = $fileService->upload($validatedData['cover_image'], $room->id);
        $overviewImageUrl = $fileService->upload($validatedData['overview_image'], $room->id);

        // then update the room images url
        $room->cover_image = $coverImageUrl;
        $room->overview_image = $overviewImageUrl;
        $room->save();

        // finaly redirect with success msg
        toast("La nouvelle salle a été ajouté avec succes", 'success');
        return to_route('manager.room.index');
    }

    public function show($id)
    {
        return view('backoffice.managers.room.show', [
            'room' => Room::find($id)
        ]);
    }


    public function edit($id)
    {
        return view('backoffice.managers.room.form', [
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
        $room = Room::find($id);
        $fileService = new FileService;

        // next update the connected the room & pricing on outfits
        $room->outfits()->sync($validatedData['outfits']);
        $room->pricings()->sync($validatedData['pricings']);

        // if coverImage is set, then update
        if (isset($request['cover_image'])) {
            $coverImageUrl = $fileService->upload($request['cover_image'], $id);
            $room->update([
                'cover_image' => $coverImageUrl,
            ]);
        }

        // if overviewImage is set, then update
        if (isset($request['overview_image'])) {
            $overviewImageUrl = $fileService->upload($request['overview_image'], $id);
            $room->update([
                'overview_image' => $overviewImageUrl,
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
        return to_route('manager.room.index');
    }

    public function destroy($id)
    {
        $room = Room::find($id);

        // first delete the related resource image

        // next delete resource
        $room->outfits()->detach();
        $room->pricings()->detach();

        // delatethe resource
        $room->delete();

        // finaly redirect with success msg
        toast("La salle a été supprimée avec succes", 'success');
        return redirect()->back();
    }
}
