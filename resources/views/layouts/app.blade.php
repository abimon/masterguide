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
	<link rel="apple-touch-icon" href="{{asset('storage/images/apple-touch-icon.png')}}">

	<!-- Bootstrap CSS-->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

	<!-- Site CSS -->
	<link rel="stylesheet" href="{{asset('storage/style.css')}}">
	<!-- ALL VERSION CSS -->
	<link rel="stylesheet" href="{{asset('storage/css/versions.css')}}">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="{{asset('storage/css/responsive.css')}}">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{asset('storage/css/custom.css')}}">

	<!-- Modernizer for Portfolio -->
	<script src="{{asset('storage/js/modernizer.js')}}"></script>
	<style>
		#loader {
			transition: all 0.3s ease-in-out;
			opacity: 1;
			visibility: visible;
			position: fixed;
			height: 100vh;
			width: 100%;
			background: #fff;
			z-index: 90000;
		}

		#loader.fadeOut {
			opacity: 0;
			visibility: hidden;
		}

		.spinner {
			width: 40px;
			height: 40px;
			position: absolute;
			top: calc(50% - 20px);
			left: calc(50% - 20px);
			background-color: #333;
			border-radius: 100%;
			-webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
			animation: sk-scaleout 1.0s infinite ease-in-out;
		}

		@-webkit-keyframes sk-scaleout {
			0% {
				-webkit-transform: scale(0)
			}

			100% {
				-webkit-transform: scale(1.0);
				opacity: 0;
			}
		}

		@keyframes sk-scaleout {
			0% {
				-webkit-transform: scale(0);
				transform: scale(0);
			}

			100% {
				-webkit-transform: scale(1.0);
				transform: scale(1.0);
				opacity: 0;
			}
		}

		a {
			text-decoration: none;
		}

		a :hover {
			color: #03F4FC;
		}
	</style>
	<div id='loader'>
		<div class="spinner"></div>
	</div>
	<script>
		window.addEventListener('load', function load() {
			const loader = document.getElementById('loader');
			setTimeout(function() {
				loader.classList.add('fadeOut');
			}, 300);
		});
	</script>
</head>

<body class="bg-info">
	<div class="bg-light" style="width: 85.7%; float:left;">
		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header tit-up">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Customer Login</h4>
					</div>
					<div class="modal-body customer-box">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs">
							<li><a class="active" href="#Login" data-toggle="tab">Login</a></li>
							<li><a href="#Registration" data-toggle="tab">Registration</a></li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active" id="Login">
								<form method="POST" action="{{ route('login') }}">
									@csrf

									<div class="row mb-3">
										<label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

										<div class="col-md-6">
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

											@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>

									<div class="row mb-3">
										<label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

										<div class="col-md-6">
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

											@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>

									<div class="row mb-3">
										<div class="col-md-6 offset-md-4">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

												<label class="form-check-label" for="remember">
													{{ __('Remember Me') }}
												</label>
											</div>
										</div>
									</div>

									<div class="row mb-0">
										<div class="col-md-8 offset-md-4">
											<button type="submit" class="btn btn-primary">
												{{ __('Login') }}
											</button>

											@if (Route::has('password.request'))
											<a class="btn btn-link" href="{{ route('password.request') }}">
												{{ __('Forgot Your Password?') }}
											</a>
											@endif
										</div>
									</div>
								</form>
							</div>
							<div class="tab-pane" id="Registration">
								<form method="POST" action="{{ route('register') }}">
									@csrf

									<div class="row mb-3">
										<label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

										<div class="col-md-6">
											<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

											@error('name')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>

									<div class="row mb-3">
										<label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

										<div class="col-md-6">
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

											@error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>

									<div class="row mb-3">
										<label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

										<div class="col-md-6">
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

											@error('password')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
									</div>

									<div class="row mb-3">
										<label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

										<div class="col-md-6">
											<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
										</div>
									</div>

									<div class="row mb-0">
										<div class="col-md-6 offset-md-4">
											<button type="submit" class="btn btn-primary">
												{{ __('Register') }}
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Start header -->
		<header class="top-navbar">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="/">
						<img src="{{asset('storage/images/logo.png')}}" alt="" width="50" />
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
							<li class="nav-item {{(request()->path())=='contact' ? 'active':''}}"><a class="nav-link" href="/contact">Contact</a></li>
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
									<li><a target='_blank' href="href="https://twitter.com/EddieAbbie59?t=309BdPr2O3VjcIqROf2OAA&s=09https://twitter.com/EddieAbbie59?t=309BdPr2O3VjcIqROf2OAA&s=09"><i class="fa fa-twitter"></i></a></li>
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
									<a target="_blank" href="https://www.jkusdachurch.org/" style="text-decoration:none;" class="text-light">
										<p>JKUSDA</p>
									</a>
								</li>
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

					<div class="col-lg-4 col-md-4 col-xs-12">
						<div class="widget clearfix">
							<div class="widget-title">
								<h3>Contact Details</h3>
							</div>

							<ul class="footer-links">
								<li><a href="mailto:#">info@unimasterguide.com</a></li>
								<li><a href="#">www.unimasterguide.com</a></li>
								<li>+254 701 583 807</li>
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