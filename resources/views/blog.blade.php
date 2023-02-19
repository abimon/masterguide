@extends('layouts.app', ['title'=>'Blog'])
@section('content')

    <div id="overviews" class="section wb">
        <div class="container">

            <hr class="invis"> 

            <div class="row"> 
				@foreach($posts as $post)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-item">
						<div class="image-blog">
							<img src="{{asset('storage/images/blog_1.jpg')}}" alt="" class="img-fluid">
						</div>
						<div class="meta-info-blog">
							<span><i class="fa fa-calendar"></i> <a href="#">{{date_format(($post->created_at), 'F j, Y')}}</a> </span>
                            <span><i class="fa fa-thumbs-up"></i>  <a href="#">{{$likes->where('post_id',$post->id)->count()}}</a> </span>
                            <span><i class="fa fa-comments"></i> <a href="#">{{$comments->where('post_id',$post->id)->count()}} Comments</a></span>
						</div>
						<div class="blog-title">
							<h2><a href="#" title="">{{$post->title}}</a></h2>
						</div>
						<div class="blog-desc">
							<p>{{$post->exerpt}}.... </p>
						</div>
						<div class="blog-button">
							<a class="hover-btn-new orange" href="/blogpost/{{$post->title}}"><span>Read More<span></a>
						</div>
					</div>
                </div><!-- end col -->
				@endforeach
            </div><!-- end row -->

            <hr class="hr3"> 
        </div><!-- end container -->
    </div><!-- end section -->

@endsection