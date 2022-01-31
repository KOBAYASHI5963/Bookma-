<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingArea extends Model
{
    protected $table = 'shipping_areas';

    protected $fillable = [
        'area'
    ];
}
