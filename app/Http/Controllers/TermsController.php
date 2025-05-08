<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermsController extends Controller
{
    public function show()
    {
        return view('terms');
    }
}
