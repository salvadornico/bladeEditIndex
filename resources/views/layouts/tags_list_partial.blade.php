@foreach($tags as $tag)
	<a href="{{ url("/tag/$tag->id") }}">
		<div class="chip">
			{{ $tag->tag }}
		</div>
	</a>
@endforeach