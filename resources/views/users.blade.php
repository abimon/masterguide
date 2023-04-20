<link rel="stylesheet" href="{{asset('storage/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('storage/css/adminator.css')}}">
<div style="text-align: center;">
    <img src="{{asset('storage/images/favicon.png')}}" alt="" width="100">
</div>
<div style="text-align: center;">
    <h3 style="font-family: cursive;"><i>University Region</i></h3>
</div>
<div class="p-5 bg-info">
    <!-- #Members Report ==================== -->
    <div class="bg-transparent">
        <div class="layers" id="members">
            <div class="layer w-100">
                <div class="bg-info c-white p-2">
                    <div class="peers ai-c jc-sb gap-4 text-center">
                        <div class="peer peer-greed">
                            <h5>{{date('F jS, Y')}}</h5>
                            <h3 class="mB-0">Members Report</h3>
                        </div>
                    </div>
                </div>
                <div style="margin:0;">
                    @foreach($users as $key=>$user)
                    <div style="width:30%; padding:3px;">
                        <div style="align-content: center;">
                            <div style="align-content: center;">
                                <img src="{{asset('storage/profile/'.$user->avatar)}}" class="card-img-top" style="width:100px;height:150px;" >
                            </div>
                            <div class="card-body text-center text-light">
                                <h5 class="card-title">{{$user->name}}</h5>
                                <p class="card-text">{{$user->institution}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>