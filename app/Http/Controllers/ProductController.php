<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\Parameter;
use App\ParameterProduct;

class ProductController extends Controller
{
    public function index()
    {
        //mengambil produk dari database
        $products = Product::get();
        return view('backoffice.product.index', [ 
            'products' => $products
        ]);
    }

    public function tambah_product()
    {
        $parameters = Parameter::get();
        return view('backoffice.product.add', [
            'parameters' => $parameters
        ]);
    }

    public function simpan_product(Request $request)
    {
        //menyimpan
        //  dd($request->parameters);
        $product = Product::create([
            'name'      => $request->name,
            'status'    => $request->status,
            'type'      => $request->type,
            'img'       => $request->img,
            'code'      => $request->code,
            'slug'      => Str::slug($request->name)
        ]);

        foreach ($request->parameters as $key => $parameter) {
            ParameterProduct::create([
                'parameter_id' => $parameter,
                'product_id' => $product->id
            ]);
        }

        return redirect()->route('product');
        
    }

    public function edit_product($id)
    {
        $product = Product::with('parameter')->where('id', $id)->first();
        $parameters = Parameter::get();
        if ($product) {
            return view('backoffice.product.edit', [
                'product' => $product,
                'parameters' => $parameters
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

        //data relasi dihapus semua
        ParameterProduct::where('product_id' , $product->id)->delete();

        //diisi ulang
        foreach ($request->parameters as $key => $parameter) {
            ParameterProduct::create([
                'parameter_id' => $parameter,
                'product_id' => $product->id
            ]);
        }


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
