<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XenditController;
use Illuminate\Support\Str;
use App\Transaction;
use App\ProductDetail;


class TransactionController extends Controller
{
    public function create_transaction(Request $request)
    {
        //cek channel 
        $xendit = new XenditController;
        $channels = $xendit->channel_list();
        foreach ($channels as $value) {
            if ($value['channel_code'] == $request->channel_code) {
                $channel_category = $value['channel_category'];
            }
        }
        $product = ProductDetail::where('code', $request->product_id)->first();
        $data = Transaction::create([
            'id'                => Str::uuid()->toString(),
            'invoice_id'        => 'INV'.time(),
            'payment_id'        => '',
            'payment_status'    => 0,
            'transaction_status'=> 0,
            'amount'            => $product->price,
            'total_amount'      => $this->cek_admin_fee($product->price, $request->channel_code),
            'customer_number'   => $this->rumus_param($request),
            'nickname'          => '',
            'product_id'        => $request->product_id,
            'product_code'      => $request->product_code,
            'channel_category'  => $channel_category,
            'channel_code'      => $request->channel_code,
            'qr_string'         => '',
            'va_number'         => ''
        ]);
        
        //terusakan ke xendit
        $xendit = new XenditController;
        $result = $xendit->create_payment($data->invoice_id);
        $result = json_decode(json_encode($result));
        
        $transaction = Transaction::where('invoice_id', $data->invoice_id)->first();
        $transaction->payment_id = $result->id;
        $transaction->qr_string = !empty($result->qr_string) ? $result->qr_string : '';

        $transaction->va_number = !empty($result->account_number) ? $result->account_number : (!empty($result->payment_code) ? $result->payment_code : '');
        $transaction->save();

        return redirect()->route('invoice', $transaction->invoice_id);
    }

    public function cek_admin_fee($amount, $code)
    {
        if ($code ==  'VIRTUAL_ACCOUNT') {
            return $amount + 4000;
        } elseif ($code ==  'RETAIL_OUTLET') {
            return $amount + 5000;
        } else {
            return $amount + ($amount * 7/1000);
        }
    }
    
    public function rumus_param(Request $request)
    {
        if($request->user_id != null && $request->zone_id == null && $request->server_id == null && $request->no_tlp == null && $request->no_pelanggan == null){
            return $request->user_id;
        } elseif ($request->user_id != null && $request->zone_id != null && $request->server_id == null && $request->no_tlp == null && $request->no_pelanggan == null) {
            return $request->user_id.$request->zone_id;
        } elseif ($request->user_id != null && $request->zone_id == null && $request->server_id != null && $request->no_tlp == null && $request->no_pelanggan == null) {
            return $request->server_id.$request->user_id;
        } elseif ($request->user_id == null && $request->zone_id == null && $request->server_id == null && $request->no_tlp != null && $request->no_pelanggan == null) {
            return $request->no_tlp;
        } else {
            return $request->no_pelanggan;
        }
    }
}
