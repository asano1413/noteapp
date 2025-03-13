<?php

namespace App\Http\Controllers\LoginController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login()
    {
        // ログインフォームを表示
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // ログイン処理
        // バリデーションと認証処理を追加
        return redirect()->route('index');
    }

    public function logout()
    {
        // ログアウト処理
        return redirect()->route('index');
    }
}
