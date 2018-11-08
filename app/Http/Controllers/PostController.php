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
    // Create a post
    public function store(Request $request){
       $validate = Validator::make($request->all(), [
         'content' => 'required',
       ]);
       if($validate->fails()){
          return redirect()->back()->with("errors", $validate->messages()->all());
       }
       if ($request->content != '<p>&nbsp;</p>' ){
         $post = Auth::user()->posts()->create([
           'name' => Auth::user()->name,
           'slug' => Auth::user()->slug,
           'content' => $request->content,
           'status' => 1
         ]);

         $viewPost= Auth::user()->find(Auth::user()->id)->posts;
           return redirect()->back()->with("success", "Post completed!");
        }else{
            return redirect()->back()->with("errors", "Failed to post! Please type in something!");
         }
    }


    // Delete a post
    public function delete($postId){

    }
}
