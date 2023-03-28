<link rel="stylesheet" href="{{asset('storage/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('storage/css/adminator.css')}}">
<div style="text-align: center;">
    <img src="{{asset('storage/images/favicon.png')}}" alt="" width="100">
</div>
<div style="text-align: center;">
    <h3 style="font-family: cursive;"><i>University Region</i></h3>
</div>
<div class="p-5">
    <div class="bd bgc-white">
        <div class="layers" id="members">
            <div class="layer w-100">
                <div class="bgc-light-blue-500 c-white p-20">
                    <div class="peers ai-c jc-sb gap-40">
                        <div class="peer peer-greed">
                            <h5>{{date('F jS, Y')}}</h5>
                            <p class="mB-0">Event Attendance</p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive p-20">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="bdwT-0">#</th>
                                <th class="bdwT-0">Name</th>
                                <th class="bdwT-0">Phone No.</th>
                                <th class="bdwT-0">Email</th>
                                <th class="bdwT-0">Institution</th>
                                <th class="bdwT-0">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key=>$user)
                            <tr>
                                <th>{{$key+1}}</th>
                                <td>{{$user->attendee}}</td>
                                <td>{{$user->contact}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->institution}}</td>
                                <td>{{$user->idno}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>