<?php

namespace App\Http\Controllers\RegisterController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function register()
    {
        // 登録フォームを表示
        return view('register');
    }

    public function store(Request $request)
    {
        // 登録処理
        // バリデーションと保存処理を追加
        return redirect()->route('login');
    }
}
