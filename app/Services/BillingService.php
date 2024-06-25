<?php

namespace App\Services;

use App\Http\Controllers\Billing\PurchaseController;
use App\Http\Controllers\Billing\SubscriptionController;
use App\Http\Controllers\Billing\TransactionController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BillingService
{
    public function todoAfterSuccessTransaction(
        $reference,
        $amount,
        $amountTtc,
        $option,
        $status,
        $pricingId,
        $roomId,
        $outfitId,
        $userId
    ) {
        $mailService = new MailService();
        $transactionController = new TransactionController();
        $purchaseController = new PurchaseController();
        $subscriptionController = new SubscriptionController();

        DB::beginTransaction();
        // get customer info
        $customer = User::find($userId);

        $transaction = $transactionController->store(
            $reference,
            $amount,
            $amountTtc,
            $option,
            $status,
            $pricingId,
            $roomId,
            $outfitId,
            $userId
        );

        if ($option == 'purchase') {
            // create purchase for user
            $purchase = $purchaseController->store(
                $transaction->id,
                $amount,
                $pricingId,
                $outfitId,
                $userId,
            );

            // 2. send mail the customer
            $mailService->sendNewPurchaseMailToCustomer(
                $customer,
                $transaction,
                $purchase
            );

            // echo "Assouka Numeric Purchase, SUCCESS !";
        } else {
            // create subscription for user
            $subscription = $subscriptionController->store(
                $transaction->id,
                $amount,
                $pricingId,
                $roomId,
                $userId,
            );

            // 4.. send mail the customer
            $mailService->sendNewSubscriptionMailToCustomer(
                $customer,
                $transaction,
                $subscription
            );

            // echo "Assouka Subscription, SUCCESS !";
        }
        DB::commit();

        return [
            'customerInfo' => $customer,
            'transactionInfo' => [
                'amountTTC' => $amountTtc,
                'option' => $option,
            ],
        ];
    }
}
