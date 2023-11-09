<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\activity;
use App\Models\Event;

class eventController extends Controller
{
    public function index()
    {
        $events=Event::where(['isPublic'=>1])->orderBy('event_date','asc')->get();
        return $events;

    }

    public function create()
    {
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
        return response()->json('Success',200);
    }

    public function store()
    {
        //
    }

    public function show($title)
    {
        $users=activity::where(['event_title'=>$title])->orderBy('attendee','desc')->get();
        $data =[
            'title'=>$title,
            'users'=>$users
        ];
    }

    public function edit($id)
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
