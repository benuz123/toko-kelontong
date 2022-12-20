<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable  = [
        'name',
        'status',
        'type',
        'img',
        'code',
        'slug'
    ];

    public function product_details()
    {
        return $this->hasMany('App\ProductDetail', 'product_id', 'id');
    }

    public function parameter()
    {
        return $this->belongsToMany('App\Parameter', 'parameter_products');
    }
}
