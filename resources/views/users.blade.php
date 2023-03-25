@extends('layouts.app', ['title'=>'Select'])
@section('content')
<div class="d-flex justify-content-center">
    <img src="{{asset('storage/images/favicon.png')}}" alt="" width="100">
</div>
<div class="d-flex justify-content-center">
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
                                <h3 class="text-right text-dark">{{count($users)}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <table class="table">
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
@endsection