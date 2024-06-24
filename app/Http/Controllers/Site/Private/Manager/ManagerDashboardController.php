<?php

namespace App\Http\Controllers\Site\Private\Manager;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;

class ManagerDashboardController extends Controller
{
    public function home() {
        return view('site.private.dashboad.manager.home', [
            'subscribersList' => 500,
            'subscriptionsList' => 1000
        ]);
    }
}
