<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class FriendshipsController extends Controller
{
  public function check($id)
  {
    if(Auth::user()->is_friends_with($id) === 1){
       return ['status' => 'friend'];
    }

    if(Auth::user()->has_pending_friend_requests_from($id) === 1){
      return ['status' => 'pending'];
    }

    if(Auth::user()->has_pending_friend_requests_sent_to($id) === 1){
      return ['status' => 'waiting'];
    }
    return ['status' => 0];
  }

  public function add_friend($id){
    //send notification
    $response=  Auth::user()->add_friend($id);
    User::find($id)->notify(new \App\Notifications\NewFriendRequest( Auth::user() ));
    return $response;
  }

  public function accept_friend($id){
    //send notification
    return Auth::user()->accept_friend($id);
  }
}
