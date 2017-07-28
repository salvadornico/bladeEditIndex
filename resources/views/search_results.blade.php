@extends("layouts.template")

@section("main_content")

	<div class="container">

		<h3>Search results for: "{{ $query }}"</h3>

		<div class="row section">

			@if($videos->count())
				<h5>Videos</h5>

				@foreach($videos as $video)

					<div class="col s6 m4 l3">

						<a href="{{ url("videos/$video->id") }}">
							<div class="card small white">
		    					<div class="card-image waves-effect waves-block waves-light">
									@include("layouts.thumbnail_partial")
		    					</div>
		    					<div class="card-content">
			      					<span class="card-title grey-text text-darken-4 flow-text">
										{{ $video->title }}
			      					</span>
			    				</div>
		  					</div>
		  				</a>

					</div>

				@endforeach
			@else
				<h5>No videos found</h5>
			@endif

		</div>

		<div class="row section">

			@if($tags->count())

				<h5>Tags</h5>
				@include("layouts.tags_list_partial")

			@else
				<h5>No tags found</h5>
			@endif

		</div>

		<img src="{{ asset("images/search-by-algolia-white.png") }}" alt="Algolia search logo" width="150px" class="right">

	</div>

@endsection