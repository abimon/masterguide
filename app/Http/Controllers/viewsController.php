<?php

namespace App\Http\Controllers;

use App\Models\activity;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Conversation;
use App\Models\Course;
use App\Models\Event;
use App\Models\institution;
use App\Models\Lesson;
use App\Models\Like;
use App\Models\Note;
use App\Models\Post;
use App\Models\Repository;
use App\Models\testimonials;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class viewsController extends Controller
{
    //
    function index(){
        $user=User::all();
        $tests= testimonials::all();
        $data=[
            'users'=>$user,
            'testimonials'=>$tests,
        ];
        return view('index', $data);
    }
    function chat(){
        $messages=Conversation::where(['recepient_id'=>Auth()->user()->id])->where('isRead','!=',1)->get();
        $users=User::orderBy('name', 'asc')->get();
        $data=[
            'users'=>$users,
            'messages'=>$messages
        ];
        return view('chat',$data);
    }
    function convo($name){
        $user=User::where(['name'=>$name])->first();
        $users=User::where(['name'=>$name])->orderBy('name', 'asc')->get();
        $messages=Conversation::where(['recepient_id'=>$user->id])->orWhere(['sender_id'=>$user->id])->get();
        $mess=Conversation::where(['recepient_id'=>Auth()->user()->id])->where(['sender_id'=>$user->id])->get();
        foreach($mess as $message){
            $message->isRead=1;
            $message->update();
        }
        $data =[
            'users'=>$users, 
            'messages'=>$messages
        ];
        return view('convo',$data);
    }
    function team(){
        $users=User::where('role','!=','Member')->orderBy('name', 'asc')->get();
        $data = [
            'users'=>$users,
        ];
        return view('team',$data);
    }
    function dashboard(){
        $users=User::orderBy('name', 'asc')->get();
        $repos=Repository::all();
        $birthdays=collect();
        $posts=Post::orderBy('id', 'desc')->get();
        $messages=Conversation::where(['recepient_id'=>Auth()->user()->id])->where('isRead','!=',1)->get();
        foreach($users as $user){
            if((date_format(date_create($user->birthday), 'F jS'))==date('F jS')){
                $birthdays->push($user);
            }
        }
        $categories=Category::orderBy('category_name', 'asc')->get();
        $data = [
            'users'=>$users, 
            'repos'=>$repos,
            'posts'=>$posts,
            'birthdays'=>$birthdays,
            'messages'=>$messages,
            'categories'=>$categories
        ];
        return view('dashboard',$data);
    }
    function resources(){
        $courses=Course::orderBy('title', 'asc')->get();
        $repos=Repository::where(['isPublic'=>true])->get();
        $notes=Note::all();
        $users=User::all();
        $data=[
            'repos'=>$repos, 
            'courses'=>$courses,
            'users'=>$users,
            'notes'=>$notes
        ];
        return view('resources',$data);
    }
    function course($name){
        $course=Course::where(['course_name'=>$name])->first();
        $notes=Note::where('course_id','=',$course->id)->orderBy('chapter', 'asc')->get();
        $courses=Course::where('id','=',$course->id)->get();
        return view('course',['courses'=>$courses,'notes'=>$notes]);
    }
    function calendar(){
        $events=Event::where(['user_id'=>Auth()->user()->id])->orWhere(['isPublic'=>1])->get();
        $data=[
            'events'=>$events,
        ];
        return view('calendar', $data);
    }
    function events(){
        $events=Event::where(['isPublic'=>1])->orderBy('event_date','asc')->get();
        $data = [
            'events'=>$events,
        ];
        return view('events',$data);
    }
    function blog(){
        $posts= Post::where(['isPosted'=>1])->get();
        $comments= Comment::all();
        $likes=Like::all();
        $data=[
            'posts'=>$posts,
            'comments'=>$comments,
            'likes'=>$likes,
        ];
        return view('blog', $data);
    }
    function blogpost($title){
        $post= Post::where(['title'=>$title])->first();
        $user=User::where(['id'=>$post->user_id])->first();
        $users= User::all();
        $comments= Comment::where(['post_id'=>$post->id])->get();
        $likes=Like::where(['post_id'=>$post->id])->get();
        $data=[
            'post'=>$post,
            'user'=>$user,
            'users'=>$users,
            'comments'=>$comments,
            'likes'=>$likes,
        ];
        return view('blogpost', $data);
    }
    function attendance(){
        if(Auth()->user()->role=='Coordinator'){
            $users=User::all();
        }
        else{
            $users=User::where(['institution'=>Auth()->user()->institution])->get();
        }
        $data=[
            'users'=>$users,
        ];
        return view('attendance', $data);
    }
    function lesson(){
        $lessons=Lesson::all();
        $data=[
            'lessons'=>$lessons,
        ];
        return view('lesson', $data);
    }
    function activity($title){
        $insts=institution::all();
        $data=[
            'event_title'=>$title,
            'insts'=>$insts
        ];
        return view('activity',$data);
    }
    function event_attendance($title){
        $users=activity::where(['event_title'=>$title])->orderBy('attendee','desc')->get();
        $data =[
            'title'=>$title,
            'users'=>$users
        ];
        return view('attendee',$data);
    }
    function compose(){
        $data=[];
        return view('compose',$data);
    }
}
