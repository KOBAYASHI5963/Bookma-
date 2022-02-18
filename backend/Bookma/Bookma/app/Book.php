<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'user_id', 'category_id', 'product_condition', 'shipping_method_id', 'title', 'content', 'shipping_bearer', 'shipping_area', 'delivery_days', 'price','product_condition'
    ];

    // リレーション
    Public function user()
  {
    return $this->belongsTo('App\User');
  }

  Public function category()
  {
    return $this->belongsTo('App\Category','category_id','id');
  }

  Public function shippingArea()
  {
    return $this->belongsTo('App\ShippingArea','shipping_area','id');
  }

  Public function shippingMethod()
  {
    return $this->belongsTo('App\SippingMethod','shipping_method_id','id');
  }

  Public function ProductCondition()
  {
    return $this->belongsTo('App\ProductCondition','product_condition','id');
  }

  Public function BookImage()
  {
    return $this->belongsTo('App\BookImage','book_image','id');
  }
}
