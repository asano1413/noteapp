<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
      $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        return redirect()->route('index')->with('success', 'お問い合わせが送信されました。');
    }
}
