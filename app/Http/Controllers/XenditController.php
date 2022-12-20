<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Xendit\Xendit;

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
}
