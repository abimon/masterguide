<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dataController extends Controller
{
    //
    public function sendMessage($id){
        Conversation::create([
            'recepient_id'=>$id,
            'sender_id'=>Auth()->user()->id,
            'message'=>request()->message,
        ]);
        return redirect()->back();
    }
}
