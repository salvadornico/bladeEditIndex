@extends("layouts.template")

@section("main_content")

	<div class="container">
		
		<div class="row">			
			<h1>Browse Videos</h1>
		</div>

		<div class="row">
			
			@include("layouts.video_card_partial")

		</div> {{-- /row --}}

		{{ $videos->links() }}
		
	</div> {{-- /container --}}

	<div class="fixed-action-btn hide-on-large-only">
		<a href="{{ url("/addVideo") }}" class="btn-floating btn-large waves-effect waves-light amber accent-3">
			<i class="material-icons">add</i>
		</a>
	</div>

@endsection