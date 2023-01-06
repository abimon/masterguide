<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;

class viewsController extends Controller
{
    //
    function chat(){
        $id=Auth()->user()->id;
        $users=User::orderBy('name', 'asc')->get();
        $messages=Conversation::where(['recepient_id'=>$id])->orWhere(['sender_id'=>$id])->get();
        return view('chat',['users'=>$users, 'messages'=>$messages]);
    }
}
