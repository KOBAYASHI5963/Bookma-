<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SippingMethod extends Model
{
    protected $table = 'shipping_methods';

    protected $fillable = [
        'means'
    ];

    // リレーション
    Public function books()
    {
    return $this->hasMany('App\Book');
    }

}
