<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = "posts";
    protected $fillable = ["content", "status", "name"];
    public function likes(){
      return $this->hasMany("App\Like");
    }

    public function comments(){
      return $this->hasMany("App\Comment");
    }

    public function users(){
      return $this->belongsTo('App\User');
    }
}
