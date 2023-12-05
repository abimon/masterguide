<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where(['isPosted' => 1])->get();
        $data = [];
        
        foreach($posts as $post){
            $comments=Comment::where('post_id',$post->id)->join('users','users.id','=','comments.user_id')->select('comments.*','users.name','users.avatar')->get();
            $likes=Like::where('post_id',$post->id)->get();
            array_push($data,[
                'id'=>$post->id,
                'post'=>$post->post,
                'title'=>$post->title,
                'theme'=>$post->theme,
                'author'=>$post->author,
                'bio'=>$post->bio,
                'path'=>$post->path,
                'comments'=>$comments,
                'likes'=>$likes->count()
            ]);
        }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if(request()->user_id==null){

        }
        Comment::create([
            'user_id'=>request()->user_id,
            'post_id'=>request()->post_id,
            'comment'=>request()->comment
        ]);
        return response()->json('Success',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        $post = Post::where(['title' => $title])->first();
        $data = [];
        $comments=Comment::where('post_id',$post->id)->join('users','users.id','=','comments.user_id')->select('comments.*','users.name','users.avatar')->get();
            $likes=Like::where('post_id',$post->id)->get();
            array_push($data,[
                'id'=>$post->id,
                'post'=>$post->post,
                'title'=>$post->title,
                'theme'=>$post->theme,
                'author'=>$post->author,
                'bio'=>$post->bio,
                'path'=>$post->path,
                'comments'=>$comments,
                'likes'=>$likes->count()
            ]);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        //
    }
}