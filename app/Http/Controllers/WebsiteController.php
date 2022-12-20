<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Controllers\XenditController;

class WebsiteController extends Controller
{
    public function home()
    {
        $products = Product::where('status', 1)->get()->groupBy('type');
        // $products = Product::get();
        return view('layouts.home', [ 
            'products' => $products
        ]);
    }
    
    public function formtopup($slug)
    {
        $xendit = new XenditController;
        $channels = $xendit->channel_list();
        $product = Product::with('product_details')->where('slug', $slug)->first();
        return view('layouts.formtopup', ['product' => $product, 'channels' => $channels]);
    }

    public function invoice()
    {
        return view('layouts.invoice');
    }
    
}
