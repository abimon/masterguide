@extends('layouts.index2',['title'=>$title])
@section('dashboard')
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
                                <td>{{$user->attendee}}</td>
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
@endsection