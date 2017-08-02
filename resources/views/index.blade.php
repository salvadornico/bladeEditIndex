@extends("layouts.template")

@section("main_content")

	<div class="container">
		
		<div class="row section" id="topRow">

			<div id="randomVid">

				<h4 class="hide-on-small-only">Random video</h4>
				@include("layouts.player_partial")

			</div>
			
			<div id="intro">
				<h1>Yo</h1>
				<p>
					This site is for all of us who could never quite find that one edit.
				</p>
				<p>
					Everything on here is entirely dependent on you, the blading community. So please add all your favorite edits and tag them as thoroughly as you can to help others find them in the future. The more you contribute, the more useful this site becomes for everyone!
				</p>
			</div>

			<div id="getStarted">
				<h5 class="center-align">Get started:</h5>
				<a href="{{ url("/addVideo") }}" class="btn waves-effect waves-light amber darken-1">
					Add a video
				</a>

				<p>
					<span class="amber-text text-accent-3">WARNING:</span> This site is currently still under development. Please send your feedback to <a href="mailto:whatsthatedit@gmail.com">whatsthatedit@gmail.com</a> and we'll do our best to squash out bugs as we find them.
				</p>
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
			<a href="{{ url("/videos") }}" class="btn-flat waves-effect waves-light amber-text text-accent-3">Browse all videos</a>
		</div>

		<div class="row">

			<h3>Search by tag</h3>

			@include("layouts.tags_list_partial")

		</div>

		<div class="row">
			<a href="{{ url("/tags") }}" class="btn-flat waves-effect waves-light amber-text text-accent-3">Browse all tags</a>
		</div>
		
	</div> {{-- /container --}}

	<div class="fixed-action-btn hide-on-large-only">
		<a href="{{ url("/addVideo") }}" class="btn-floating btn-large waves-effect waves-light amber accent-3">
			<i class="material-icons">add</i>
		</a>
	</div>

@endsection