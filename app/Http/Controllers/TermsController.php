<?php

namespace App\Http\Controllers\TermsController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermsController extends Controller
{
    public function show()
    {
        // 利用規約を表示
        return view('terms');
    }
}
