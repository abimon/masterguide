@extends('layouts.app', ['title'=>'Blog Post'])
@section('content')
<div id="overviews" class="section wb">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 blog-post-single">
				<div class="blog-item">
					<div class="image-blog">
						<img src="images/blog_single.jpg" alt="" class="img-fluid">
					</div>
					<div class="post-content">
						<div class="post-date">
							<span class="day">{{date_format(($post->created_at), 'd')}}</span>
							<span class="month">Nov</span>
						</div>
						<div class="meta-info-blog">
							<span><i class="fa fa-calendar"></i> <a href="#">{{date_format(($post->created_at), 'F j, Y')}}</a> </span>
							<span><i class="fa fa-thumbs-up"></i> <a href="/like/{{$post->id}}"> {{$likes->count()}} Likes</a> </span>
							<span><i class="fa fa-comments"></i> <a href="#comment-blog">{{$comments->count()}} Comments</a></span>
						</div>
						<div class="blog-title">
							<h2><a href="#" title="">{{$post->title}}</a></h2>
						</div>
						<div class="blog-desc">
							<?php echo html_entity_decode($post['post']); ?>
						</div>
					</div>
				</div>

				<div class="blog-author">
					<div class="author-bio">
						<h3 class="author_name"><a href="#">{{$post->author}}</a></h3>
						
						<p class="author_det">
							{{$post->bio}}
						</p>
					</div>
					<div class="author-desc">
						<img src="{{asset('storage/authors/'.$post->path)}}" alt="about author" style="width:100%">
						<!--<ul class="author-social mb-1">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-skype"></i></a></li>
							</ul>-->
					</div>
				</div>

				<div class="blog-comments">
					<h4>Comments ({{$comments->count()}})</h4>
					<div id="comment-blog">
						<ul class="comment-list">
							@foreach($comments as $comment)
							<li class="comment">
								@foreach($users->where('id', $comment->user_id) as $commenter)
								<div class="avatar"><img alt="" src="{{asset('storage/profile/'.$commenter->avatar)}}" class="avatar"></div>
								<div class="comment-container">
									<h5 class="comment-author"><a href="#">{{$commenter->name}}</a></h5>
									<div class="comment-meta">
										<a href="#" class="comment-date link-style1">{{date_format(($comment->created_at), 'F j, Y')}}</a>
									</div>
									<div class="comment-body">
										<p>{{$comment->comment}}</p>
									</div>
								</div>
								@endforeach
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="comments-form">
					<h4>Leave a comment</h4>
					<div class="comment-form-main">
						<form action="/comment/{{$post->id}}" method="post">
							@csrf
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="form-control" name="comment" placeholder="Comment" id="comment" cols="30" rows="2"></textarea>
									</div>
								</div>
								<div class="col-md-12 post-btn mt-2">
									<button class="hover-btn-new orange"><span>Post Comment</span></button>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div><!-- end col -->
			<div class="col-lg-3 col-12 right-single">
				<div class="widget-search">
					<div class="site-search-area">
						<form method="get" id="site-searchform" action="#">
							<div>
								<input class="input-text form-control" name="search-k" id="search-k" placeholder="Search keywords..." type="text">
								<input id="searchsubmit" value="Search" type="submit">
							</div>
						</form>
					</div>
				</div>
				<div class="widget-categories">
					<h3 class="widget-title">Categories</h3>
					<ul>
						<li><a href="#">Political Science</a></li>
						<li><a href="#">Business Leaders Guide</a></li>
						<li><a href="#">Become a Product Manage</a></li>
						<li><a href="#">Language Education</a></li>
						<li><a href="#">Micro Biology</a></li>
						<li><a href="#">Social Media Management</a></li>
					</ul>
				</div>
				<div class="widget-tags">
					<h3 class="widget-title">Search Tags</h3>
					<ul class="tags">
						<li><a href="#"><b>business</b></a></li>
						<li><a href="#"><b>jquery</b></a></li>
						<li><a href="#">corporate</a></li>
						<li><a href="#">portfolio</a></li>
						<li><a href="#">css3</a></li>
						<li><a href="#"><b>theme</b></a></li>
						<li><a href="#"><b>html5</b></a></li>
						<li><a href="#"><b>mysql</b></a></li>
						<li><a href="#">multipurpose</a></li>
						<li><a href="#">responsive</a></li>
						<li><a href="#">premium</a></li>
						<li><a href="#">javascript</a></li>
						<li><a href="#"><b>Best jQuery</b></a></li>
					</ul>
				</div>
			</div>
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- end section -->
@endsection