<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
  
    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = ['username', 'password', 'fname', 'lname', 'email', 'image'];
    protected $hidden = ['password'];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }
}
