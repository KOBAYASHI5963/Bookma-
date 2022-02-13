<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
    protected $table = 'book_images';

    protected $fillable = [
        'book_images_url'
    ];

    // リレーション
    Public function books()
    {
    return $this->hasMany('App\Book');
    }
}
