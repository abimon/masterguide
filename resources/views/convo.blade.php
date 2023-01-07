@extends('layouts.index2',['title'=>'Chat'])
@section('dashboard')
<!-- ### $App Screen Content ### -->
<div class="mt-1 row" style="min-height: 400px;">
    <div class="d-flex justify-content-center">
        @foreach($users as $user)
        @if($user->id != Auth()->user()->id)
        <div class="col-lg-8 col-md-10">
            <div class="">
                <!-- Header -->
                <div class="peers fxw-nw jc-sb ai-c pY-20 pX-30 bgc-white">
                    <div class="peers ai-c">
                        <a href="/chat" class="peer mR-20">
                            <h1 class="bi bi-arrow-left-short w-3r h-3r"></h1>
                        </a>
                        <div class="peer mR-20">
                            <img src="{{asset('storage/profile/'.$user->avatar)}}" alt="" class="w-3r h-3r bdrs-50p">
                        </div>
                        <div class="peer">
                            <h6 class="lh-1 mB-0">{{$user->name}}</h6>
                            @if($user->isOnline())
                            <i class="fsz-sm lh-1 text-success">Online</i>
                            @else
                            <i class="fsz-sm lh-1">Offline</i>
                            @endif
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
                                    <div class="peers fxw-nw ai-c pY-3 pX-10 bg-dark text-light bdrs-2 lh-3/2">
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
        @endif
        @endforeach
    </div>
</div>
@endsection