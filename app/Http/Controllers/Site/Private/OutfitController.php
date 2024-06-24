<?php

namespace App\Http\Controllers\Site\Private;

use App\Http\Controllers\Controller;
use App\Models\Outfit;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class OutfitController extends Controller
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

    /**
     * 
     */
    public function index(Request $request)
    {
        // get the search field value
        $search = $request->input('search');

        if( $this->authenticatedUser->role == "admin") {
            // do filtering
            if (isset($search)) {
                $outfitList = Outfit::where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orderBy('id', 'desc')
                    ->paginate();
            } else {
                $outfitList = Outfit::orderBy('id', 'desc')->paginate(9);
            }
        } else {
            // do filtering
            if (isset($search)) {
                $outfitList = $this->authenticatedUser->outfits()
                    ->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orderBy('id', 'desc')
                    ->paginate();
            } else {
                $outfitList = $this->authenticatedUser->outfits()->orderBy('id', 'desc')->paginate();
            }
        }

        // dd($outfitList);
        return view('site.private.outfit.index', [
            'outfitList' => $outfitList,
        ]);
    }
    
    /**
     * 
     */
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
        try {
            // Perform database operations
            $outfit = Outfit::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'sale_price' => $validatedData['sale_price'],
                'cover_image' => 'temporary_url',
                'status' => $validatedData['status'],
                'user_id' => Auth::user()->id,
            ]);

            // add image and update coverImageUrl in database
            $outfit->update([
                'cover_image' => $this->fileService->upload($validatedData['cover_image'], $outfit->id),
            ]);

            toast("Nouvel équipement ajouté avec succes", 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle transaction failure
        }
    }
    
    /**
     * 
     */
    public function show($id)
    {
        return view('site.private.outfit.show', [
            'outfit' => Outfit::find($id)
        ]);
    }
    
    /**
     * 
     */
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
        try{
            $outfit = Outfit::find($id);

            if (isset($request['cover_image'])) {
                $outfit->update([
                    'cover_image' => $this->fileService->upload($validatedData['cover_image'], $outfit->id),
                ]);
            }
            
            $outfit->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'sale_price' => $validatedData['sale_price'],
                'status' => $validatedData['status'],
            ]);
    
            toast("L'équipement a été mise-à-jour avec succes", 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle transaction failure
        }
        
    }
    
    /**
     * 
     */
    public function destroy($id)
    {
        try{
            $outfit = Outfit::find($id);

            // 1. first delete the file image
            $this->fileService->delete($outfit->cover_image);

            // 2. next delete relation between this outfit and rooms
            $outfit->rooms()->detach();

            // 3. delete the outfit
            $outfit->delete();

            // 4. finaly redirect with success msg
            toast("L'équipement à été supprimé avec succes", 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle transaction failure
        }
    }
}
