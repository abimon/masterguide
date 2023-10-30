@extends('layouts.index2',['title'=>'Edit'])
@section('dashboard')
<!-- ### $App Screen Content ### -->
<div id='mainContent'>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <form class="" action="/updatePost/{{$post->id}}" method='post' enctype="multipart/form-data">
          @csrf
          <h4 class="c-grey-900 mB-20 text-center text-uppercase">Create Post</h4>
          <div class="send-header">
            <div class="form-group">
              <input type="text" class='form-control' name='title' value="{{$post->title}}">
            </div>
            <div class="form-group">
              <input type="text" class='form-control' name='theme' value="{{$post->theme}}">
            </div>
            <div class="form-group">
              <textarea id='post' name='post'>{{$post->post}}</textarea>
            </div>
            <div class="form-group">
              <input type="file" class='form-control' name='photo' value="{{$post->path}}">
            </div>
            <div class="form-group">
              <input type="text" class='form-control' name='author' value="{{$post->author}}">
            </div>
            <div class="form-group">
              <textarea class="form-control" name='bio' maxlength="160" value="{{$post->bio}}" rows='5'></textarea>
            </div>
          </div>
          <div id="compose-area"></div>
          <div class="text-right mrg-top-30">
            <button type='submit' class="btn btn-outline-info">Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection