<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Course;
use App\Models\Note;
use App\Models\Repository;
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
        $repos=Repository::all();
        return view('dashboard',['users'=>$users, 'repos'=>$repos]);
    }
    function resources(){
        $courses=Course::orderBy('course_name', 'asc')->get();
        $repos=Repository::where(['isPublic'=>true])->get();
        $users=User::all();
        return view('resources',['repos'=>$repos, 'courses'=>$courses,'users'=>$users]);
    }
    function course($name){
        $course=Course::where(['course_name'=>$name])->first();
        $notes=Note::where('course_id','=',$course->id)->orderBy('chapter', 'asc')->get();
        $courses=Course::where('id','=',$course->id)->get();
        return view('course',['courses'=>$courses,'notes'=>$notes]);
    }
    
}
