<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
    'id',
    'invoice_id',
    'payment_id',
    'payment_status',
    'transaction_status',
    'amount',
    'total_amount',
    'customer_number',
    'nickname',
    'product_id',
    'product_code',
    'channel_category',
    'channel_code',
    'qr_string',
    'va_number'
    ];

    public function product()
    {
        return $this->HasOne('App\ProductDetail', 'code', 'product_id');
    }
}
