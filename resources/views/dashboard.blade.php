@extends("layouts.template")

@section("main_content")

	<div class="container">

		<h2>Dashboard</h2>

		<div class="row section">
			
			<h4>My shared videos</h4>

			@foreach($videos as $video)

				<div class="col s6 m4 l3">

					<a href="{{ url("videos/$video->id") }}">
						<div class="card small white">
	    					<div class="card-image waves-effect waves-block waves-light">
								@include("layouts.thumbnail_partial")
	    					</div>
	    					<div class="card-content">
		      					<span class="card-title grey-text text-darken-4" id="{{ "title-" . $video->id }}">
									{{ $video->title }}
		      					</span>
		    				</div>
	  				</a>
		    				<div class="card-action" id="{{ $video->id }}" >
              					<a href="{{ url("/videos/$video->id/edit") }}">
              						<i class="material-icons blue-text text-darken-4">edit</i>
              					</a>
              					<a href="#deleteModal" class="modal-trigger" onclick="populateModal(this)">
              						<i class="material-icons red-text text-darken-4">delete</i>
              					</a>
            				</div>
	  					</div>

				</div>

			@endforeach

		</div>

	</div>

	<div id="deleteModal" class="modal bottom-sheet">
    	<div class="modal-content black-text">
      		<h4>Are you sure you want to delete this video?</h4>
      		<p id="titleForDeletion"></p>
    	</div>
    	<div class="modal-footer">
      		<form method="POST" action='{{ url("/deleteVideo") }}' id="deleteForm">
      			{{ csrf_field() }}
      			<input id="videoToDelete" name="videoToDelete" type="hidden"></input>
      			<button class="btn waves-effect waves-light red darken-4">Yes, delete it</button>
      		</form>
      		<button class="modal-action modal-close waves-effect waves-green btn-flat">
      			Cancel
      		</button>
    	</div>
  	</div>

@endsection