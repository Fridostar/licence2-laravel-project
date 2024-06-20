<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Outfit;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class OutfitController extends Controller
{
    public function index()
    {
        $outfits = Outfit::orderBy('id', 'desc')->paginate();

        $title = "Êtes-vous sûr de vouloir supprimer ? ";
        $text = "Notez bien que cette action est irreversible !";

        confirmDelete($title, $text);

        return view('backoffice.managers.outfit.index', [
            'outfitList' => $outfits
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'sale_price' => 'required|numeric',
            'cover_image' => 'required|mimes:jpeg,png,jpg,gif',
            'status' => 'required',
        ]);

        // dd($validatedData)

        $outfit = Outfit::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'sale_price' => $validatedData['sale_price'],
            'cover_image' => 'temporary_url',
            'status' => $validatedData['status'],
            'user_id' => Auth::user()->id,
        ]);


        $file = $validatedData['cover_image'];
        $fileService = new FileService;
        $filePublicUrl = $fileService->upload($file, $outfit->id);

        $outfit->cover_image = $filePublicUrl;
        $outfit->save();

        toast("Equipement ajouté avec succes", 'success');
        return redirect()->back();
    }

    public function show($id)
    {
        $outfit = Outfit::find($id);

        return view('backoffice.managers.outfit.show', [
            'outfit' => $outfit
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
        $outfit = Outfit::find($id);

        if ($request['cover_image']) {
            $fileService = new FileService;
            $filePublicUrl = $fileService->upload($request['cover_image'], $id);

            $outfit->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'sale_price' => $validatedData['sale_price'],
                'status' => $validatedData['status'],
                'cover_image' => $filePublicUrl,
            ]);
        } else {
            $outfit->update([
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
        $outfit = Outfit::find($id);
        $outfit->delete();

        toast("Equipement supprimé avec succes", 'success');
        return redirect()->back();
    }
}
