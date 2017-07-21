<!DOCTYPE html>
<html>

	<head>

		<title>@yield("title")</title>

		<!-- Google Fonts-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!-- Font Awesome -->
		<script src="https://use.fontawesome.com/8a3d0f859b.js"></script>

		<!-- Materialize CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">

		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

		<!-- jQuery -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

		<!-- Materialize JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta charset="UTF-8">

	</head>

	<body class="grey darken-3 white-text">

		<nav class="nav-extended grey darken-4">

			<div class="nav-wrapper">
				<a href="/" class="brand-logo">
					@yield("title")
				</a>
			</div>

			<div class="nav-content">
				<ul class="tabs tabs-transparent">

        			<li class="tab waves-effect waves-light">
        				<a href="#" target="_self">Home</a>
        			</li>
        			<li class="tab waves-effect waves-light">
        				<a href="#" target="_self">Videos</a>
        			</li>
        			
					@if(Auth::user())

	        			<li class="tab waves-effect waves-light"><a href="#" target="_self">Dashboard</a></li>

						<li class="tab waves-effect waves-light">
							<a href="{{ route('logout') }}"
								onclick="event.preventDefault();
							 		document.getElementById('logout-form').submit();" target="_self">
								Logout
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>

						@if(Auth::user()->role == "admin")
							<li class="tab waves-effect waves-light"><a href="#" target="_self">Admin</a></li>
						@endif

					@else

						<li class="tab waves-effect waves-light">
							<a href="{{ url("/login")}}" target="_self">Login</a>
						</li>
						<li class="tab waves-effect waves-light">
							<a href="{{ url("/register")}}" target="_self">Register</a>
						</li>

					@endif

      			</ul>

      			<a class="btn-floating btn-large halfway-fab waves-effect waves-light amber accent-3 hide-on-med-and-down">
        			<i class="material-icons">add</i>
      			</a>

    		</div>

		</nav>

		<main>
		

			
			@yield("main_content")



		</main>

		<footer class="page-footer grey darken-4 white-text">
			<div class="container">
	        	<div class="row">

	            	<div class="col l6 s12">
	                	<h5 class="white-text">@yield("title")</h5>
	                	<p class="grey-text text-lighten-4">
	                		Helping you find that edit with that guy at that spot.
	                		<br><br>
	                		Made in the Philippines with love and Laravel.
	                		<br><br>
	                	</p>
	              	</div>

	              	<div class="col l4 offset-l2 s12">

		                <h5 class="white-text">Sections</h5>

		                <ul>
		                	<li>
		        				<a href="#" target="_self" class="grey-text text-lighten-4">Home</a>
		        			</li>
		        			<li>
		        				<a href="#" target="_self" class="grey-text text-lighten-4">Videos</a>
		        			</li>
		        			
							@if(Auth::user())

			        			<li><a href="#" target="_self" class="grey-text text-lighten-4">Dashboard</a></li>

								<li>
									<a href="{{ route('logout') }}"
										onclick="event.preventDefault();
									 		document.getElementById('logout-form').submit();" target="_self" class="grey-text text-lighten-4">
										Logout
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>

								@if(Auth::user()->role == "admin")
									<li><a href="#" target="_self" class="grey-text text-lighten-4">Admin</a></li>
								@endif

							@else

								<li>
									<a href="{{ url("/login")}}" target="_self" class="grey-text text-lighten-4">Login</a>
								</li>
								<li>
									<a href="{{ url("/register")}}" target="_self" class="grey-text text-lighten-4">Register</a>
								</li>

							@endif
		                </ul>

	              	</div>

	            </div>
	        </div>
	        <div class="footer-copyright">
	        	<div class="container center-align">
	            	&copy; 2017 @yield("title"). All content is property of their respective owners.
	            </div>
	        </div>
		</footer>

	</body>
</html>