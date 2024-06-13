<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Outfit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutfitController extends Controller
{
    public function index() {
        $outfits = Outfit::paginate(15);

        if(isset($outfits)) {
            $title = "Êtes-vous sûr de vouloir supprimer ? ";
            $text = "Notez bien que cette action est irreversible !";

            confirmDelete($title, $text);

            return view('backoffice.managers.outfit.index', [
                'outfitList' => $outfits
            ]);
        }

        return null;
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        // dd($validatedData);

        Outfit::create([
            'name' => $validatedData['name'],
            'duration' => $validatedData['duration'],
            'price' => $validatedData['price'],
            'user_id' => Auth::user()->id,
        ]);

        toast( "Equipement ajouté avec succes", 'success');
        return redirect()->back();
    }
    
    public function show($id)
    {
        $outfit = Outfit::find($id);
        
        return view('backoffice.managers.outfit.show', [
            'pricing' => $outfit
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
            'currency' => 'required|string',
        ]);

        $outfit = Outfit::find($id);

        $outfit->update([
            'name' => $validatedData['name'],
            'duration' => $validatedData['duration'],
            'price' => $validatedData['price'],
            'currency' => $validatedData['currency'],
        ]);
        
        toast( "Equipement mise-à-jour avec succes", 'success');
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        $outfit = Outfit::find($id);
        $outfit->delete();
        
        toast( "Equipement supprimé avec succes", 'success');
        return redirect()->back();
    }
}
