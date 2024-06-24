<?php

namespace App\Http\Controllers\Site\Private\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function home() {
        return view('site.private.dashboad.user.home', [
            'subcription' => null,
        ]);
    }
}
