@extends('layouts.index2',['title'=>'Blog'])
@section('dashboard')
<!-- ### $App Screen Content ### -->
<div id='mainContent'>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <form class="" action="/createPost" method='post'>
          @csrf
          <h4 class="c-grey-900 mB-20 text-center text-uppercase">Create Post</h4>
          <div class="send-header">
            <div class="form-group">
              <input type="text" class='form-control' name='title' placeholder="Title">
            </div>

            <div class="form-group">
              <input type="text" class='form-control' name='category_id' placeholder="Category">
            </div>
            <div class="form-group">
              <textarea id='post' name='post'></textarea>
            </div>
            <div class="form-group">
              <textarea class="form-control" name='exerpt' maxlength="160" placeholder="Excerpt" rows='5'></textarea>
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