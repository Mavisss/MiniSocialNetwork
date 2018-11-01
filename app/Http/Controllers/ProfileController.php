<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function viewProfile($slug){
      $user = User::where('slug', $slug)->first();
      return view('profiles.profile')->with('user', $user);
    }

    public function editProfile(){
      $userId = Auth::user()->id;
      // dd(Auth::user()->id);
      // dd(Auth::user()->find($userId)->profile);
      return view('profiles.edit')->with('info', Auth::user()->find($userId)->profile);
    }
    public function updateProfile(Request $r){
      $this->validate($r, [
        'role' => 'required',
        'address' => 'required',
        'about' => 'required'
      ]);
      Auth::user()->find(Auth::user()->id)->profile()->update([
        'role' => $r->role,
        'address' => $r->address,
        'about' => $r->about
      ]);

      // if($r->hasFile('avatar')){
      //   Auth::user()->update([
      //     'avatar' =>
      //   ])
      // }

      return redirect()->to('/profiles/'.(Auth::user()->slug));
    }

    // public function changeImage(){
    //   return view('profile.changeimage');
    // }
}
