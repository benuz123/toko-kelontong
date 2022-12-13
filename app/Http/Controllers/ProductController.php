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

    public function edit_product($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product) {
            return view('backoffice.product.edit', [
                'product' => $product
            ]);
        } else{
            return redirect()->route('product');
        }
    }

    public function update_product(Request $request)
    {
        //menyimpan
        $product = Product::where('id', $request->id)->first();

        if ($product == null) {
            return redirect()->route('backoffice');
        } 

        $product->update([
            'name'      => $request->name,
            'status'    => $request->status,
            'type'      => $request->type,
            'img'       => $request->img,
            'code'      => $request->code,
            'slug'      => Str::slug($request->name)
        ]);

        return redirect()->route('product');
        
    }

    public function hapus_product($id)
    {
        $product = Product::where('id', $id)->first();
        if ($product) {
            $product->delete();
            return redirect()->route('product');
        } else{
            return redirect()->route('product');
        }
    }
}
