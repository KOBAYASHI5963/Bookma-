<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'user_id', 'category_id', 'product_condition', 'shipping_method_id', 'title', 'content', 'shipping_bearer', 'shipping_area', 'delivery_days', 'price'
    ];

    
    // リレーション
    Public function user()
  {
    return $this->belongsTo('App\User');
  }

  Public function category()
  {
    return $this->belongsTo('App\Category');
  }

  Public function shippingArea()
  {
    return $this->belongsTo('App\ShippingArea');
  }

  Public function shippingMethod()
  {
    return $this->belongsTo('App\ShippingMethod');
  }
  
}
