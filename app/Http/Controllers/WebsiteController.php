<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Controllers\XenditController;
use App\Http\Controllers\TransactionController;
use App\Transaction;
use App\ProductDetail;

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


    public function invoice($invoice_id)
    {
        $xendit = new XenditController;
        $transaction = Transaction::with('product')->where('invoice_id', $invoice_id)->first();
        $channels = $xendit->channel_list();
        foreach ($channels as $value) {
            if ($value['channel_code'] == $transaction->channel_code) {
                $channel_category = $value;
            }
        }
        if($transaction->payment_status == 0){
            $payment_status = 'Belum Bayar' ;
        }else{
            $payment_status = 'Sudah Bayar' ;
        }

        if ($transaction->transaction_status == 0) {
            $transaction_status = 'Belum Diproses';
        }else if ($transaction->transaction_status == 1){
            $transaction_status = 'Diproses';
        }else if($transaction->transaction_status == 2){
            $transaction_status = 'Suskes';
        }else {
            $transaction_status = 'Gagal/Expired';
        }
        return view('layouts.invoice', ['transaction' => $transaction, 'channel' => $channel_category, 'payment_status' => $payment_status, 'transaction_status' => $transaction_status]);
    }

    public function confirm_order(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $xendit = new XenditController;
        $transaction = new TransactionController;
        $param = $transaction->rumus_param($request);
        $channels = $xendit->channel_list();
        foreach ($channels as $value) {
            if ($value['channel_code'] == $request->channel_code) {
                $channel_category = $value;
            }
        }
        $product = ProductDetail::where('code', $request->product_id)->first();
        $total = $transaction->cek_admin_fee($product->price, $channel_category['channel_category']);
        return view('layouts.confirm-order', ['data' => $data, 'product' => $product, 'channel' => $channel_category, 'param' => $param, 'total_amount' => $total]);
    }

    
}
