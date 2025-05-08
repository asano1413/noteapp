<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function show()
    {
        return view('settings');
    }

    public function edit()
    {
        return view('settings.edit');
    }

    public function update(Request $request)
    {
        return redirect()->route('settings');
    }
}
