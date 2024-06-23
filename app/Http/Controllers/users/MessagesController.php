<?php

namespace App\Http\Controllers\users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Message;

class MessagesController extends Controller
{
    
    public function index(){   
        $messages = Message::all();
        return view('users.messages.messages', compact('messages'));
    }

    public function createMessage(){
        return view('users.messages.create');
    }

    public function storeMessage(Request $request){
        $request->validate([
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'message' => $request->input('message'),
        ]);

        return redirect()->route('messages')
            ->with('success', 'Message added successfully!');
    }

    
}