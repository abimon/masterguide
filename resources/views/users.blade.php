@section('dashboard',['title'=>'Members'])
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
                <!-- #Sales Report ==================== -->
                <div class="bd bgc-white">
                    <div class="layers" id="members">
                        <div class="layer w-100">
                            <div class="bgc-light-blue-500 c-white p-20">
                                <div class="peers ai-c jc-sb gap-40">
                                    <div class="peer peer-greed">
                                        <h5>{{date('F j, Y')}}</h5>
                                        <p class="mB-0">Event Attendance</p>
                                    </div>
                                    <div class="peer">
                                        <h3 class="text-right text-light">{{$users->count()}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive p-20">
                                <form action="" method="post">
                                    @csrf
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class=" bdwT-0">#</th>
                                                <th class=" bdwT-0">Name</th>
                                                <th class=" bdwT-0">Institution</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $key=>$user)
                                            <tr>
                                                <th>{{$key+1}}</th>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->institution}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="modal-footer">
                                        <button type="submit" formaction="/print/{{$title}}" class="btn btn-outline-info">Print</button>
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
@endsection