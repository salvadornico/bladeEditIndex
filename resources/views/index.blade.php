@extends("layouts.template")

@section("main_content")

	<div class="container">
		
		<div class="row section">
			
			<div class="col s12 m8">
				<h1>Yo</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>

			<div class="col m4 hide-on-small-only">

				<h4>Random video</h4>
				@include("layouts.player_partial")

			</div>

		</div> {{-- /top row --}}

		<div class="row section">

			<h3>Recently added</h3>

			@foreach($recent_videos as $video)
				<a href="{{ url("/videos/$video->id") }}">
					<div class="col s12 m6 l3">
						@include("layouts.thumbnail_partial")
					</div>
				</a>
			@endforeach

		</div>

		<div class="row">

			<h3>Search by Tag</h3>

			@include("layouts.tags_list_partial")

		</div>
		
	</div> {{-- /container --}}

	<div class="fixed-action-btn hide-on-large-only">
		<a href="{{ url("/addVideo") }}" class="btn-floating btn-large waves-effect waves-light amber accent-3">
			<i class="material-icons">add</i>
		</a>
	</div>

@endsection