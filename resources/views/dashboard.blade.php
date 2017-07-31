@extends("layouts.template")

@section("main_content")

	<div class="container">

		<h2>Dashboard</h2>

		@if(Auth::user() && (Auth::user()->role == "admin" || Auth::user()->role == "moderator"))			
			<div class="row section">

				<h4>Flagged videos</h4>

				<table>
					<thead>
						<th>Video</th>
						<th>Message</th>
						<th>User</th>
						<th class="center-align">Actions</th>
					</thead>

					<tbody>
						@foreach($flags as $flag)

							<tr>
								<td>{{ $flag->video->title }}</td>
								<td>{{ $flag->message }}</td>
								<td>{{ $flag->owner->name }}</td>
								<td class="center-align">
									<form method="POST" action='{{ url("/markFlagRead") }}' class="flag-action">
										{{ csrf_field() }}
										<input type="hidden" name="flag_id" value="{{ $flag->id }}"></input>
										<button type="submit" class="btn-flat">
											<i class="material-icons light-green-text text-accent-3">done</i>
										</button>
									</form>
									<form method="POST" action='{{ url("/markFlagDismissed") }}' class="flag-action">
										{{ csrf_field() }}
										<input type="hidden" name="flag_id" value="{{ $flag->id }}"></input>
										<button type="submit" class="btn-flat">
											<i class="material-icons red-text text-accent-3">clear</i>
										</button>
									</form>
								</td>
							</tr>

						@endforeach							
					</tbody>

				</table>

			</div>
		@endif

		<div class="row section">
			
			<h4>My shared videos</h4>

			@if(Auth::user()->videos->count())
				@include("layouts.video_card_partial")
			@else
				No videos added. <a href="{{ url("/addVideo") }}">Add one to get started!</a>
			@endif

		</div>

	</div>

@endsection