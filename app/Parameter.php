<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Parameter extends Model
{
    protected $fillable  = [
        'name',
        'code'
    ];

    public function product()
    {
        return $this->belongsToMany('App\Product', 'parameter_products');
    }
}
