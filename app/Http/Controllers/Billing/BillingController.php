<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use App\Services\FedapayService;
use Illuminate\Http\Request;

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

    /**
     * USE FEDAPAY WEBHOOK FOR PURCHASES TRANSACTIONS
     */
    public function useCheckoutJs()
    {
        // 
    }

    /**
     * USE FEDAPAY WEBHOOK FOR PURCHASES TRANSACTIONS
     */
    public function useCheckoutForm(Request $request)
    {
        // dd($request->all());
        return view('example');
    }
}
