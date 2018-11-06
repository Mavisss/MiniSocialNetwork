<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Validator;

class PostController extends Controller
{
    //
    public function __construct(){
      $this->middleware("auth");
    }
     public function store(Request $r){
       $validate = Validator::make($r->all(), [
         'content' => 'required',
       ]);
       if($validate->fails()){
          return redirect()->back()->with("errors", $validate->messages()->all());
       }
       if ($r->content != '<p>&nbsp;</p>' ){
         $post = Auth::user()->posts()->create([
           'name' => Auth::user()->name,
           'content' => $r->content,
           'status' => 1
         ]);
           return redirect()->back()->with("success", "Post completed!");
        }else{
            return redirect()->back()->with("errors", "Failed to post! Please type in something!");
         }
    }
}
