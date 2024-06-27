<?php

namespace App\Services;

class FedapayService
{
    public function createUser()
    {
        /* Remplacez VOTRE_CLE_API_SECRETE par votre clé API secrète */
        \FedaPay\FedaPay::setApiKey( env('FEDAPAY_SECRET_KEY') );

        /* Précisez si vous souhaitez exécuter votre requête en mode test ou live */
        \FedaPay\FedaPay::setEnvironment('sandbox'); //ou setEnvironment('live');

        /* Créer le client */
        \FedaPay\Customer::create(array(
            "firstname" => "Firdaous",
            "lastname" => "Mohamed",
            "email" => "mohamedfidorce@gmail.com",
            "phone_number" => [
                "number" => "+22950733202",
                "country" => 'bj' // 'bj' code indicatif du Bénin
            ]
        ));
    }

    public function useCheckout()
    {
        $transInfo = json_decode($_COOKIE['approuvedTransaction']);

        if (isset($transInfo)) {
            $digitpayService = new BillingService();
            $digitpayService->todoAfterSuccessTransaction(
                $reference = $transInfo->reference,
                $amount = $transInfo->amount,
                $amountTtc = $transInfo->amount_debited,
                $option = $transInfo->custom_metadata->option,
                $status = $transInfo->status,
                $pricingId = $transInfo->custom_metadata->pricing_id,
                $roomId = $transInfo->custom_metadata->room_id,
                $outfitId = $transInfo->custom_metadata->outfit_id,
                $userId = $transInfo->custom_metadata->user_id
            );
        }
    }
}
