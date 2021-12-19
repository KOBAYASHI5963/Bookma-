<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id', 'profile_image', 'introduce'
    ];

    // リレーション
    Public function user()
  {
    return $this->belongsTo('App\User');
  }
}
