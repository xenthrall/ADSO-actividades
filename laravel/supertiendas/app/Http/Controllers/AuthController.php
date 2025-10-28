<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function verlogin(Request $request)
    {
        // Handle login logic
        return view('auth.login');
    }
}
