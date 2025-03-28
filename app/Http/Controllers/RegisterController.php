<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{    public function showRegistrationForm()
    {
        return view('register');
    }

    // 登録データを保存
    public function store(Request $request)
    {
        // バリデーション処理
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // ユーザー作成処理（例: Userモデルを使用）
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        // ]);

        // ログインページにリダイレクト
        return redirect()->route('login')->with('success', '登録が完了しました。ログインしてください。');
    }
}
