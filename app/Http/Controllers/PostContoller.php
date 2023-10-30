<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Models\User;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=Auth()->user();
        if(($user->role)=='Member'){
            $post=0;
        }
        else {
            $post = 1;
        }
        $extension = request()->file('avatar')->getClientOriginalExtension();
        $filename = time();
        $file = $filename . '.' . $extension;
        Post::create([
            'author'=>request()->author ,
            'theme'=>request()->theme,
            'title'=>request()->title,
            'post'=>request()->post,
            'bio'=>request()->bio,
            'path'=>$file,
            'isPosted'=>$post,
        ]);
        request()->file('avatar')->storeAs('public/authors', $file);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     **/
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified post.
     */
    public function show($title)
    {
        $post= Post::where(['title'=>$title])->first();
        $users= User::all();
        $comments= Comment::where(['post_id'=>$post->id])->get();
        $likes=Like::where(['post_id'=>$post->id])->get();
        $data=[
            'post'=>$post,
            'users'=>$users,
            'comments'=>$comments,
            'likes'=>$likes,
        ];
        return view('blogpost', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $user=Auth()->user();
        if(($user->role)=='Member'){
            $post=0;
        }
        else {
            $post = 1;
        }
        
        Post::where('id',$id)->update([
            'author'=>request()->author ,
            'theme'=>request()->theme,
            'title'=>request()->title,
            'post'=>request()->post,
            'bio'=>request()->bio,
            'isPosted'=>$post,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified post from database.*
     **/
    public function destroy($id)
    {
        post::destroy($id);
        Like::where('post_id',$id)->delete();
        Comment::where('post_id', $id)->delete();
        return redirect()->back();
    }
}
