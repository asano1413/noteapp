<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('index')->with('success', 'ログインに成功しました');
        }

        return redirect()->back()->with('error', 'ログインに失敗しました');
    }

    public function authenticate(Request $request)
    {
        return redirect()->route('mypage');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
