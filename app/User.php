<?php

namespace App;

use App\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','slug','role','avatar', 'address', 'biography',
    ];
    protected $dates = [
        'dob',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile(){
      return $this->hasOne('App\Profile');
    }

    public function posts(){
      return $this->hasMany('App\Post');
    }
    public function likes(){
      return $this->hasMany('App\Like');
    }
    public function comments(){
      return $this->hasMany('App\Comment');
    }
}
