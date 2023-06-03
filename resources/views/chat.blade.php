@extends('layouts.index2',['title'=>'Chat'])
@section('dashboard')
<!-- ### $App Screen Content ### -->
<div class="mt-2">
  <div class="row d-flex justify-content-center">
    <div class="col-12">

    </div>
    <div class="col-md-8">
      @foreach($users as $user)
      
      @if($user->id != Auth()->user()->id)
      <div class="row alert">
        <div class="col-3">
          <img src="{{asset('storage/profile/'.$user['avatar'])}}" class="rounded-circle" width="40" height="40">
        </div>
        <div class="col-9">
          <p>
            <a href="/chat/{{$user->name}}" style="text-decoration: none; color:gray;">
              @if($user->isOnline())
              <i class="bi bi-bell-fill text-success"></i>
              @else
              <i class="bi bi-bell-fill text-secondary"></i>
              @endif
              {{$user->name}}
              <span class="badge {{($messages->where('sender_id',$user->id)->count())>0?'bg-danger':'bg-secondary'}}">{{$messages->where('sender_id',$user->id)->count()}}</span>
            </a>
          </p>
        </div>

      </div>
      <hr>
      @endif
      @endforeach
    </div>
  </div>
</div>
@endsection