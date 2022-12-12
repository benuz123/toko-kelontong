<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('backoffice.product.index', [ 
            'products' => $products
        ]);
    }

    public function tambah_product()
    {
        return view('backoffice.product.add');
    }

    public function simpan_product(Request $request)
    {
        //menyimpan

        Product::create([
            'name'      => $request->name,
            'status'    => $request->status,
            'type'      => $request->type,
            'img'       => $request->img,
            'code'      => $request->code,
            'slug'      => Str::slug($request->name)
        ]);

        return redirect()->route('product');
        
    }
}
