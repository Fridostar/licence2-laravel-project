<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PricingController extends Controller
{
    public $isCreateModal = true;

    public function index() {
        $pricings = Pricing::all();

        return view('backoffice.managers.pricing.index', [
            'pricingList' => $pricings,
            'isCreateModal' => $this->isCreateModal
        ]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        // dd($validatedData);

        Pricing::create([
            'name' => $validatedData['name'],
            'duration' => $validatedData['duration'],
            'price' => $validatedData['price'],
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('creatSucessifullMessage', "Nouvel type d'abonnement ajouté avec succes");
    }
    
    public function show($id)
    {
        $pricing = Pricing::find($id);
        
        return view('backoffice.managers.pricing.show', [
            'pricing' => $pricing
        ]);
    }
    
    public function openEditModal($id)
    {
        $this->isCreateModal = false;
    }

    public function update(Request $request, $id)
    {
        $this->isCreateModal = false;
        
    }
    
    public function destroy($id)
    {
    }
}
