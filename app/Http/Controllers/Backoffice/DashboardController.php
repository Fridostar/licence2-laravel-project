<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('backoffice.dashboard');
    }

    public function roomsList() {
        return "Hello";
    }

    public function subscription() {
        // 
    }
}
