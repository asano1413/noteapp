<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalNote;

class MyPageController extends Controller
{
    public function index()
    {
        // 現在ログインしているユーザーのメモを取得
        $notes = PersonalNote::where('user_id', auth()->id())->latest()->get();

        // ビューにデータを渡して表示
        return view('mypage', compact('notes'));
    }
}
