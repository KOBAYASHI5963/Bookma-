<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $table = 'shipping_addresses';

    protected $fillable = [
        'user_id', 'name', 'post_code', 'prefectures', 'city', 'street', 'building_name', 'phone_number' 
    ];

    // リレーション
    Public function user()
  {
    return $this->belongsTo('App\User');
  }
}
