<?php

namespace App\Http\Controllers\ContactController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function show()
    {
        // お問い合わせフォームを表示
        return view('contact');
    }

    public function send(Request $request)
    {
        // お問い合わせ内容を送信
        // バリデーションと送信処理を追加
        return redirect()->route('contact');
    }
}
