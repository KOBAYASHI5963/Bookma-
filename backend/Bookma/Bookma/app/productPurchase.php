<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productPurchase extends Model
{
    protected $fillable = [
        'user_id','book_id','user_id'
    ];

    // リレーション
    Public function user()
    {
      return $this->belongsTo('App\User');
    }

    Public function book()
    {
      return $this->belongsTo('App\Book');
    }

    Public function shippingAddress()
    {
    return $this->belongsTo('App\ShippingAddress');
    }

}
