@extends('layouts.app', ['title'=>'Resources'])
@section('content')
<div id="overviews" class="section wb">
	<div class="container">
		<div class="section-title row text-center">
			<div class="col-md-8 offset-md-2">
				<h1>Resources<span class="m_1"><i>Study to shew thyself approved unto God, a workman that needeth not to be ashamed, rightly dividing the word of truth.</i> ~ 2 Timothy 2:15</span></h1>
			</div>
		</div><!-- end title -->

		<hr class="invis">

		<div class="row">
			<div class="col-lg-4 col-md-6 col-12">
				<div class="course-item">
					<div class="image-blog">
						<img src="images/blog_1.jpg" alt="" class="img-fluid">
					</div>
					<div class="course-br">
						<div class="course-title">
							<h2><a href="#" title="">Adventurers</a></h2>
						</div>
						<div class="course-desc" style="height:150px; overflow: hidden;">
							<p>The Adventurer Club is a Seventh-day Adventist Church-sponsored ministry open to all families of children in grades pre-kindergarten - 4 (kids ages 4-9).</p>
						</div>
						<div class="course-rating">
							<i class="fa fa-star" style="color:#ADD8E6;"></i>
							<i class="fa fa-star" style="color:green;"></i>
							<i class="fa fa-star" style="color:yellow;"></i>
							<i class="fa fa-star" style="color:red;"></i>
							<i class="fa fa-star" style="color:blue;"></i>
							<i class="fa fa-star" style="color:#800020;"></i>
						</div>
					</div>
					<div class="course-meta-bot">
						<ul>
							<li type="button" data-bs-toggle="modal" data-bs-target="#adventurers"><i class="fa fa-book" aria-hidden="true"></i> {{$repos->where('category','adv')->count()}} File(s)</li>
						</ul>
						<!-- Modal -->
						<div class="modal fade" id="adventurers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Adventurers</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										@foreach($repos->where('category','adv') as $repo)
										<div class="alert alert-info d-flex justify-content-between">
											{{$repo->file_name}}
											<a href="{{asset('storage/resources/'.$repo['file_path'])}}" target="_blank" fillable style="text-decoration:none;">
												Read
											</a>
											<a target="_blank" href="{{asset('storage/resources/'.$repo['file_path'])}}" download style="text-decoration:none;">
												Download
											</a>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- end col -->

			<div class="col-lg-4 col-md-6 col-12">
				<div class="course-item">
					<div class="image-blog">
						<img src="images/blog_2.jpg" alt="" class="img-fluid">
					</div>
					<div class="course-br">
						<div class="course-title">
							<h2><a href="#" title="">Pathfinders</a></h2>
						</div>
						<div class="blog-desc" style="height:150px; overflow: hidden;">
							<p>Enlarging their windows to the world and building a relationship with God are the dual objectives of this club designed for children ages 10-15.</p>
						</div>
						<div class="course-rating">
							<i class="fa fa-star" style="color:blue;"></i>
							<i class="fa fa-star" style="color:red;"></i>
							<i class="fa fa-star" style="color:green;"></i>
							<i class="fa fa-star" style="color:silver;"></i>
							<i class="fa fa-star" style="color:#800020;"></i>
							<i class="fa fa-star" style="color:gold;"></i>
						</div>
					</div>
					<div class="course-meta-bot">
						<ul>
							<li type="button" data-bs-toggle="modal" data-bs-target="#pathfinders"><i class="fa fa-book" aria-hidden="true"></i> {{$repos->where('category','pf')->count()}} File(s)</li>
						</ul>
						<!-- Modal -->
						<div class="modal fade" id="pathfinders" tabindex="-1" aria-labelledby="pathfinders" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Pathfinders</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										@foreach($repos->where('category','pf') as $repo)
										<div class="alert alert-info d-flex justify-content-between">
											{{$repo->file_name}}
											<a href="{{asset('storage/resources/'.$repo['file_path'])}}" target="_blank" fillable style="text-decoration:none;">
												Read
											</a>
											<a target="_blank" href="{{asset('storage/resources/'.$repo['file_path'])}}" download style="text-decoration:none;">
												Download
											</a>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- end col -->

			<div class="col-lg-4 col-md-6 col-12">
				<div class="course-item">
					<div class="image-blog">
						<img src="images/blog_3.jpg" alt="" class="img-fluid">
					</div>
					<div class="course-br">
						<div class="course-title">
							<h2><a href="#" title="">Masterguide</a></h2>
						</div>
						<div class="course-desc" style="height:150px; overflow: hidden;">
							<p>It focuses on one’s personal spiritual life and growth first and foremost. General leadership skills are then woven into the sharpening of those skills, which are specifically geared to leading youth in God-ordained areas of development.</p>
						</div>
						<div class="d-flex justify-content-between">
							<div class="course-rating">
								<i class="fa fa-star" style="color:#ADD8E6;"></i>
								<i class="fa fa-star" style="color:green;"></i>
								<i class="fa fa-star" style="color:yellow;"></i>
								<i class="fa fa-star" style="color:red;"></i>
								<i class="fa fa-star" style="color:blue;"></i>
								<i class="fa fa-star" style="color:#800020;"></i>
							</div>
							<div>
								<img src="{{asset('storage/images/favicon.png')}}" width="20">
							</div>
							<div class="course-rating">
								<i class="fa fa-star" style="color:blue;"></i>
								<i class="fa fa-star" style="color:red;"></i>
								<i class="fa fa-star" style="color:green;"></i>
								<i class="fa fa-star" style="color:silver;"></i>
								<i class="fa fa-star" style="color:#800020;"></i>
								<i class="fa fa-star" style="color:gold;"></i>
							</div>
						</div>
					</div>
					<div class="course-meta-bot">
						<ul>
							<li type="button" data-bs-toggle="modal" data-bs-target="#master"><i class="fa fa-book" aria-hidden="true"></i> {{$repos->where('category','mg')->count()}} File(s)</li>
						</ul>
						<!-- Modal -->
						<div class="modal fade" id="master" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Adventurers</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										@foreach($repos->where('category','mg') as $repo)
										<div class="alert alert-info d-flex justify-content-between">
											{{$repo->file_name}}
											<a href="{{asset('storage/resources/'.$repo['file_path'])}}" target="_blank" fillable style="text-decoration:none;">
												Read
											</a>
											<a target="_blank" href="{{asset('storage/resources/'.$repo['file_path'])}}" download style="text-decoration:none;">
												Download
											</a>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- end col -->
		</div><!-- end row -->

		<hr class="hr3">

		<div class="row">
			@foreach($notes as $note)
			<div class="col-lg-4 col-md-6 col-12">
				<div class="course-item">

					@foreach($courses->where('id',$note->course_id) as $course)
					<div class="image-blog">
						<img src="{{assets('storage/images/blog_4.jpg')}}" alt="" class="img-fluid">
					</div>
					<div class="course-br">
						<div class="course-title">
							<h2><a href="#" title="">{{$course->course_name}}</a></h2>
						</div>
						<div class="course-desc" style="height:150px; overflow: hidden;">
							@foreach($categories->where('id',$course->category_id) as $category)
							<p>Category: {{$category->category_name}}</p>
							@endforeach
							@foreach($users->where('id',$note->fac_id) as $user)
							<p>Facilitator: {{$user->name}}</p>
							@endforeach
						</div>
					</div>
					<div class="course-meta-bot">
						<ul>
							<li><a href="/course/{{$course->course_name}}">Read More...</a></li>
						</ul>
					</div>
					@endforeach
				</div>
			</div>
			@endforeach
			<!-- end col -->
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- end section -->
@endsection