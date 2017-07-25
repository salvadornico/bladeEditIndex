@extends("layouts.template")

@section("title")
	{{ $title }}
@endsection

@section("main_content")

	<div class="container">
		
		<div class="row">			
			<h1>Browse Videos</h1>
		</div>

		<div class="row">
			
			@foreach($all_videos as $video)

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

	<div class="fixed-action-btn hide-on-large-only">
		<a class="btn-floating btn-large waves-effect waves-light amber accent-3">
			<i class="material-icons">add</i>
		</a>
	</div>

@endsection