<?php

namespace App\Http\Controllers\Site\Private\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function home() {
        return view('site.private.dashboad.admin.home', [
            'informations' => null,
        ]);
    }
}
