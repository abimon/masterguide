@extends('layouts.index2',['title'=>'Dashboard'])
@section('dashboard')
<style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 30px;
        height: 20px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .checked+.slider {
        background-color: #2196F3;
    }

    .slider:focus {
        box-shadow: 0 0 1px #2196F3;
    }

    .checked+.slider:before {
        -webkit-transform: translateX(10px);
        -ms-transform: translateX(10px);
        transform: translateX(10px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
<div>
    <div class="masonry-item  w-100">
        <div class="row gap-20">
            <!-- #Toatl Visits ==================== -->
            <div class='col-md-3 col-6'>
                <a href="#members">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1"><i class="bi bi-people"></i> Total Memberss</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{$users->count()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- #Total Page Views ==================== -->
            <div class='col-md-3 col-6'>
                <a href="/resources">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1"><i class="bi bi-files"></i> Resource Files</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash2"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">{{$repos->count()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- #Unique Visitors ==================== -->
            <div class='col-md-3 col-6'>
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Posts</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed">
                                <span id="sparklinedash3"></span>
                            </div>
                            <div class="peer">
                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">@if(Auth()->user()->role=='Member') {{$posts->where('isPosted',1)->count()}} @else {{$posts->count()}} @endif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #Bounce Rate ==================== -->
            <div class='col-md-3 col-6'>
                <div class="layers bd bgc-white p-20">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1"><i class="bi bi-baloon-heart text-danger"></i>Birthdays Today</h6>
                    </div>
                    <div class="layer w-100">
                        <div class="peers ai-sb fxw-nw">
                            <div class="peer peer-greed">
                                <span id="sparklinedash4"></span>
                            </div>
                            <div class="peer">
                                <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">
                                    {{count($birthdays)}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- #posts Report ==================== -->
        <div class="bd bgc-white">
            <div class="layers" id="members">
                <div class="layer w-100 p-20">
                    <h6 class="lh-1">Blog Posts</h6>
                </div>
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h5>{{date('F Y')}}</h5>
                                <p class="mB-0">Blog Report</p>
                            </div>
                            <div class="peer">
                                <h3 class="text-right text-light">{{$posts->count()}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class=" bdwT-0">#</th>
                                    <th class=" bdwT-0">Title</th>
                                    <th class=" bdwT-0">Author</th>
                                    <th class=" bdwT-0">Creation Date</th>
                                    <th class=" bdwT-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $id=>$post)
                                <tr>
                                    <th class=" bdwT-0">{{$id+1}}</th>
                                    <td class="fw-600">{{$post->title}}</td>
                                    @foreach($users->where('id', $post->user_id) as $user)
                                    <td>{{$user->name}}
                                        @endforeach
                                    </td>
                                    <td>{{date_format(($post->created_at),'F jS, Y')}}</td>
                                    <td>
                                        <span class="text-success">
                                            <div class="">
                                                @if(($post->isPosted)==1)
                                                <a href="togglePost/{{$post->id}}">
                                                    <label class="switch">
                                                        <i type="button" class="checked"></i>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </a>
                                                @else
                                                <a href="togglePost/{{$post->id}}">
                                                    <label class="switch">
                                                        <i class=""></i>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </a>
                                                @endif

                                            </div>
                                        </span>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- #Members Report ==================== -->
        <div class="bd bgc-white">
            <div class="layers" id="members">
                <div class="layer w-100 p-20">
                    <h6 class="lh-1">Membership Report</h6>
                </div>
                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h5>{{date('F Y')}}</h5>
                                <p class="mB-0">Members Report</p>
                            </div>
                            <div class="peer">
                                <h3 class="text-right text-light">{{$users->count()}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class=" bdwT-0">#</th>
                                    <th class=" bdwT-0">Name</th>
                                    <th class=" bdwT-0">Institution</th>
                                    <th class=" bdwT-0">Joining Date</th>
                                    <th class=" bdwT-0">Role</th>
                                    @if(Auth()->user()->role !='Member')
                                    <th class="bdwT-0">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key=>$user)
                                <tr>
                                    <th class=" bdwT-0">{{$key+1}}</th>
                                    <td class="fw-600">{{$user->name}}</td>
                                    <td>{{$user->institution}}</td>
                                    <td>{{date_format(($user->created_at),'F jS, Y')}}</td>
                                    <td><span class="text-success">{{$user->role}}</span></td>
                                    @if(Auth()->user()->role !='Member')
                                    <td>
                                        <div class="btn-group">
                                            <div class="dropdown">
                                                <a class="btn btn-info text-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <?php $roles = ['Coordinator', 'Training Coordinator', 'Secretary', 'Director', 'Member']; ?>
                                                    @foreach($roles as $role)
                                                    @if($role!=$user->role)
                                                    <li><a class="dropdown-item text-primary" href="/make/{{$role}}/{{$user->id}}">Make {{$role}}</a></li>
                                                    @endif
                                                    @endforeach
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="/delete/{{$user->id}}">Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">{{$users->onEachSide(1)->links()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- #Members Report ==================== -->
        <div class="bd bgc-white">
            <div class="layers" id="members">

                <div class="layer w-100">
                    <div class="bgc-light-blue-500 c-white p-20">
                        <div class="peers ai-c jc-sb gap-40">
                            <div class="peer peer-greed">
                                <h5>{{date('F Y')}}</h5>
                                <p class="mB-0">Birthdays</p>
                            </div>
                            <div class="peer">
                                <h3 class="text-right text-light">{{$birthdays->count()}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive p-20">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class=" bdwT-0">#</th>
                                    <th class=" bdwT-0">Name</th>
                                    <th class=" bdwT-0">Institution</th>
                                    <th class=" bdwT-0">Joining Date</th>
                                    <th class=" bdwT-0">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($birthdays as $y=>$user)
                                <tr>
                                    <th class=" bdwT-0">{{$y+1}}</th>
                                    <td class="fw-600">{{$user->name}}</td>
                                    <td>{{$user->institution}}
                                    </td>
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
</div>

@endsection