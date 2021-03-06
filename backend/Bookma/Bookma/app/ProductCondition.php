<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCondition extends Model
{
    protected $table = 'product_conditions';

    protected $fillable = [
        'condition'
    ];

    // リレーション
    Public function books()
    {
    return $this->hasMany('App\Book');
    }


}
