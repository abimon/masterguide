@extends('layouts.index2',['title'=>'Members'])
@section('dashboard')
<!-- #Sales Report ==================== -->
<div class="bd bgc-white">
    <div class="layers" id="members">
        <div class="layer w-100 p-20">
            <h6 class="lh-1">Membership Register</h6>
        </div>
        <div class="layer w-100">
            <div class="bgc-light-blue-500 c-white p-20">
                <div class="peers ai-c jc-sb gap-40">
                    <div class="peer peer-greed">
                        <h5>{{date('F j, Y')}}</h5>
                        <p class="mB-0">Members Attendance</p>
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
                                <th class=" bdwT-0">Avatar</th>
                                <th class=" bdwT-0">Name</th>
                                <th class=" bdwT-0">Institution</th>
                                <th class=" bdwT-0">Present</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key=>$user)
                            <tr>
                                <th class=" bdwT-0">{{$key+1}}</th>
                                <td class="fw-600"><img src="{{asset('storage/profile/'.$user->avatar)}}"
                                        class='rounded-circle' alt="" width='40' height=40></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->institution}}</td>
                                <td><span class="">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{$user->id}}"
                                                name="user_id[]" id="flexCheckDefault">
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
                        <button type="submit" formaction="/selectmem" class="btn btn-outline-warning">Select</button>
                        <button type="submit" formaction="/markAttendance" class="btn btn-outline-info">Submit Attendance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

</script>
@endsection