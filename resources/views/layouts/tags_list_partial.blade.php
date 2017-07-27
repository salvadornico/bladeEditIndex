@foreach($tags as $tag)
	<div class="chip">
		<a href="{{ url("/tags/$tag->id") }}">{{ $tag->tag }}</a>

		@if(Auth::user())
			@if(Auth::user()->role == "admin" || Auth::user()->role == "moderator")
				<i class="close material-icons" id="tag-{{ $tag->id }}" onclick="closeChip(this.id)">close</i>
			@endif
		@endif
	</div>
@endforeach

<div id="deleteTagModal" class="modal bottom-sheet">
	<div class="modal-content black-text">
  		<h4>Are you sure you want to delete this tag?</h4>
  		<p id="tagForDeletionName"></p>
	</div>
	<div class="modal-footer">
  		<form method="POST" action='{{ url("/deleteTag") }}' id="deleteTagForm">
  			{{ csrf_field() }}
  			<input id="tagToDelete" name="tagToDelete" type="hidden"></input>
  			<button class="btn waves-effect waves-light red darken-4">Yes, delete it</button>
  		</form>
  		<button class="modal-action modal-close waves-effect waves-green btn-flat">
  			Cancel
  		</button>
	</div>
</div>