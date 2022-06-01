<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'scope'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // リレーション
    Public function transferAccountSetting()
  {
    return $this->hasOne('App\TransferAccountSetting');
  }

    Public function userProfile()
  {
    return $this->hasOne('App\UserProfile');
  }

    Public function shippingAddresses()
  {
    return $this->hasMany('App\ShippingAddress');
  }

    Public function books()
  {
    return $this->hasMany('App\Book');
  }
   
    Public function favoritesBooks()
  {
    return $this->belongsToMany('App\Book', 'favorites', 'user_id', 'book_id');
  }

  Public function followings()
  {
    return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
  }

  Public function followers()
  {
    return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
  }

  public function follow($userId)
  {
      // 既にフォローしているかの確認
      $exist = $this->is_following($userId);
      // 相手が自分自身ではないかの確認
      $its_me = $this->id == $userId;
    
      if ($exist || $its_me) {
          // 既にフォローしていれば何もしない
          return false;
      } else {
          // 未フォローであればフォローする
          $this->followings()->attach($userId);
          return true;
      }
    }
    
  public function unfollow($userId)
  {
      // 既にフォローしているかの確認
      $exist = $this->is_following($userId);
      // 相手が自分自身かどうかの確認
      $its_me = $this->id == $userId;
    
      if ($exist && !$its_me) {
          // 既にフォローしていればフォローを外す
          $this->followings()->detach($userId);
          return true;
      } else {
          // 未フォローであれば何もしない
          return false;
      }
  }
    
  public function is_following($userId)
  {
    return $this->followings()->where('follow_id', $userId)->exists();
  }

  Public function cart()
  {
    return $this->hasOne('App\Cart');
  }
  
  Public function PurchaseItems()
  {
    return $this->hasMany('App\productPurchase');
  }
  Public function purchaseBooks()
  {
    return $this->belongsToMany('App\Book', 'product_purchases', 'user_id', 'book_id');
  }
  
  Public function applications()
  {
    return $this->hasMany('App\Application');
  }

  public function chatMessages()
    {
        return $this->hasMany('App\ChatMessage');
    }

    public function chatRoomUsers()
    {
        return $this->hasMany('App\ChatRoomUsers');
    }
}