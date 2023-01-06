@extends('layouts.app', ['title'=>'Blog'])
@section('content')

    <div id="overviews" class="section wb">
        <div class="container">

            <hr class="invis"> 

            <div class="row"> 
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-item">
						<div class="image-blog">
							<img src="images/blog_1.jpg" alt="" class="img-fluid">
						</div>
						<div class="meta-info-blog">
							<span><i class="fa fa-calendar"></i> <a href="#">May 11, 2015</a> </span>
                            <span><i class="fa fa-tag"></i>  <a href="#">News</a> </span>
                            <span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
						</div>
						<div class="blog-title">
							<h2><a href="#" title="">perferendis doloribus asperiores.</a></h2>
						</div>
						<div class="blog-desc">
							<p>Lorem ipsum door sit amet, fugiat deicata avise id cum, no quo maiorum intel ogrets geuiat operts elicata libere avisse id cumlegebat, liber regione eu sit.... </p>
						</div>
						<div class="blog-button">
							<a class="hover-btn-new orange" href="blogpost"><span>Read More<span></a>
						</div>
					</div>
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="hr3"> 
        </div><!-- end container -->
    </div><!-- end section -->

@endsection