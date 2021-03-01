<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	{{--<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">--}}
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="{{ url('/css/main.css') }}" />
	@stack('css')
</head>
<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar ">
			<div class="sidebar-content js-simplebar " data-simplebar="init">
				<div class="simplebar-wrapper" style="margin-left: 10px;">
					<div class="simplebar-mask">
						<div class="simplebar-offset">
							<div class="simplebar-content-wrapper">
								<div class="simplebar-content" style="padding: 0;">
									<div class="profile-main">
										@if(Auth::id())
											<div class="proile-image">
												<img src="{{ asset('uploads/main/user.jpg') }}" alt="">
											</div>
											<div class="profile-infos">
												<h6>{{Auth::user()->name}}</h6>
												<p>{{Auth::user()->email}}</p>
											</div>
											<div class="profile-buttons">
												<a id="logout" href="{{ route('logout') }}"
												   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
													<i class="fas fa-sign-out-alt">Logut</i>
												</a>
											</div>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
												@csrf
											</form>
										@else
											<div class="proile-image">
												<img src="{{ asset('uploads/main/guestpng.png') }}" alt="">
											</div>

											<div class="profile-infos">
												<h5>Guest User</h5>
												<input type="email" name="email" id="guest-email" placeholder="write your email to signe in">
												<input type="password" name="password" id="guest-password" placeholder="password">
											</div>
											<div class="profile-buttons">
												<a href="/login" id="login">
													<i class="fa fa-sign-in fa-lg" aria-hidden="true">Login</i>
												</a>
											</div>
										@endif
									</div>
									@if(isset($products))
									<nav>
											<h4>Categories</h4>
											<ul>
												@foreach($categories as $category)

													<li>
														<a href="/products/{{$category->id}}"
														   @if(isset($category->parent_id))
														   class="sub"
																@endif
														>
														<span class="label label-success">{{$category->name}}</span>
														</a>
													</li>
												@endforeach

												<li>
													<a href="/products">
														<span class="label label-success"> All Categories</span>
													</a>
												</li>
											</ul>

										</nav>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-extend navbar-light navbar-bg">
				<a class="slidebar-toggle ">
					<i class="fa fa-bars fa-lg .hvr-icon-bounce" aria-hidden="true"></i>
				</a>

				<form action="/products" method="post" class="search-form" pjax-container>
					@csrf
					<div class="input-group input-group-sm ">
							<i class="fas fa-search fa-lg"></i>
							<input type="text" name="search" placeholder=".............">
						<button type="submit" class="btn search-button">Search</button>
					</div>
				</form>
				<div class="card-div">
					<i class="fas fa-people-carry fa-lg"></i>
					<a href="/products/card" class="card"></i>Card View</a>
				</div>

			</nav>
			<main class="content">
				<div class="container-fluid p-0">
					@yield('content')
				</div>
			</main>
		</div>
	</div>

</body>
<script src="{{ asset('/javascript/main.js') }}"></script>
</html>

