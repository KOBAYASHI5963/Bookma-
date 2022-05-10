<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = [
        'user_id', 'transfer_account_id', 'amount _money', 'application_status'
      ];

    // リレーション
    Public function user()
    {
      return $this->belongsTo('App\User');
    }

}