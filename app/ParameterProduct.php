<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParameterProduct extends Model
{
    protected $fillable  = [
        'product_id',
        'parameter_id'
    ];
}
