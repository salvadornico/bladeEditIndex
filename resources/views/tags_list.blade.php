@extends("layouts.template")

@section("main_content")

	<div class="container">
		
		<div class="row">			
			<h1>Browse Tags</h1>
		</div>

		<div class="row">
			
			@include("layouts.tags_list_partial")

		</div> {{-- /row --}}

		{{ $tags->links() }}
		
	</div> {{-- /container --}}

@endsection