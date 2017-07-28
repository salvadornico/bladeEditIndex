@extends("layouts.template")

@section("main_content")

	<div class="container">

		<h3>Edit this video</h3>

		<div class="row" id="resultMessage">
			@include("layouts.thumbnail_partial")					 
		</div>

		<form method="POST" id="editVideoForm" class="section">
			<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

			<div class="row">
				<div class="input-field col s12">
					<input id="title" name="title" type="text" value="{{ $video->title }}" class="validate" required>
					<label for="title">Video Title</label>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s12">
					<textarea id="description" name="description" class="materialize-textarea" required>{{ $video->description }}</textarea>
					<label for="description">Description</label>
				</div>
			</div>

			<button class="btn waves-effect waves-light amber darken-1" type="submit" name="submit">
				<i class="material-icons right">save</i>
				Save
			</button>
			
		</form>

	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#description').trigger('autoresize')
		})
	</script>

@endsection