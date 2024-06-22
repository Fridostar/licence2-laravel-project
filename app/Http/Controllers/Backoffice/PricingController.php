<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PricingController extends Controller
{
    // CRUD opérations

    public function index() {
        $pricings = Pricing::paginate();

        if(isset($pricings)) {
            $title = "Êtes-vous sûr de vouloir supprimer ? ";
            $text = "Notez bien que cette action est irreversible !";

            confirmDelete($title, $text);

            return view('backoffice.managers.pricing.index', [
                'pricingList' => $pricings
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

        Pricing::create([
            'name' => $validatedData['name'],
            'duration' => $validatedData['duration'],
            'price' => $validatedData['price'],
            'user_id' => Auth::user()->id,
        ]);

        toast( "Nouvel type d'abonnement ajouté avec succes", 'success');
        return redirect()->back();

        // return redirect()->back()->with('creatSucessifullMessage', "Nouvel type d'abonnement ajouté avec succes");
    }
    
    public function show($id)
    {
        $pricing = Pricing::find($id);
        
        return view('backoffice.managers.pricing.show', [
            'pricing' => $pricing
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

        $pricing = Pricing::find($id);

        $pricing->update([
            'name' => $validatedData['name'],
            'duration' => $validatedData['duration'],
            'price' => $validatedData['price'],
            'currency' => $validatedData['currency'],
        ]);

        toast( "Type d'abonnement modifié avec succes", 'success');
        return redirect()->back();

        // return redirect()->back()->with('creatSucessifullMessage', "Type d'abonnement modifié avec succes");
    }
    
    public function destroy($id)
    {
        $pricing = Pricing::find($id);
        $pricing->delete();
        
        toast( "Type d'abonnement supprimé avec succes", 'success');
        return redirect()->back();
    }
}
