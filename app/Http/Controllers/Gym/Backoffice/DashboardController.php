<?php

namespace App\Http\Controllers\Gym\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('gym.backoffice.dashboard');
    }

    public function roomsList() {
        return "Hello";
    }

    public function subscription() {
        // 
    }
}
