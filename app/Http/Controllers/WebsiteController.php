<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Controllers\XenditController;
use App\Http\Controllers\TransactionController;
use App\Transaction;
use App\ProductDetail;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

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
        $this->validate($request,[
            'channel_code' => 'required',
            'product_id' => 'required'
        ]);

        $data = $request->all();
        unset($data['_token']);
        $xendit = new XenditController;
        $transaction = new TransactionController;
        $param = $transaction->rumus_param($request);
        if (!$param) {
           return redirect()->back()->with('error', 'Isi nomor tujuan');
        }
        $channels = $xendit->channel_list();
        foreach ($channels as $value) {
            if ($value['channel_code'] == $request->channel_code) {
                $channel_category = $value;
            }
        }
        $product = ProductDetail::where('code', $request->product_id)->first();
        $product_category = Product::where('id', $product->product_id)->first();
        if ($product_category->type == 'Pascabayar'){
            $body = json_encode([
                'code'              => $product->code,
                'customer_number'   => $param,
            ]);
            $headers = [
                'Content-Type'  => 'application/json', 
                'Accept'        => 'application/json',
                'XXX-Signature' => 'sha1=' . hash_hmac('sha1', $body, env('BILLER_API_SECRET'))
            ]; 
            $send = [
                'headers'   => $headers,
                'body'      => $body  
            ];
            $client = new Client;
            $result = $client->post(env('BILLER_API_URL')."inquiry", $send)->getBody()->getContents();
            $response = json_decode($result);
            if ($response->status == 200) {
                $total = $transaction->cek_admin_fee($response->data->price, $channel_category['channel_category']);
                return view('layouts.confirm-order', ['data' => $data, 'product' => $product, 'channel' => $channel_category, 'param' => $param, 'total_amount' => $total, 'nickname' => $response->data->name, 'biller_ref_id' => $response->data->biller_ref_id]);
            } else {
                return redirect()->back()->with('error', 'Nomor tujuan Tidak Ditemukan/ Sudah Dibayar');
            }
        }
        $total = $transaction->cek_admin_fee($product->price, $channel_category['channel_category']);
        return view('layouts.confirm-order', ['data' => $data, 'product' => $product, 'channel' => $channel_category, 'param' => $param, 'total_amount' => $total, 'nickname' => null, 'biller_ref_id' => null]);
    }

    
}
