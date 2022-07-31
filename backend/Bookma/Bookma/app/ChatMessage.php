<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use SerializeDate;
    
    protected $fillable = ['chat_room_id', 'user_id', 'message'];

    protected $casts = [
        'created_at'        => 'datetime:Y-m-d H:i:s',    // ←日付の形式を指定
        'updated_at'        => 'datetime:Y-m-d H:i:s',    // ←日付の形式を指定
    ];

    public function chatRoom()
    {
        return $this->belongsTo('App\ChatRoom');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
