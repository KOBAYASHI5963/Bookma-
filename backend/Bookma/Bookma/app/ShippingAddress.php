<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $table = 'shipping_addresses';

    protected $fillable = [
        'user_id', 'name', 'post_code', 'prefecture', 'city', 'street', 'building_name', 'phone_number' 
    ];

    // リレーション
    Public function user()
  {
    return $this->belongsTo('App\User');
  }

  Public function shippingArea()
  {
    return $this->belongsTo('App\ShippingArea','prefecture','id');
  }

}
