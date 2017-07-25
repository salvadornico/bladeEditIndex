@extends("layouts.template")

@section("main_content")

	<div class="container">
		
		<div class="row">			
			<h3>Videos tagged: {{ $tag->tag }}</h3>
		</div>

		<div class="row">
			
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

		</div>
		
	</div>

@endsection