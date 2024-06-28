<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        try {
            return view('site.private.purchase.index', [
                "purchaseList" => Purchase::orderBy('created_at', 'desc')->paginate()
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * 
     */
    public function store(
        $transactionId,
        $transactionAmount,
        $transactionPricing,
        $transactionOutfitId,
        $transactionUserId,
    )
    {
        // DB::beginTransaction();
        Purchase::create([
            'transaction_id' => $transactionId,
            'amount' => $transactionAmount,
            'pricing_id' => $transactionPricing,
            'outfit_id' => $transactionOutfitId,
            'user_id' => $transactionUserId,
        ]);
        // DB::commit();
    }

    /**
     * 
     */
    public function show($id)
    {
        try {
            return view('site.private.purchase.show', [
                "purchase" => Purchase::findOrFail($id)
            ]);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    /**
     * 
     */
    public function update($id)
    {
        try {
            $model = Purchase::findOrFail($id);

            if ($model->status == 'pending') {
                DB::beginTransaction();
                    $model->update([
                        'status' => 'closed'
                    ]);
                DB::commit();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
