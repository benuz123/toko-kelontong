<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

class BillerController extends Controller
{
    public function list_product()
    {
        $client = new Client();
        $result = $client->get(env('BILLER_API_URL').'product')->getBody()->getContents();
        $data = json_decode($result);

        return view('backoffice.biller.product-list', ['data' => $data->data]);
    }
}
