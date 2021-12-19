<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $table = 'user_informations';

    protected $fillable = [
        'user_id', 'profile_image', 'introduce'
    ];

    // リレーション
    Public function user()
  {
    return $this->belongsTo('App\User');
  }
}
