<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingArea extends Model
{
    protected $table = 'shipping_areas';

    protected $fillable = [
        'area'
    ];

    // リレーション
    Public function books()
    {
    return $this->hasMany('App\Book');
    }

    Public function shippingAddresses()
    {
    return $this->hasMany('App\ShippingAddress');
    }

    Public function productPurchases()
    {
      return $this->hasMany('App\productPurchase');
    }

}
