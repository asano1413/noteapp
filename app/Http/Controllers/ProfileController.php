<?php

namespace App\Http\Controllers\ProfileController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function show()
    {
        // プロフィールを表示
        return view('profile');
    }

    public function edit()
    {
        // プロフィール編集フォームを表示
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        // プロフィールを更新
        // バリデーションと更新処理を追加
        return redirect()->route('profile');
    }
}
