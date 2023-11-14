<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Site Metas -->
	<title>{{$title}} - Universities Master Guide Region</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="{{asset('storage/images/favicon.png')}}" type="image/x-icon" />
	<link rel="apple-touch-icon" href="{{asset('storage/images/favicon.png')}}">
	<!-- Site CSS -->
	<link rel="stylesheet" href="{{asset('storage/style.css')}}">
	<!-- ALL VERSION CSS -->
	<link rel="stylesheet" href="{{asset('storage/css/versions.css')}}">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="{{asset('storage/css/responsive.css')}}">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{asset('storage/css/custom.css')}}">
	<!-- Bootstrap CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<!-- Modernizer for Portfolio -->
	<script src="{{asset('storage/js/modernizer.js')}}"></script>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-225603784212404"
     crossorigin="anonymous"></script>
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VD7DHLDJ99"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VD7DHLDJ99');
</script>
<body class="bg-info fs-sm-5">
	<div class="bg-light" style="width: 85.7%; float:left;">
		<!-- Start header -->
		<header class="top-navbar">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="/">
						<img src="{{asset('storage/images/favicon.png')}}" alt="" width="50" />
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbars-host">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item {{(request()->path())=='/' ? 'active':''}}"><a class="nav-link" href="/">Home</a></li>
							<li class="nav-item {{(request()->path())=='resources' ? 'active':''}}"><a class="nav-link " href="/resources">Resources</a></li>
							<li class="nav-item {{(request()->path())=='blog' ? 'active':''}}"><a class="nav-link" href="/blog">Blog</a></li>
							<li class="nav-item {{(request()->path())=='team' ? 'active':''}}"><a class="nav-link" href="/team">Team</a></li>
							<li class="nav-item {{(request()->path())=='events' ? 'active':''}}"><a class="nav-link" href="/events">Events</a></li>
							@guest
							<li class="nav-item {{(request()->path())=='login' ? 'active':''}}"><a class="nav-link" href="/login"><span>Join Now!</span></a></li>
							@else
							<li class="nav-item {{(request()->path())=='dashboard' ? 'active':''}}"><a class="nav-link" href="/dashboard"><span>Panel</span></a></li>
							@endguest
						</ul>
					</div>
			</nav>
		</header>
		<!-- End header -->
		<div style="min-height: 600px;">
			@yield('content')
		</div>


		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-xs-12">
						<div class="widget clearfix">
							<div class="widget-title">
								<h3>About US</h3>
							</div>
							<p>We uphold all the standards of the church as a basis for all our operation. Our sole aim is to learn how to lead young youths between the age of 4yrs to 16yrs to a saving relationship with Jesus Christ. </p>
							<div class="footer-right">
								<ul class="footer-links-soi">
									<li><a target='_blank' href="https://www.facebook.com/edimon.ombati.3"><i class="fa fa-facebook"></i></a></li>
									<li><a target='_blank' href="https://twitter.com/EddieAbbie59?t=309BdPr2O3VjcIqROf2OAA&s=09https://twitter.com/EddieAbbie59?t=309BdPr2O3VjcIqROf2OAA&s=09"><i class="fa fa-twitter"></i></a></li>
									<li><a target='_blank' href="https://wa.me/+254701583807"><i class="fa fa-whatsapp"></i></a></li>
								</ul><!-- end links -->
							</div>
						</div><!-- end clearfix -->
					</div><!-- end col -->

					<div class="col-lg-4 col-md-4 col-xs-12">
						<div class="widget clearfix">
							<div class="widget-title">
								<h3>Information Link</h3>
							</div>
							<ul class="footer-links">
								<li>
									<a target="_blank" href="https://www.gcyouthministries.org/" style="text-decoration:none;" class="text-light">
										<p>GC Youth Ministries </p>
									</a>
								</li>
								<li>
									<a target="_blank" href="https://gc.adventist.org/" style="text-decoration:none;" class="text-light">
										<p>General Conference</p>
									</a>
								</li>

							</ul><!-- end links -->
						</div><!-- end clearfix -->
					</div><!-- end col -->

					<div class="col-lg-4 col-md-4 col-xs-12" id="contactus">
						<div class="widget clearfix">
							<div class="widget-title">
								<h3>Contact Details</h3>
							</div>

							<ul class="footer-links">
								<li><a href="mailto:info@emasterguide.top">info@emasterguide.top</a></li>
								<li><a href="www.emasterguide.top">www.emasterguide.top</a></li>
								<li><a href="tel:+254701583807">+254 701 583 807</a></li>
							</ul><!-- end links -->
						</div><!-- end clearfix -->
					</div><!-- end col -->

				</div><!-- end row -->
			</div><!-- end container -->
		</footer><!-- end footer -->

		<div class="copyrights">
			<div class="container">
				<div class="footer-distributed">
					<div class="footer-center">
						<p class="footer-company-name">All Rights Reserved. &copy; {{date('Y')}} <a href="#">UniversitiesRegion</a> Design By : <a href="https://apekinc.top/">APEK INC</a></p>
					</div>
				</div>
			</div><!-- end container -->
		</div><!-- end copyrights -->

		<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

	</div>
	<div style="width:14.3%; float:right;">
		<img src="{{asset('storage/images/SDALogo.png')}}" style="width:100%;">
	</div>
	<!-- ALL JS FILES -->
	<script src="{{asset('storage/js/all.js')}}"></script>
	<!-- ALL PLUGINS -->
	<script src="{{asset('storage/js/custom.js')}}"></script>
	<script src="{{asset('storage/js/timeline.min.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
	</script>
</body>

</html>