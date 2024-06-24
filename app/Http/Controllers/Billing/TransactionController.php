<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return TransactionModel
     */
    public function store(
        $transactionReference,
        $transactionAmount,
        $transactionAmountTtc,
        $transactionOption,
        $transactionStatus,
        $transactionPricing,
        $transactionRoomId = null,
        $transactionOutfitId = null,
        $transactionUserId,
    ) {
        // save the transaction
        DB::beginTransaction();
            return Transaction::create([
                "reference" => $transactionReference,
                "amount" => $transactionAmount,
                "amount_ttc" => $transactionAmountTtc,
                "option" => $transactionOption,
                "status" => $transactionStatus,
                "pricing_id" => $transactionPricing,
                "room_id" => $transactionRoomId,
                "outfit_id" => $transactionOutfitId,
                "user_id" => $transactionUserId,
            ]);
        DB::commit();
    }
}
