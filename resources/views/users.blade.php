<link rel="stylesheet" href="{{asset('storage/css/bootstrap.min.css')}}">
<div style="text-align: center;">
    <img src="{{asset('storage/images/favicon.png')}}" alt="" width="100">
</div>
<div style="text-align: center;">
    <h3 style="font-family: cursive;">University Region</h3>
</div>
<div class="p-5">
    <!-- #Members Report ==================== -->
    <div class="bd bg-white">
        <div class="layers" id="members">
            <div class="layer w-100">
                <div class="bg-info c-white p-5">
                    <div class="peers ai-c jc-sb gap-4 text-center">
                        <div class="peer peer-greed">
                            <h5>{{date('F jS, Y')}}</h5>
                            <h3 class="mB-0">Members Report</h3>
                        </div>
                        <div class="peer">
                            <h3 style="text-align: end;">{{count($users)}}</h3>
                        </div>
                    </div>
                </div>
                <div style="table-layout: auto;">
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th class=" bdwT-0">#</th>
                                <th class=" bdwT-0">Avatar</th>
                                <th class=" bdwT-0">Name</th>
                                <th class=" bdwT-0">Institution</th>
                                <th class=" bdwT-0">Joining Date</th>
                                <th class=" bdwT-0">Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key=>$user)
                            <tr>
                                <th class=" bdwT-0">{{$key+1}}</th>
                                <th><img src="{{asset('storage/profile/'.$user->avatar)}}" alt="" width="40" height="40" class="rounded"></th>
                                <td class="fw-600">{{$user->name}}</td>
                                <td>{{$user->institution}}</td>
                                <td>{{date_format(($user->created_at),'F jS, Y')}}</td>
                                <td><span class="text-success">{{$user->role}}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>