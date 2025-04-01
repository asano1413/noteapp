<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function showProfileView()
    {
        return view('profile');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'ログインしてください。');
        }

        $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users,email,' . $request->user()->id,
          'password' => 'nullable|string|min:8|confirmed',
      ]);

        $user = $request->user();

        DB::transaction(function () use ($request, $user) {
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            if ($user->isDirty()) {
                $user->save();
            }
        });

        return redirect()->route('mypage')->with('success', 'プロフィールが更新されました。');
    }
}
