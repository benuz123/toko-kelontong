<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductDetail;
use App\Product;

class ProductDetailController extends Controller
{
    public function index()
    {
        $details = ProductDetail::with('products')->get();
        return view('backoffice.product_detail.index', [
            'details' => $details
        ]);
    }

    public function tambah_detail()
    {
        $products = Product::get();
        return view('backoffice.product_detail.add',[
            'products' => $products
        ]);
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

    public function edit_detail($id)
    {
        $products = Product::get();
        $product = ProductDetail::where('id', $id)->first();
        if ($product) {
            return view('backoffice.product_detail.edit', [
                'product' => $product,
                'products' => $products
            ]);
        } else{
            return redirect()->route('product-detail');
        }
    }

    public function update_detail(Request $request)
    {
        $product = ProductDetail::where('id', $request->id)->first();

        if ($product == null) {
            return redirect()->route('product-detail');
        } 

        $product->update([
            'name'          => $request->name,
            'product_id'    => $request->product_id,
            'price'         => $request->price,
            'code'          => $request->code
        ]);

        return redirect()->route('product-detail');        

    }

    public function hapus_detail($id)
    {
        $product = ProductDetail::where('id', $id)->first();
        if ($product) {
            $product->delete();
            return redirect()->route('product-detail');
        } else{
            return redirect()->route('product-detail');
        }
    }
}
