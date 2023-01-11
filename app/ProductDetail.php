<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = [
        'name',
        'product_id',
        'price',
        'code'
    ];

    public function products()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

}
