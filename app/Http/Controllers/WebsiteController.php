<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home()
    {
        return view('layouts.home');
    }

    public function formtopup()
    {
        return view('layouts.formtopup');
    }

    public function invoice()
    {
        return view('layouts.invoice');
    }
    
}
