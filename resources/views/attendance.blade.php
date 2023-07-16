@extends('layouts.index2',['title'=>'Members'])
@section('dashboard')
<!-- #Sales Report ==================== -->
<div class="bd bgc-white">
    <div class="layers" id="members">
        <div class="layer w-100">
            <div class="peer peer-greed p-5">
                <h5>{{date('F j, Y')}}</h5>
                <p class="mB-0">Members Attendance</p>
            </div>
            <div class="table-responsive p-20">
                <form action="" method="post">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th class=" bdwT-0">#</th>
                                <th class=" bdwT-0">Avatar</th>
                                <th class=" bdwT-0">Name</th>
                                <th class=" bdwT-0">Institution</th>
                                <th class=" bdwT-0">Select</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key=>$user)
                            <tr>
                                <th class=" bdwT-0">{{$key+1}}</th>
                                <td class="fw-600"><img src="{{asset('storage/profile/'.$user->avatar)}}" class='rounded-circle' alt="" width='40' height=40></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->institution}}</td>
                                <td><span class="">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$user->id}}" name="user_id[]" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                            </label>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <!--<button type="submit" formaction="/selectmem" class="btn btn-outline-dark">Select</button>-->
                        <button type="submit" formaction="/markAttendance" class="btn btn-outline-info">Submit Attendance</button>
                    </div>
                </form>
            </div>
            <div class="table-responsive p-5">
                <div class="d-flex justify-content-between">
                    <div class="mt-2">{{$date}}</div>
                    <form class="d-flex" action='/reg' method='post'>
                        @csrf
                        <input class="form-control me-2" type="date" placeholder="Search" name="todate">
                        <button class="btn btn-outline-success" type="submit"><i class="bi bi-lens"></i></button>
                    </form>
                </div>
                @if(($atts->count())>0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Institution</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($atts as $key=>$att)
                        <tr>
                        @foreach($users as $user)
                        @if($att->user_id==$user->id)
                        
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->institution}}</td>
                        @endif
                        @endforeach
                        <td>{{date_format($att->created_at,'F jS, Y H:i A')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection