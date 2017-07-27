<!DOCTYPE html>
<html>

	<head>

		<title>{{ $title }} | #Working Title#</title>

		<!-- Google Fonts-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

		<nav class="nav-extended grey darken-4">

			<div class="nav-wrapper">

				<a href="/" class="brand-logo">
					#Working Title#
				</a>

				<form class="right hide-on-med-and-down">
        			<div class="input-field">
          			<input id="search" type="search" required>
          			<label class="label-icon" for="search"><i class="material-icons">search</i></label>
          			<i class="material-icons">close</i>
        			</div>
      			</form>

			</div>

			<div class="nav-content">
				<ul class="tabs tabs-transparent">

					<script type="text/javascript">
						var activePage = "{{ $title }}"
					</script>

        			<li class="tab waves-effect waves-light">
        				<a href="{{ url("/") }}" target="_self">Home</a>
        			</li>
        			<li class="tab waves-effect waves-light">
        				<a href="{{ url("/videos") }}" target="_self">Videos</a>
        			</li>
        			
					@if(Auth::user())

	        			<li class="tab waves-effect waves-light"><a href="{{ url("/dashboard") }}" target="_self">Dashboard</a></li>

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
							<li class="tab waves-effect waves-light"><a href="{{ url("/admin") }}" target="_self">Admin</a></li>
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

      			@if(Auth::user())
	      			<a href="{{ url("/addVideo") }}" class="btn-floating btn-large halfway-fab waves-effect waves-light amber accent-3 hide-on-med-and-down">
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
	                	<h5 class="white-text">#Working Title#</h5>
	                	<p class="grey-text text-lighten-4">
	                		Helping you find that edit with that guy at that spot.
	                		<br><br>
	                		Any issues? Send us a message <a href="mailto:example@example.com">here</a>!
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

								@if(Auth::user()->role == "admin")
									<li><a href="{{ url("/admin") }}" target="_self" class="grey-text text-lighten-4">Admin</a></li>
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

	              	</div> {{-- /section links --}}

	            </div> {{-- /row --}}
	        </div> {{-- /container --}}

	        <div class="footer-copyright">
	        	<div class="container center-align">
	            	&copy; 2017 #Working Title#. All content is property of their respective owners.
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