<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Message;

class ChatController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function fetchMessages(){
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request){
        $message = Auth::user()->messages()->create([
            'message' => $request->input('message')
        ]);
        
        broadcast(new MessageSent($user, $message))->toOthers();
        
        return ['status' => 'Message Sent'];
    }
    
}
