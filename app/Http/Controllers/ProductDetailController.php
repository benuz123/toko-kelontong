<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductDetail;

class ProductDetailController extends Controller
{
    public function index()
    {
        $details = ProductDetail::get();
        return view('backoffice.product_detail.index', [
            'details' => $details
        ]);
    }

    public function tambah_detail()
    {
        return view('backoffice.product_detail.add');
    }

    public function simpan_detail(Request $request)
    {
        //menyimpan detail
        ProductDetail::create([
            'name'          => $request->name,
            'product_id'    => $request->product_id,
            'price'         => $request->price,
            'code'          => $request->code
        ]);

        return redirect()->route('product-detail');
    }
}
