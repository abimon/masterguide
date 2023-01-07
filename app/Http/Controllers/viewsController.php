<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Repo;
use App\Models\User;
use Illuminate\Http\Request;

class viewsController extends Controller
{
    //
    function chat(){
        $users=User::orderBy('name', 'asc')->get();
        return view('chat',['users'=>$users]);
    }
    function convo($name){
        $user=User::where(['name'=>$name])->first();
        $users=User::where(['name'=>$name])->orderBy('name', 'asc')->get();
        $messages=Conversation::where(['recepient_id'=>$user->id])->orWhere(['sender_id'=>$user->id])->get();
        return view('convo',['users'=>$users, 'messages'=>$messages]);
    }
    function team(){
        $users=User::orderBy('name', 'asc')->get();
        return view('team',['users'=>$users]);
    }
    function dashboard(){
        $users=User::orderBy('name', 'asc')->get();
        $repos=Repo::all();
        return view('dashboard',['users'=>$users, 'repos'=>$repos]);
    }
    function resources(){
        $users=User::orderBy('name', 'asc')->get();
        $repos=Repo::all();
        return view('resources',['repos'=>$repos]);
    }
}
