<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class BillerController extends Controller
{
    public function callback(Request $request)
    {
        $secret = env('WEBSITE_SECRET');
        $post_data = file_get_contents('php://input');
        $signature = hash_hmac('sha1', $post_data, $secret);
        

        if ($request->header('biller-signature') == 'sha1='.$signature) {
            $data = Transaction::where('invoice_id', $request->invoice_id)->first();
            $data->transaction_status = $request->transaction_status;
            $data->save();

            return json_encode([
                'status' => 'SUCCESS'
            ]);

        } else {
            return json_encode([
                'status' => 'FAILED'
            ]);
        }
    }
}
