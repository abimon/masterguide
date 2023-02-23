@extends('layouts.app',['title'=>'Home'])
@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="{{asset('storage/images/flag.jpg')}}" class="d-block w-100">
		</div>
		<div class="carousel-item">
			<img src="{{asset('storage/images/ministry.png')}}" class="d-block w-100">
		</div>
		<div class="carousel-item">
			<img src="{{asset('storage/images/uni.jpg')}}" class="d-block w-100">
		</div>
	</div>
</div>
<div id="overviews" class="section lb">
	<div class="shadow-lg border m-2 p-2">
		<div class="section-title row text-center">
			<div class="d-flex justify-content-center">
				<div class="col-lg-10">
					<h3>About</h3>
					<p>
						Masterguide is one of the most current leadership development program for youth ministry in the Seventh-day Adventist Church. The Master Guide is the foundation for youth ministry leadership, then builds two levels of continuing education that will help keep youth leaders sharp.
					</p>
					<p>The Master Guide (MG) curriculum is one of the leadership programs that
						the General Conference Youth Ministries Department
						uses to train people for youth leadership. It is the “Ph.D.”
						of youth ministry in the field. You cannot earn your Master
						Guide without taking at least one Basic Staff Training (BST) course.</p>

					<p>The Master Guide is the expert, the advisor, the promoter for Adventurers
						and Pathfinders. As such, MG is NOT a Pathfinder program, it is a
						Youth Ministry Leadership Program.</p>
					<p>However, our members are mandated to serve anywhere in the world for to spread the gospel through all the world in our generation</p>
					<div class="collapse collapse-vertical" id="more">
						<h4>MASTER GUIDE LEADERSHIP</h4>
						<p>This continues to be the highest level of leadership within the Adventurer/ Pathfinder
							programs of the church. It focuses on one’s personal spiritual life and growth first
							and foremost. General leadership skills are then woven into the sharpening of those skills,
							which are specifically geared to leading youth in God-ordained areas of development:
							understanding God’s world of nature, outreach ministry, service to others and a life-style
							that denotes healthy living.</p>

						<p>As one church leader of the past put it so simply: “You can’t teach what you don’t know,
							and you can’t lead where you won’t go.” As leaders we must not only be good at spouting
							theory if we expect to see success with our youth ministry; we must live what we preach
							and demonstrate it. </p>
					</div>
					<div class="text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#more" aria-expanded="false" aria-controls="collapseWidthExample">
						More >>
					</div>
				</div>
			</div>
		</div><!-- end title -->

		<div class="shadow-lg border m-2">
			<div class="row m-2" style="text-align:center ;">
				<div class="col-md-3 p-1">
					<h4 class="p-1"><b>Our Aim</b>
						<hr class="text-primary">
					</h4>

					<p>To take the Advent Message to all the world in our generation.</p>
					<h4 class="p-1"><b>Our Motto</b>
						<hr class="text-warning shadow">
					</h4>
					<p>The Love of Christ constrains us.</p>
					<h4 class="p-1"><b>Our Law</b>
						<hr class="text-danger shadow">
					</h4>
					<p>Be an example in Word, Conduct, Love, Spirit, Faith, and Purity.</p>
					<h4 class="p-1"><b>Our Pledge</b>
						<hr class="text-success">
					</h4>
					<p>Loving the Lord Jesus, we (individually) promise to take an active part in Adventurers,
						Pathfinders and Youth Ministries,
						doing what we can to finish the work of the gospel in all the world.</p>
				</div>
				<div class="col-md-9 p-1">
					<h4 class="p-1"><b>AY Legion of Honor</b>
						<hr class="text-warning">
					</h4>
					<p>I volunteer to join the AY Legion of Honor, and by the grace and power of God I will:<br>
						HONOR CHRIST in that which I choose to BEHOLD<br>
						HONOR CHRIST in that to which I choose to LISTEN<br>
						HONOR CHRIST in the choice of places to which I GO<br>
						HONOR CHRIST in the choice of ASSOCIATES<br>
						HONOR CHRIST in that which I choose to SPEAK<br>
						HONOR CHRIST in the care I give my BODY TEMPLE<br>
					</p>
					<h4 class="p-1"><b>Masterguide Anthem</b>
						<hr class="text-info">
					</h4>
					<p>
						Press on forward Master Guides with holy boldness; we’re invested with great strength.<br>
						To help all the youth who choose to be with Jesus, and they long to follow Him.<br>
						To the lost souls we are giving the great message that constrains within our hearts.<br>
						There’s a crown awaiting each of us in heaven, with bright stars which Jesus has for us.
					</p>
					<p>
						Press on forward Master Guides with holy boldness; we’re invested with great strength.<br>
						With a glorious torch that’s lifted up towards heaven, will bring light into this world.<br>
						Though we’re threatened by a world that’s filled with darkness, we’ll go forward without fear.<br>
						In the light that keeps on shining from our Savior, to help guide us as we walk the AY path.
					</p>
					<div class="d-flex justify-content-center">
						<audio src="{{asset('storage/anthem.mp3')}}" controls></audio>
					</div>

				</div>

			</div>
		</div>
	</div><!-- end container -->
</div>
<!-- section
<section class="section lb page-section">
	<div class="container">
		<div class="section-title row text-center">
			<div class="col-md-8 offset-md-2">
				<h3>Our history</h3>
				<p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
			</div>
		</div>
		<div class="timeline">
			<div class="timeline__wrap">
				<div class="timeline__items">
					<div class="timeline__item">
						<div class="timeline__content img-bg-01">
							<h2>2018</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus. Lorem
								ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
					<div class="timeline__item">
						<div class="timeline__content img-bg-02">
							<h2>2015</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus. Lorem
								ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
					<div class="timeline__item">
						<div class="timeline__content img-bg-03">
							<h2>2014</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus. Lorem
								ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
					<div class="timeline__item">
						<div class="timeline__content img-bg-04">
							<h2>2012</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus. Lorem
								ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
					<div class="timeline__item">
						<div class="timeline__content img-bg-01">
							<h2>2010</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus. Lorem
								ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
					<div class="timeline__item">
						<div class="timeline__content img-bg-02">
							<h2>2007</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus. Lorem
								ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
					<div class="timeline__item">
						<div class="timeline__content img-bg-03">
							<h2>2004</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus. Lorem
								ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
					<div class="timeline__item">
						<div class="timeline__content img-bg-04">
							<h2>2002</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dignissim neque condimentum lacus dapibus. Lorem
								ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
							-->
<div class="section cl">
	<div class="container">
		<div class="row text-left stat-wrap">
			<div class="col-md-4 col-sm-4 col-xs-12">
				<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-study"></i></span>
				<p class="stat_count">120</p>
				<h3>Students</h3>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
				<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-online"></i></span>
				<p class="stat_count">240</p>
				<h3>Courses</h3>
			</div>

			<div class="col-md-4 col-sm-4 col-xs-12">
				<span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-years"></i></span>
				<p class="stat_count">55</p>
				<h3>Years Completed</h3>
			</div>
		</div>
	</div>
</div>
<!--
<div class="hmv-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-12">
				<div class="inner-hmv text-center">
					<h3>Mission</h3>
					<div class="tr-pa">M</div>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam eligendi expedita, provident cupiditate in excepturi.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="inner-hmv">
					<div class="icon-box-hmv"><i class="flaticon-eye"></i></div>
					<h3>Vision</h3>
					<div class="tr-pa">V</div>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam eligendi expedita, provident cupiditate in excepturi.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<div class="inner-hmv">
					<div class="icon-box-hmv"><i class="flaticon-history"></i></div>
					<h3>History</h3>
					<div class="tr-pa">H</div>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam eligendi expedita, provident cupiditate in excepturi.</p>
				</div>
			</div>
		</div>
	</div>
</div>
end section -->
<?php $img = asset('storage/images/parallax_04.jpg'); ?>
<div id="testimonials" class="parallax section db parallax-off" style="background-image:url({{$img}});">
	<div class="container">
		<div class="section-title text-center">
			<h3>Testimonials</h3>
		</div><!-- end title -->

		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">
						@foreach($testimonials as $key=>$test)
						<div class="carousel-item {{($key+1) ==1 ? 'active': ''}}">
							<div class="testimonial clearfix">
								@foreach($users->where('id',$test->user_id) as $user)
								<div class="testi-meta">
									<img src="{{asset('storage/profile/'.$user->avatar)}}" alt="" class="img-fluid">
									<h4>James Fernando </h4>
								</div>
								<div class="desc">
									<h3><i class="fa fa-quote-left"></i> Wonderful Support!</h3>
									<p class="lead">They have got my project on time with the competition with a sed highly skilled, and experienced & professional team.</p>
								</div>
								@endforeach
								<!-- end testi-meta -->
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div><!-- end col -->
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- end section -->

@endsection