<?php

namespace App\Traits;
use App\Friendship;

trait Friendable{

  // Add Friend Trait
  public function add_friend($user_requested_id){

    if ($this->id === $user_requested_id) {
      return 0;
    }

    if ($this->has_pending_friend_requests_sent_to($user_requested_id) === 1){
      return 'Already sent friend request';
    }

    if($this->has_pending_friend_requests_from($user_requested_id) === 1){
      return $this->accept_friend($user_requested_id);
    }


    $Friendship = Friendship::create([
      'requester' => $this->id,
      'user_requested' => $user_requested_id,
    ]);

    if($Friendship){
      return response()->json($Friendship, 200);
    }
    return reponse()->json('fail', 501);
  }


  //Accept Friend Function
  public function accept_friend($requester){
    if($this->has_pending_friend_requests_from($requester) === 0){
      return 0;
    }
    $friendship = Friendship::where('requester', $requester)
                              -> where('user_requested', $this->id)
                              ->first();
    if($friendship){
      $friendship->update([
        'status' => 1
      ]);
      return 1;
    }
    return 0;
  }

  //Get Friend Function
  public function friends(){
    // The one who send the request

    $friends = array();

    $f1 = Friendship::where('status', 1)->where('requester', $this->id)->get();

    foreach($f1 as $friendship){
      array_push($friends, \App\User::find($friendship->user_requested));
    }

    // The one who is requested, the one who got the request.
    $friends2= array();

    $f2 = Friendship::where('status', 1)->where('user_requested', $this->id)->get();
    foreach($f2 as $friendship){
      array_push($friends, \App\User::find($friendship->requester));
    }
    //merge
    return array_merge($friends, $friends2);
  }

  // Get an array of people who are requesting to be your friend
  public function pending_friend_requests(){
    $users = array();

    $friendships = Friendship::where('status', 0)->where('user_requested', $this->id)
                                                  ->get();
    foreach($friendships as $friendship){
      array_push($users, \App\User::find($friendship->requester));
    }
    return $users;
  }

  //Get the id of pending request
  public function pending_friend_requests_ids(){
    return collect($this->pending_friend_requests())->pluck('id')->toArray();
  }

  //Get the ids of friends in the friend list
  public function friends_ids(){
    return collect($this->friends())->pluck('id');
  }

  public function is_friends_with($user_id){
    if(in_array($user_id, $this->friends_ids()->toArray())){
      return 1;
    }else{
      return 0;
    }
  }



  //Get and array of people who you requested to be friend with them
  public function pending_friend_requests_sent(){
    $users = array();

    $friendships = Friendship::where('status', 0)->where('requester', $this->id)->get();
    foreach ($friendships as $friendship){
      array_push($users, \App\User::find($friendship->user_requested));

    }
    return $users;
  }

  //Get id of people who you requested to be friend with
  public function pending_friend_requests_sent_ids(){
    return collect($this->pending_friend_requests_sent())->pluck('id')->toArray();
  }

  //Check if you have pending requests from that user id?
  public function has_pending_friend_requests_from($user_id){
    if(in_array($user_id, $this->pending_friend_requests_ids())){
      return 1;
    }else{
      return 0;
    }
  }

  //Check if you have pending friend requests to that user id?
  public function has_pending_friend_requests_sent_to($user_id){
    if(in_array($user_id, $this->pending_friend_requests_sent_ids())){
      return 1;
    }else{
      return 0;
    }
  }

}


 ?>
