<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        return redirect()->route('index');
    }

    public function logout()
    {
        return redirect()->route('index');
    }
}
