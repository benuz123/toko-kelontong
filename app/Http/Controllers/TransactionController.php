<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\XenditController;
use Illuminate\Support\Str;
use App\Transaction;
use App\ProductDetail;
use App\Product;
use Illuminate\Broadcasting\Channel;

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
        $product_category = Product::where('id', $product->product_id)->first();
        if ($product_category->type == 'Prabayar') {
            //cek minimal pembayaram
            if ($channel_category == 'VIRTUAL_ACCOUNT') {
               if($product->price <= 10000){
                    return redirect()->route('formtopup', $product_category->slug)->with('error', 'Virtual Account MInimal 10000');
               }
            }elseif ($channel_category == 'RETAIL_OUTLET') {
                if ($product->price <= 10000) {
                    return redirect()->route('formtopup', $product_category->slug)->with('error', 'Retail Outlet MInimal 10000');
                }
            }else{
                
            }
        }
        $data = Transaction::create([
            'id'                => Str::uuid()->toString(),
            'invoice_id'        => 'INV'.time(),
            'payment_id'        => '',
            'biller_ref_id'     => !empty($request->biller_ref_id) ? $request->biller_ref_id : '' ,
            'payment_status'    => 0,
            'transaction_status'=> 0,
            'amount'            => !empty($request->total_amount) ? $request->total_amount :  $product->price,
            'total_amount'      => !empty($request->total_amount) ? $request->total_amount : $this->cek_admin_fee($product->price, $channel_category),
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

    public function index()
    {
        $data = Transaction::with('product')->orderBy('created_at')->get();
        $total_pendapatan = Transaction::where('transaction_status', 2)->get();
        $hasil_total = 0;
        foreach($total_pendapatan as $total){
            $hasil_total = $hasil_total + $total->amount;
        }
        return view('backoffice.transaction.index', ['transactions' => $data, 'hasil_total' => $hasil_total]);
    }
}
