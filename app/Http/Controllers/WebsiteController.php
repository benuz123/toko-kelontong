<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function endar()
    {
        $data = 'amat';

        return view('layouts.list', [
            'data' => $data        
        ]);
    }

    public function milos()
    {
        return view('layouts.detail');
    }
    
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
