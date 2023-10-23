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
        foreach ($users as $user) {
            $message = Conversation::join('users','users.id',$user->id)->where([['recepient_id', '=', $id], ['sender_id', '=', $user->id], ['isPrivate', '=', 1]])->orWhere([['sender_id', '=', $id], ['recepient_id', '=', $user->id], ['isPrivate', '=', 1]])->latest()->take(1)->first();
            if ($message) {
                array_push($messages, $message);
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
