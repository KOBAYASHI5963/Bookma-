<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferAccountSetting extends Model
{
    protected $table = 'transfer_account_settings';

    protected $fillable = [
        'user_id', 'bank_name', 'bank_code', 'branch_name', 'branch_code', 'deposit_type', 'account_number', 'account_name' 
    ];

    // リレーション
    Public function user()
  {
    return $this->belongsTo('App\User');
  }
}