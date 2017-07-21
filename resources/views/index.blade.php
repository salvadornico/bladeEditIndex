@extends("layouts.template")

@section("title")
	{{ $title }}
@endsection

@section("main_content")

	Test

	@include("test_partial")

	<div class="fixed-action-btn hide-on-large-only">
		<a class="btn-floating btn-large waves-effect waves-light amber accent-3">
			<i class="material-icons">add</i>
		</a>
	</div>

@endsection