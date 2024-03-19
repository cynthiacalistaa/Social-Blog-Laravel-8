<header class="header-top bg-grey justify-content-center">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-2 col-md-4 text-center d-none d-lg-block">
				<a class="navbar-brand " href="index.html">
					<img src="{{asset('images/logo.png')}}" alt="" class="img-fluid">
				</a>
			</div>

			<div class="col-lg-8 col-md-12">
				<nav class="navbar navbar-expand-lg navigation-2 navigation">
					<a class="navbar-brand text-uppercase d-lg-none" href="#">
						<img src="{{asset('images/logo.png')}}" alt="" class="img-fluid">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
						aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="ti-menu"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbar-collapse">
						<ul id="menu" class="menu navbar-nav mx-auto">
							<li class="nav-item"><a href="{{ route('welcome') }}" class="nav-link">Home</a></li>
							<li class="nav-item"><a href="{{ route('post.create') }}" class="nav-link">Post Blog</a></li>
							<li class="nav-item"><a href="{{ route('profile.show') }}" class="nav-link">My Blog</a></li>
							<li class="nav-item"><a href="{{ route('comment.index') }}" class="nav-link">Comment</a></li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Profile
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
									<a class="dropdown-item" href="{{ route('profile.edit') }}">Profile Update</a>
									<div class="dropdown-divider"></div>
									<form method="POST" action="{{ route('logout') }}">
										@csrf
										<button type="submit" class="dropdown-item">Logout</button>
									</form>
								</div>
							</li>							
						</ul>

						<ul class="list-inline mb-0 d-block d-lg-none">
							<li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="ti-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="ti-pinterest"></i></a></li>
						</ul>
					</div>
				</nav>
			</div>

			<div class="col-lg-2 col-md-4 col-6">
				<div class="header-socials-2 text-right d-none d-lg-block">
					<ul class="list-inline mb-0">
						<li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="ti-twitter"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="ti-pinterest"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>