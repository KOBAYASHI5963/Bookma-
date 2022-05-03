<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
    protected $table = 'book_images';

    protected $fillable = [
        'book_images_url','book_id'
    ];

    // リレーション
    Public function book()
    {
    return $this->belongsTo('App\Book','book_id','id');
    }
}
