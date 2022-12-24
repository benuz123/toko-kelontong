<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;
use App\Transaction;
use DateTime;

class XenditController extends Controller
{
    public function __construct() {
        Xendit::setApiKey('xnd_development_ygtHzMVBx8uELYpZEBM4mF2sP4abELVPnHmJn8RLKSLUq9d47vPOaQMesxNKd3w');
    }

    public function get_balance()
    {
        $getBalance = \Xendit\Balance::getBalance('CASH');

        return $getBalance;
    }
    public function channel_list()
    {
        $getPaymentChannels = \Xendit\PaymentChannels::list();

        foreach ($getPaymentChannels as $key => $value) {
            if(($key >= 7 && $key <= 12)) {
                unset($getPaymentChannels[$key]);
            }
        }
        return $getPaymentChannels;
    }

    public function create_payment($invoice_id)
    {
        // cek payment code
        $data = Transaction::where('invoice_id', $invoice_id)->first();
        if ($data->channel_category ==  'VIRTUAL_ACCOUNT') {
            return $this->create_va($invoice_id);
        } elseif ($data->channel_category ==  'RETAIL_OUTLET') {
            return $this->create_retail($invoice_id);
        } else {
            
            return $this->create_qr($invoice_id);
        }
    }

    public function create_qr($invoice_id)
    {
        $data = Transaction::where('invoice_id', $invoice_id)->first();
        $params = [
            'external_id' => $data->invoice_id,
            'type' => 'DYNAMIC',
            'callback_url' => route('xendit-callback'),
            'amount' => round(intval($data->total_amount)),
        ];
        // dd($params);
        $result = \Xendit\QRCode::create($params);
        return $result;
    }

    public function create_va($invoice_id)
    {
        $data = Transaction::where('invoice_id', $invoice_id)->first();
        $tomorrow = new DateTime('now +1 day');
        $utc = gmdate('Y-m-d H:i:s', strtotime('+1 day'));
        $params = [
            "external_id"       => $data->invoice_id,
            "bank_code"         => $data->channel_code,
            "name"              => "Mas Irfan Top UP",
            "is_single_use"     => true,
            "expected_amount"   => round(intval($data->total_amount)),
            "is_closed"         => true,
            "expiration_date"   => $utc
        ];
        
        $result = \Xendit\VirtualAccounts::create($params);
        return $result;
    }

    public function create_retail($invoice_id)
    {
        
        $data = Transaction::where('invoice_id', $invoice_id)->first();
        $params = [
            'external_id' => $data->invoice_id,
            'retail_outlet_name' => $data->channel_code,
            'name' => "Mas Irfan Top UP",
            'expected_amount' => $data->total_amount
        ];
        
        $result = \Xendit\Retail::create($params);
        return $result;

    }

    public function callback(Request $request)
    {
        $token = env('XENDIT_CALLBACK_TOKEN');
        if ($request->header('x-callback-token') == $token) {
            
            //Check CAllback Payment Type
            if ($request->event == 'qr.payment') {
                $transaction = Transaction::where('invoice_id', $request->qr_code['external_id'])->first();
                if(!$transaction){
                    return json_encode([
                        'status' => 'FAILED'
                    ]);
                }
                $transaction->payment_status = 1;
                if ($request->status === 'COMPLETED') {
                    $transaction->save();
                } else {
                    $transaction->payment_status = 3;
                    $transaction->save();
                }
            } elseif ($request->callback_virtual_account_id) {
                $transaction = Transaction::where('invoice_id', $request->external_id)->first();
                if(!$transaction){
                    return json_encode([
                        'status' => 'FAILED'
                    ]);
                }
                $transaction->payment_status = 1;
                $transaction->save();
            }elseif ($request->retail_outlet_name) {
                $transaction = Transaction::where('invoice_id', $request->external_id)->first();
                if(!$transaction){
                    return json_encode([
                        'status' => 'FAILED'
                    ]);
                }
                $transaction->payment_status = 1;
                $transaction->save();
            } else {
                // Do Nothing
            }
            
            
            return response()->json([
                'message' => 'OK'
            ], 200);
        } else {
            return response()->json([
                'status' => 'FAILED'
            ], 500);
        }
    }
}
