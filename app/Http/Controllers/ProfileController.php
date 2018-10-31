<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index($slug){
      return view('profile.index');
    }

    // public function changeImage(){
    //   return view('profile.changeimage');
    // }
}
