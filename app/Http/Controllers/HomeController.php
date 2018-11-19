<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->where('user_id', Auth::user()->id)->get();
        return view('home', ['posts' => $posts]);
    }
    public function index2()
    {
        $allposts = Post::latest()->get();
        // dd($allposts);
        return view('welcome', [
          'allposts' => $allposts,
        ]);
    }

    public function mark_as_read($notId){
      $user = Auth::user();
      $user->unreadNotifications->where('id', $notId)->markAsRead();
   }
}
