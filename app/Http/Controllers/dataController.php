<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Conversation;
use App\Models\Course;
use App\Models\Event;
use App\Models\institution;
use App\Models\Lesson;
use App\Models\Like;
use App\Models\Note;
use App\Models\Portifolio;
use App\Models\Post;
use App\Models\register;
use App\Models\Repository;
use App\Models\testimonials;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;

class dataController extends Controller
{
    function profile_update(){
        if(request()->isAssociate==1){
            $ass=1;
        }
        else{
            $ass=0;
        }
        if(request()->isInvested==1){
            $inv=1;
        }
        else{
            $inv=0;
        }
        $phone=request()->contact;
        $code='+254';
        $first= substr($phone, 0, 1);
        if($first=='0'){
            $contact=substr_replace($phone, $code, 0, 1);
        }
        else{
            $contact=$code.$phone;
        }
        User::where(['id'=>(Auth()->user()->id)])->update([
            'name'=>request()->name,
            'email'=>request()->email,
            'contact'=>$contact,
            'institution'=>request()->institution,
            'isAssociate'=>$ass,
            'isInvested'=>$inv,
            'PPNo'=>request()->PPNo,
            'about'=>request()->about,
            'birthday'=>request()->birthday,
        ]);
        return redirect()->back();
    }
    function changeprof(){
        $filename = Auth()->user()->avatar;
        request()->file('avatar')->storeAs('public/profile', $filename);

    }
    function makeRole($role,$id){
        User::where(['id'=>$id])->update([
            'role'=>$role
        ]);
        return redirect()->back();
    }
    function deleteUser($id){
        User::destroy($id);
        Comment::where(['user_id'=>$id])->delete();
        Like::where(['user_id'=>$id])->delete();
        Conversation::where(['sender_id'=>$id])->orWhere(['recepient_id'=>$id])->delete();
        Event::where(['user_id'=>$id])->delete();
        Comment::where(['user_id'=>$id])->delete();
        Portifolio::where(['user_id'=>$id])->delete();
        Post::where(['user_id'=>$id])->where(['isPublic',0])->delete();
        Comment::where(['user_id'=>$id])->delete();
        Repository::where(['user_id'=>$id])->delete();
        return redirect()->back();

    }
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
        Repository::create([
            'user_id'=>Auth()->user()->id,
            'file_name'=>$data['filename'],
            'file_path'=>$filenametostore,
            'category'=>$data['category'],
            'isPublic'=>$sp,
        ]);
        return redirect()->back();
    }
    function generatePDF($name){
        $course=Course::where(['course_name'=>$name])->first();
        $notes=Note::where('course_id','=',$course->id)->orderBy('chapter', 'asc')->get();
        $data=['notes'=>$notes, 'course'=>$course];
        $pdf = FacadePdf::loadView('notes', $data);
        return $pdf->download($name.'.pdf');
    }
    function text($message, $phone){
        $curl = curl_init();
        $data= json_encode(array(
        "mobile"=>$phone,
        "response_type"=> "json",
        "sender_name"=> "23107",
        "service_id"=> 0,
        "message"=>$message));
        curl_setopt_array(
            $curl, array(
                CURLOPT_URL => 'https://api.mobitechtechnologies.com/sms/sendsms',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 15,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data),
                CURLOPT_HTTPHEADER => array(
                    'h_api_key: b123e31006efde04f74addb39db9604ebcf9e3f972743e1d47df0d4ef52b1078',
                    'Content-Type: application/json'
                ),
            )
        );

        $response = curl_exec($curl);
        curl_close($curl);
        return redirect()->back();
    }
    function addEvent(){
        Event::create([
            'user_id'=>Auth()->user()->id,
            'event_title'=>request()->event_title,
            'event_description'=>request()->event_description,
            'event_time'=>request()->event_time,
            'event_date'=>request()->event_date,
            'isPublic'=>0,
            'event_duration'=>request()->event_duration,
        ]);
        return redirect()->back();
    }
    function editEvent($id){
        Event::where(['id'=>$id])->update([
            'event_title'=>request()->event_title,
            'event_description'=>request()->event_description,
            'event_time'=>request()->event_time,
            'event_date'=>request()->event_date,
            'event_duration'=>request()->event_duration,
        ]);
        return redirect()->back();
    }
    function deleteEvent($id){
        Event::destroy($id);
        return redirect()->back();
    }
    function createPost(){
        $user=Auth()->user();
        if(($user->role)=='Member'){
            $post=0;
        }
        else {
            $post = 1;
        }
        Post::create([
            'user_id'=> Auth()->user()->id,
            'category_id'=>request()->category_id,
            'title'=>request()->title,
            'post'=>request()->post,
            'exerpt'=>request()->exerpt,
            'isPosted'=>$post,
        ]);
        return redirect()->back();
    }
    function togglePost($id){
        $post= Post::where(['id'=>$id])->first();
        if($post->isPosted==1){
            $value = 0;
        }
        else{
            $value = 1;
        }
        $post->update([
            'isPosted'=>$value,
        ]);
        return redirect()->back();
    }
    function addPublicEvent(){
        Event::create([
            'user_id'=>Auth()->user()->id,
            'event_title'=>request()->event_title,
            'event_description'=>request()->event_description,
            'event_time'=>request()->event_time,
            'event_date'=>request()->event_date,
            'venue'=>request()->venue,
            'charges'=>request()->charges,
            'isPublic'=>1,
            'event_duration'=>request()->event_duration,
        ]);
        return redirect()->back();
    }
    function updateAvatar(){
        File::delete(Auth()->user()->profile);
        $extension = request()->file('profile')->getClientOriginalExtension();
        $avatar = Auth()->user()->profile;
        request()->file('profile')->storeAs('public/profile', $avatar);
        return redirect('/dashboard');
    }
    function comment($id){
        if(!Auth()->user()){
            $user_id=0;
        }
        else{
            $user_id=Auth()->user()->id;
        }
        Comment::create([
            'user_id'=>$user_id,
            'post_id'=>$id,
            'comment'=>request()->comment
        ]);
        return redirect()->back();
    }
    function like($id){
        $like= Like::where(['post_id'=>$id])->where(['user_id'=> (Auth()->user()->id)])->first();
        if(!$like){
            Like::create([
                'user_id'=>Auth()->user()->id,
                'post_id'=>$id
            ]);
        }
        else{
            Like::destroy($like->id);
        }
        return redirect()->back();
    }
    function markAttendance(){
        foreach((request()->user_id) as $id){
            register::create([
                'user_id'=>$id
            ]);
        }
    }
    function addInstitution(){
        institution::create([
            'institution'=>request()->institution
        ]);
        return redirect()->back();
    }
    function addLesson(){
        Lesson::create([
            'title'=>request()->title,
            'date'=>request()->date,
            'facilitator'=>request()->facilitator,
            'objectives'=>request()->objectives,
            'comments'=>request()->comments,
        ]);
        return  redirect()->back();
    }
    function editLesson($id){
        Lesson::where(['id'=>$id])->update([
            'title'=>request()->title,
            'date'=>request()->date,
            'facilitator'=>request()->faciliator,
            'institution'=>Auth()->user()->institution,
            'objectives'=>request()->objectives,
            'comments'=>request()->comments,
        ]);
        return  redirect()->back();
    }
    function commentLesson($id){
        Lesson::where(['id'=>$id])->update([
            'comments'=>request()->comments,
        ]);
        return  redirect()->back();
    }
    function deleteLesson($id){
        Lesson::destroy($id);
        return  redirect()->back();
    }
    function addtestimony(){
        testimonials::create([
            'user_id'=>request()->user_id,
            'testimony'=>request()->testimony,
        ]);
        return  redirect()->back();
    }
    function updatetestimony($id){
        testimonials::where(['id'=>$id])->update([
            'user_id'=>request()->user_id,
            'testimony'=>request()->testimony,
        ]);
        return  redirect()->back();
    }
    function deletetestimony($id){
        testimonials::destroy($id);
        return redirect()->back();
    }
}