<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Services\FedapayService;

class BillingController extends Controller
{
    /**
     * USE FEDAPAY WEBHOOK FOR PURCHASES TRANSACTIONS
     */
    public function useFedapay()
    {
        $fedapayService = new FedapayService();
        return $fedapayService->useWebhook();
    }
}