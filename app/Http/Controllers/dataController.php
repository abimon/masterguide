<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Repo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

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

    public function uploadresource(Request $data){
        //get just ext
        $extension = request()->file('file')->getClientOriginalExtension();
        //file name only
        $filename = request()->filename;
        //File name to store
        $filenametostore = $filename . '.' . $extension;
        //upload
        request()->file('file')->storeAs('public/resources', $filenametostore);
        if(request()->isPublic==1){
            $sp=1;
        }
        else{
            $sp=0;
        }
        Repo::create([
            'user_id'=>Auth()->user()->id,
            'file_name'=>$data['filename'],
            'file_path'=>$filenametostore,
            'category'=>$data['category'],
            'isPublic'=>$sp,
        ]);
        return redirect()->back();
    }
}
