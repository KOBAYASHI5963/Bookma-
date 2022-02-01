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

  Public function Category()
  {
    return $this->belongsToMany('App\Category');
  }

  Public function ShippingAreas()
  {
    return $this->belongsToMany('App\ShippingAreas');
  }

  Public function ShippingMethods()
  {
    return $this->belongsToMany('App\ShippingMethods');
  }
  
}
