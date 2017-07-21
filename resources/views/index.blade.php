@extends("layouts.template")

@section("title")
	{{ $title }}
@endsection

@section("main_content")

	<div class="container">
		
		Test

		@include("test_partial", ['some' => 'data'])

		<div class="fixed-action-btn hide-on-large-only">
			<a class="btn-floating btn-large waves-effect waves-light amber accent-3">
				<i class="material-icons">add</i>
			</a>
		</div>
		
	</div>

@endsection