<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $rateLimitKey = 'contact-form:' . $request->ip();

        if (RateLimiter::tooManyAttempts($rateLimitKey, 5)) {
            return back()->withErrors(['error' => '短時間に多くのリクエストが送信されました。しばらくしてから再度お試しください。']);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        try {
            Mail::to('mit2471509@stu.0-hara.ac.jp')->send(new ContactMail($validated));
        } catch (\Exception $e) {
            return back()->withErrors(['error' => '送信中にエラーが発生しました。もう一度お試しください。']);
        }

        RateLimiter::hit($rateLimitKey, 600);

        return back()->with('success', 'お問い合わせを送信しました。');
    }
}
