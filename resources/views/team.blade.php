@extends('layouts.app',['title'=>'Team'])
@section('content')
<div class="text-center text-dark mt-5">
	<h1><b>Team</b></h1>
</div>
<div id="teachers" class="section wb ">
	<div class="container">
		<div class="row d-flex justify-content-center">
			@foreach($users->where('role','Coordinator') as $user)
			<div class="col-lg-3 col-md-6 col-12">
				<div class="our-team">
					<div class="team-img">
						<img src="{{asset('storage/profile/'.$user['avatar'])}}" style="width: 250px; height: 300px;">
						<div class="social">
							<ul>
								<!--
								<li><a href="#" class="fa fa-facebook"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-skype"></a></li>
							-->
								<li><a href="https://wa.me/{{$user->contact}}" target='_blank' class="fa fa-whatsapp"></a></li>
							</ul>
						</div>
					</div>
					<div class="team-content">
						<h3 class="title">{{$user->name}}</h3>
						<span class="post">{{$user->role}}-{{$user->institution}}</span>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<!-- end row -->
		<div class="row d-flex justify-content-center">
			@foreach($users->where('role','Secretary') as $user)
			<div class="col-lg-3 col-md-6 col-12">
				<div class="our-team">
					<div class="team-img">
						<img src="{{asset('storage/profile/'.$user->avatar)}}" style="width: 250px; height: 300px;">
						<div class="social">
							<ul>
								<!--
								<li><a href="#" class="fa fa-facebook"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-skype"></a></li>
							-->
								<li><a href="https://wa.me/{{$user->contact}}" target='_blank' class="fa fa-whatsapp"></a></li>
							</ul>
						</div>
					</div>
					<div class="team-content">
						<h3 class="title">{{$user->name}}</h3>
						<span class="post">{{$user->role}}-{{$user->institution}}</span>
					</div>
				</div>
			</div>
			@endforeach
			@foreach($users->where('role','Training Coordinator') as $user)
			<div class="col-lg-3 col-md-6 col-12">
				<div class="our-team">
					<div class="team-img">
						<img src="{{asset('storage/profile/'.$user->avatar)}}" style="width: 250px; height: 300px;">
						<div class="social">
							<ul>
								<!--
								<li><a href="#" class="fa fa-facebook"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-skype"></a></li>
							-->
								<li><a href="https://wa.me/{{$user->contact}}" target='_blank' class="fa fa-whatsapp"></a></li>
							</ul>
						</div>
					</div>
					<div class="team-content">
						<h3 class="title">{{$user->name}}</h3>
						<span class="post">{{$user->role}}-{{$user->institution}}</span>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<!-- end row -->
		<div class="row d-flex justify-content-center">
			@foreach($users->where('role','Director') as $user)
			<div class="col-lg-3 col-md-6 col-12">
				<div class="our-team">
					<div class="team-img">
						<img src="{{asset('storage/profile/'.$user->avatar)}}" style="width: 250px; height: 300px;">
						<div class="social">
							<ul>
								<!--
								<li><a href="#" class="fa fa-facebook"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-skype"></a></li>
							-->
								<li><a href="https://wa.me/{{$user->contact}}" target='_blank' class="fa fa-whatsapp"></a></li>
							</ul>
						</div>
					</div>
					<div class="team-content">
						<h3 class="title">{{$user->name}}</h3>
						<span class="post">{{$user->role}}-{{$user->institution}}</span>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div><!-- end container -->
</div><!-- end section -->

@endsection