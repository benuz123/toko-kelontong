<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class AdminController extends Controller
{
    public function index()
    {
        $data = Transaction::with('product')->orderBy('created_at', 'DESC')->take(5)->get();

        return view('backoffice.dashboard', ['transactions' => $data]);
    }
}