<?php

namespace App\Http\Controllers\Site\Private\User;

use App\Http\Controllers\Controller;
use App\Services\FedapayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function home() {
        $user = Auth::user();

        // execute the fedapay callback action
        $fedapayService = new FedapayService();
        $fedapayService->useCheckout();

        return view('site.private.dashboad.user.home', [
            'purchasesList' => $user->purchases,
            'subscriptionList' => $user->subscriptions,
        ]);
    }
}
