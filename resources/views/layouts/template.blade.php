<!DOCTYPE html>
<html>

	<head>

		<title>{{ $title }} | What's That Edit?</title>
		<link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" />

		<!-- Google Fonts-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Muli:800i" rel="stylesheet">

		<!-- Materialize CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">

		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">

		<!-- jQuery -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

		<!-- Materialize JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta charset="UTF-8">

	</head>

	<body class="grey darken-3 white-text">

		@include("layouts.analyticstracking")

		<nav class="nav-extended grey darken-4">

			<div class="nav-wrapper">

				<a href="/" class="brand-logo">
					What's That Edit?
				</a>

				<form method="POST" action='{{ url("/search") }}' class="right hide-on-med-and-down">
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        			<div class="input-field">
          				<input id="search" type="search" name="search" required>
          				<label class="label-icon" for="search"><i class="material-icons">search</i></label>
          				<i class="material-icons">close</i>
        			</div>
      			</form>

			</div>

			<div class="nav-content">
				<ul class="tabs tabs-transparent">

        			<li class="tab waves-effect waves-light">
        				<a href="{{ url("/") }}" target="_self">
        					<span class="hide-on-small-only">Home</span>
        					<i class="material-icons show-on-small">home</i>
        				</a>
        			</li>
        			<li class="tab waves-effect waves-light">
        				<a href="{{ url("/videos") }}" target="_self">
        					<span class="hide-on-small-only">Videos</span>
        					<i class="material-icons show-on-small">video_library</i>
        				</a>
        			</li>
        			
					@if(Auth::user())

	        			<li class="tab waves-effect waves-light"><a href="{{ url("/dashboard") }}" target="_self">
	        				<span class="hide-on-small-only">Dashboard</span>
	        				<i class="material-icons show-on-small">dashboard</i>
	        			</a></li>

						<li class="tab waves-effect waves-light">
							<a href="{{ route('logout') }}"
								onclick="event.preventDefault();
							 		document.getElementById('logout-form').submit();" target="_self">
								<span class="hide-on-small-only">Logout</span>
								<i class="material-icons show-on-small">exit_to_app</i>
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>

						{{-- @if(Auth::user()->role == "admin")
							<li class="tab waves-effect waves-light"><a href="{{ url("/admin") }}" target="_self">
								<span class="hide-on-small-only">Admin</span>
								<i class="material-icons show-on-small">supervisor_account</i>
							</a></li>
						@endif --}}

					@else

						<li class="tab waves-effect waves-light">
							<a href="{{ url("/login")}}" target="_self">
								<span class="hide-on-small-only">Login</span>
								<i class="material-icons show-on-small">assignment_ind</i>
							</a>
						</li>
						<li class="tab waves-effect waves-light">
							<a href="{{ url("/register")}}" target="_self">
								<span class="hide-on-small-only">Register</span>
								<i class="material-icons show-on-small">person_add</i>
							</a>
						</li>

					@endif

      			</ul>

      			@if(Auth::user())
	      			<a href="{{ url("/addVideo") }}" class="btn-floating btn-large halfway-fab waves-effect waves-light amber accent-3 hide-on-med-and-down tooltipped" data-position="left" data-delay="50" data-tooltip="Add a video">
	        			<i class="material-icons">add</i>
	      			</a>
	      		@endif

    		</div> {{-- /nav-content --}}

		</nav>

		<main>

			
			@yield("main_content")


		</main>

		<footer class="page-footer grey darken-4 white-text">
			<div class="container">
	        	<div class="row">

	            	<div class="col l6 s12">
	                	<h5 class="white-text">What's That Edit?</h5>
	                	<p class="grey-text text-lighten-4">
	                		Helping you find that edit with that guy at that spot.
	                		<br><br>
	                		Any issues? Send us a message <a href="mailto:whatsthatedit@gmail.com">here</a>!
	                		<br>
	                		Made in the Philippines with love and Laravel.
	                	</p>
	              	</div>

	              	<div class="col l4 offset-l2 s12">

		                <h5 class="white-text">Sections</h5>

		                <ul>
		                	<li>
		        				<a href="{{ url("/") }}" target="_self" class="grey-text text-lighten-4">Home</a>
		        			</li>
		        			<li>
		        				<a href="{{ url("/videos") }}" target="_self" class="grey-text text-lighten-4">Videos</a>
		        			</li>
		        			
							@if(Auth::user())

			        			<li><a href="{{ url("/dashboard") }}" target="_self" class="grey-text text-lighten-4">Dashboard</a></li>

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

								{{-- @if(Auth::user()->role == "admin")
									<li><a href="{{ url("/admin") }}" target="_self" class="grey-text text-lighten-4">Admin</a></li>
								@endif --}}

							@else

								<li>
									<a href="{{ url("/login")}}" target="_self" class="grey-text text-lighten-4">Login</a>
								</li>
								<li>
									<a href="{{ url("/register")}}" target="_self" class="grey-text text-lighten-4">Register</a>
								</li>

							@endif
		                </ul>

	              	</div> {{-- /section links --}}

	            </div> {{-- /row --}}
	        </div> {{-- /container --}}

	        <div class="footer-copyright">
	        	<div class="container center-align">
	            	{{--  &copy; 2017 What's That Edit. All content is property of their respective owners.  --}}
	            </div>
	        </div>

		</footer>

		<script src="{{ asset('js/all.js') }}"></script>
		
		@if(Session::has("message"))
			<script type="text/javascript">
				Materialize.toast('{{ Session::get("message") }}', 3000)
			</script>
		@endif

	</body>
</html>