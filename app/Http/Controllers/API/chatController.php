<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;

class chatController extends Controller
{
    public function index($id)
    {
        $users = User::all();
        $messages = [];
        $users=User::all();
        $messages=[];
        foreach ($users as $user) {
            $message = Conversation::where([['recepient_id', '=', $id], ['sender_id', '=', $user->id]])->orWhere([['sender_id', '=', $id], ['recepient_id', '=', $user->id]])->latest()->take(1)->first();
            if (!$message) {
            } else {
                array_push($messages, [
                    'id'=>$message->id,
                    'sender_id'=>$message->sender_id ,
                    'recepient_id'=>$message->recepient_id ,
                    'message'=>$message->message,
                    'isRead'=>$message->isRead,
                    'created_at'=>$message->created_at,
                    'updated_at'=>$message->updated_at,
                    'name'=>$user->name,
                    'path'=>$user->avatar
                ]);
            }
        }
        return response()->json($messages, 200);
    }

    public function create()
    {
        Conversation::create([
            'sender_id'=>request()->sender_id,
            'recepient_id'=>request()->recepient_id,
            'message'=>request()->message,
            'isRead'=>0,
            'isPrivate'=>request()->isPrivate
        ]);
        return response()->json('Success',200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id,$userId)
    {
        $message=Conversation::where([['recepient_id', '=', $id],['sender_id', '=', $userId]])->orWhere([['sender_id', '=', $id],['recepient_id', '=', $userId]])->get();
        foreach($message as $mess){
            $mess->isRead=1;
            $mess->update();
        }
        return response()->json($message,200);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    function sendMessage(){
        
    }
    function message($id){
        
    }
    function readMessage($id,$userId){
        
    }
}