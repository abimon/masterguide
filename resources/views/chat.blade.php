@extends('layouts.index2',['title'=>'Chat'])
@section('dashboard')
<!-- ### $App Screen Content ### -->
<div class="m-1">
  <div class="row mt-2">
    <div class="col-lg-12">

    </div>
    <div class="col-lg-3 border-end">
      @foreach($users as $user)
      @if($user->id != Auth()->user()->id)
      <div class="row" type='button' data-bs-toggle="collapse" data-bs-target="#{{$user->id}}" aria-expanded="false" aria-controls="collapse">
        <div class="col-3">
          <img src="{{asset('storage/profile/'.$user['avatar'])}}" class="rounded-circle" width="40" height="40">
        </div>
        <div class="col-8">
          <p><i class="bi bi-bell-fill text-success"></i> {{$user->name}}</p>
        </div>
      </div>
      <hr>
      @endif
      @endforeach
    </div>
    <div class="col-lg-9">
      @foreach($users as $user)
      @if($user->id != Auth()->user()->id)
      <div>
        <div class="collapse collapse-horizontal" id="{{$user->id}}">
          <div class="">
            <div class="peer peer-greed" id='chat-box'>
              <div class="layers h-100">
                <div class="layer w-100">
                  <!-- Header -->
                  <div class="peers fxw-nw jc-sb ai-c pY-20 pX-30 bgc-white">
                    <div class="peers ai-c">

                      <div class="peer mR-20">
                        <img src="{{asset('storage/profile/'.$user->avatar)}}" alt="" class="w-3r h-3r bdrs-50p">
                      </div>
                      <div class="peer">
                        <h6 class="lh-1 mB-0">{{$user->name}}</h6>
                        <i class="fsz-sm lh-1">Online</i>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="layer w-100 fxg-1 bgc-grey-200 scrollable pos-r">
                  <!-- Chat Box -->

                  <div class="p-20 gapY-15">
                    @foreach($messages as $message)
                  
                    @if ((($message->sender_id == ($user->id)) && ($message->recepient_id == (Auth()->user()->id)))||(($message->recepient_id == ($user->id)) && ($message->sender_id == (Auth()->user()->id))))
                         
                    @if($message->sender_id==$user->id)
                    <!-- Chat Conversation -->
                    <div class="peers fxw-nw">
                      <div class="peer peer-greed">
                        <div class="layers ai-fs gapY-5">
                          <div class="layer">
                            <div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                              <div class="peer mR-10">
                                <small>{{date_format($message->created_at, 'H:i A')}}</small>
                              </div>
                              <div class="peer-greed">
                                <span>{{$message->message}}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @elseif($message->recepient_id==$user->id)
                    <!-- Chat Conversation -->
                    <div class="peers fxw-nw ai-fe">

                      <div class="peer peer-greed ord-0">
                        <div class="layers ai-fe gapY-10">
                          <div class="layer">
                            <div class="peers fxw-nw ai-c pY-3 pX-10 bgc-white bdrs-2 lh-3/2">
                              <div class="peer mL-10 ord-1">
                                <small>{{date_format($message->created_at, 'H:i A')}}</small>
                              </div>
                              <div class="peer-greed ord-0">
                                <span>{{$message->message}}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @else
                    @endif
                    @endif
                    @endforeach
                  </div>
                </div>
                <div class="layer w-100">
                  <!-- Chat Send -->
                  <div class="p-20 bdT bgc-white">
                    <div class="pos-r">
                      <form action="/sendMessage/{{$user->id}}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                          <input type="text" class="form-control bdrs-10em m-0" name='message' placeholder="Say something...">
                          <button type="submit" class="input-group-text rounded-circle text-success bg-transparent"><i class="bi bi-send"></i></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
    </div>
  </div>
</div>
@endsection