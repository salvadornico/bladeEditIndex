@foreach($tags as $tag)
	<div class="chip">
		<a href="{{ url("/tags/$tag->id") }}">
			{{ $tag->tag }}
		</a>

		@if(Auth::user() && Auth::user()->role == ("Admin" || "Moderator"))
			<i class="close material-icons">close</i>
		@endif
	</div>
@endforeach

<script type="text/javascript">
	$("i.close").click(function() {
		alert("Oi")
		location.reload()
	})
</script>