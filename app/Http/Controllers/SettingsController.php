<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function show()
    {
        // 設定を表示
        return view('settings');
    }

    public function edit()
    {
        // 設定編集フォームを表示
        return view('settings.edit');
    }

    public function update(Request $request)
    {
        // 設定を更新
        // バリデーションと更新処理を追加
        return redirect()->route('settings');
    }
}
