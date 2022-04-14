<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'user_id'
    ];

    // リレーション
    Public function user()
    {
      return $this->belongsTo('App\User');
    }

    Public function books()
    {
      return $this->belongsToMany('App\Book', 'cart_books', 'cart_id', 'book_id');
    }

}