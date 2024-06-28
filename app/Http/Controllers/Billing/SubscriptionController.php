<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        try {
            return view('site.private.subscription.index', [
                "subscriptionList" => Subscription::orderBy('created_at', 'desc')->paginate()
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
        $transactionPricingId = null,
        $transactionRoomId = null,
        $transactionUserId,
    )
    {
        // DB::beginTransaction();
        // managers subscriptions
        $expiration = now()->addDays(365);

        // rooms subscriptions
        if(isset($transactionPricingId)) {
            $pricing = Pricing::find($transactionPricingId);
            $expiration = now()->addDays($pricing->duration);
        }

        $subscription = Subscription::create([
            'transaction_id' => $transactionId,
            'amount' => $transactionAmount,
            'expiration_date' => $expiration,
            'pricing_id' => $transactionPricingId,
            'room_id' => $transactionRoomId,
            'user_id' => $transactionUserId,
        ]);

        // update user is_subscribed
        $customer = User::find($transactionUserId);
        $customer->update([
            'is_subscribed' => true,
        ]);
        
        return $subscription;
        // DB::commit();
    }

    /**
     * 
     */
    public function show($id)
    {
        try {
            return view('site.private.subscription.show', [
                "subscription" => Subscription::findOrFail($id)
            ]);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}
