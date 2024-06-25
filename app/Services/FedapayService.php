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

    public function useWebhook()
    {
        // You can find your endpoint's secret key in your webhook settings
        $endpoint_secret = env('FEDAPAY_WEBHOOK_KEY');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_X_FEDAPAY_SIGNATURE'];
        $event = null;

        try {
            $event = \FedaPay\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload

            http_response_code(400);
            exit();
        } catch (\FedaPay\Error\SignatureVerification $e) {
            // Invalid signature

            http_response_code(400);
            exit();
        }

        if ($event->name == 'transaction.approved') {

            $digitpayService = new BillingService();
            $digitpayService->todoAfterSuccessTransaction(
                $reference = $event->entity->reference,
                $amount = $event->entity->amount,
                $amountTtc = $event->entity->amount_debited,
                $option = $event->entity->custom_metadata->option,
                $status = $event->entity->status,
                $pricingId = $event->entity->custom_metadata->pricing_id,
                $roomId = $event->entity->custom_metadata->room_id,
                $outfitId = $event->entity->custom_metadata->outfit_id,
                $userId = $event->entity->custom_metadata->user_id
            );
        }
        http_response_code(200);
    }
}
