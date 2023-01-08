@extends('layouts.index2',['title'=>'Dashboard'])
@section('dashboard')
<!-- ### $App Screen Content ### -->
<main class='main-content bgc-grey-100 p-5'>
    <div id='mainContent'>
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-6"></div>
            <div class="masonry-item  w-100">
                <div class="row gap-20">
                    <!-- #Toatl Visits ==================== -->
                    <div class='col-md-3'>
                        <a href="#members">
                            <div class="layers bd bgc-white p-20">
                                <div class="layer w-100 mB-10">
                                    <h6 class="lh-1"><i class="bi bi-people"></i> Total Users</h6>
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
                    <div class='col-md-3'>
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
                    <div class='col-md-3'>
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Unique Visitor</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed">
                                        <span id="sparklinedash3"></span>
                                    </div>
                                    <div class="peer">
                                        <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">~12%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- #Bounce Rate ==================== -->
                    <div class='col-md-3'>
                        <div class="layers bd bgc-white p-20">
                            <div class="layer w-100 mB-10">
                                <h6 class="lh-1">Bounce Rate</h6>
                            </div>
                            <div class="layer w-100">
                                <div class="peers ai-sb fxw-nw">
                                    <div class="peer peer-greed">
                                        <span id="sparklinedash4"></span>
                                    </div>
                                    <div class="peer">
                                        <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">33%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="masonry-item col-md-12">
                <!-- #Sales Report ==================== -->
                <div class="bd bgc-white">
                    <div class="layers" id="members">
                        <div class="layer w-100 p-20">
                            <h6 class="lh-1">Membership Report</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="bgc-light-blue-500 c-white p-20">
                                <div class="peers ai-c jc-sb gap-40">
                                    <div class="peer peer-greed">
                                        <h5>November 2017</h5>
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
                                            <th class=" bdwT-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key=>$user)
                                        <tr>
                                            <th class=" bdwT-0">{{$key+1}}</th>
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
                    <div class="ta-c bdT w-100 p-20">
                        <a href="#">Check all members</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection