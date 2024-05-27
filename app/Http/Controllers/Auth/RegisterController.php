<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request )  {
        dd($request->all());

        // validate requeste input data

        // create user;

        // send verification mail
        
        // redirect to login page
        return view('createPost');
    }
}
