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

}