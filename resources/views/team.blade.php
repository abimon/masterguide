@extends('layouts.app',['title'=>'Team'])
@section('content')
<div class="text-center text-dark mt-5">
	<h1><b>Team</b></h1>
</div>
<div id="teachers" class="section wb">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-12">
				<div class="our-team">
					<div class="team-img">
						<img src="{{asset('storage/images/team-01.png')}}">
						<div class="social">
							<ul>
								<li><a href="#" class="fa fa-facebook"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-skype"></a></li>
							</ul>
						</div>
					</div>
					<div class="team-content">
						<h3 class="title">Williamson</h3>
						<span class="post">Web Developer</span>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-12">
				<div class="our-team">
					<div class="team-img">
						<img src="{{asset('storage/images/team-02.png')}}">
						<div class="social">
							<ul>
								<li><a href="#" class="fa fa-facebook"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-skype"></a></li>
							</ul>
						</div>
					</div>
					<div class="team-content">
						<h3 class="title">Kristiana</h3>
						<span class="post">Web Designer</span>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-12">
				<div class="our-team">
					<div class="team-img">
						<img src="{{asset('storage/images/team-03.png')}}">
						<div class="social">
							<ul>
								<li><a href="#" class="fa fa-facebook"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-skype"></a></li>
							</ul>
						</div>
					</div>
					<div class="team-content">
						<h3 class="title">Steve Thomas</h3>
						<span class="post">Web Developer</span>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-12">
				<div class="our-team">
					<div class="team-img">
						<img src="{{asset('storage/images/team-04.png')}}">
						<div class="social">
							<ul>
								<li><a href="#" class="fa fa-facebook"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-linkedin"></a></li>
								<li><a href="#" class="fa fa-skype"></a></li>
							</ul>
						</div>
					</div>
					<div class="team-content">
						<h3 class="title">Miranda joy</h3>
						<span class="post">Web Developer</span>
					</div>
				</div>
			</div>
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- end section -->

@endsection