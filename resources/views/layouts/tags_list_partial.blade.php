@foreach($tags as $tag)
	<a href="{{ url("/tags/$tag->id") }}">
		<div class="chip">
			{{ $tag->tag }}
		</div>
	</a>
@endforeach