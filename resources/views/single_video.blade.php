@extends("layouts.template")

@section("main_content")

	<div class="container">

		@if($video->hasPendingFlags())
			<div class="row">

        		<div class="col s12">
          			<div class="card orange lighten-3">
            			<div class="card-content black-text">
              				<span class="card-title">This video has been flagged</span>
              				<p>
              					Please go to the dashboard to review.
              				</p>
            			</div>
            			<div class="card-action">
              				<a href="{{ url("/dashboard") }}" class="blue-text">Dashboard</a>
            			</div>
          			</div>
        		</div>

			</div>
		@endif

		<h3>{{ $video->title }}</h3>

		<div class="row section">

			<div class="col s12 l8">

				@include("layouts.player_partial")

			</div>

			<div class="col s12 l4">
				
				<div class="card grey darken-1">
            		<div class="card-content white-text">

	            		<div class="section">

	              			<span class="highlight">Original owner:</span>
	              			<br>
	              			<span id="owner"></span>
	              			<br><br>
	              			<span class="highlight">Shared by:</span>
	              			<br>
	              			<span>{{ $video->owner()->first()->name }}</span>

	              			<script type="text/javascript">

								var ownerField = document.getElementById("owner")

		              			@if($video->platform == "YouTube")
									var ytVidID = "{{ $video->url }}"
									var varApiKey = 'AIzaSyAZxVQVn-TTAtR7jTCnGKP6DkiYIsBzbhQ'

									$.get(
										"https://www.googleapis.com/youtube/v3/videos",
										{
											part: 'snippet', 
											id: ytVidID, 
											key: varApiKey
										},
										function(data){
											ownerField.innerHTML = '<a href="https://www.youtube.com/channel/' + 
												data.items[0].snippet.channelId + '">' + 
												data.items[0].snippet.channelTitle + '</a>'
										}
									)

								@elseif($video->platform == "Vimeo")
									var url = 'https://vimeo.com/' + "{{ $video->url }}"

									$.get(
										"http://vimeo.com/api/oembed.json",
										{
											url: url,
										},
										function(data){
											ownerField.innerHTML = '<a href="' + data.author_url + '">' + 
												data.author_name + '</a>'
										}
									)								

								@endif

							</script> {{-- /video info script --}}

						</div> {{-- /section --}}

						@if(Auth::user())
							<div class="row">
								<button class="btn-flat modal-trigger" id="flagBtn" data-target="flagModal">
									<i class="material-icons">feedback</i>
									Flag this video
								</button>
							</div>
						@endif

            		</div> {{-- /card-content --}}
          		</div> {{-- /card --}}

			</div> {{-- /col --}}
			
		</div> {{-- /row --}}

		<div class="row section">

			<div class="col m12 l8">

				<span class="highlight">Tags:</span>

				<div class="row section" id="tagBox">
					@include("layouts.tags_list_partial")
				</div>

			</div>

			<div class="col m12 l4">
				
				@if(Auth::user())

					<div class="row section">
						
						<form method="POST" autocomplete="off" id="ajaxForm" class="col s9">
							<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
							<div class="input-field inline">
								<input id="tagInput" name="tagInput" type="text" class="autocomplete" required>
								<label for="tagInput">Tag this video</label>
							</div>
						</form>

						<div class="col s3">
							<button class="btn amber darken-1 disabled" id="tagBtn">
								<i class="material-icons">label</i>
							</button>							
						</div>

					</div>

					<script type="text/javascript">

						$(document).ready(function() {

							$('input.autocomplete').autocomplete({
								data: {
									@foreach($all_tags as $tag)
										"{{ $tag->tag }}": null,
									@endforeach
								},
								limit: 5,
								minLength: 1,
							})

							// disables form submission by pressing Enter
							$("#ajaxForm").on("keyup keypress", function(e) {
									var keyCode = e.keyCode || e.which
									if (keyCode === 13) { 
									e.preventDefault()
									return false
									}
							})

							// listeners for Ajax
							$("#tagBtn").click(addTag)
							$("#tagInput").keypress(function(e) {
								if(e.which == 13) {
									$("#tagBtn").click()
								}

								if ($("#_token").val()) {
									$("#tagBtn").removeClass("disabled")
								}
							})

							$('.modal').modal()
							
						})					

						function addTag() {
							var token = $("#_token").val()
							var tagInput = $("#tagInput").val()
							var url = window.location.href+'/addTag'

							$.ajax({
								url: url,
								method: "POST",
								data: {
									_token : token,
									tagInput : tagInput,
								},
								success: function(data) {
									$("#tagBox").html(data)
									$("#tagInput").val("")
								},
								error: function(response, status, error) {
				    				console.log("Error found!")
				    				console.log(response)
				    				console.log(status)
				    				console.log(error)
								},
							})
						}

					</script>

				@endif

			</div>

		</div> {{-- /row --}}

		<div class="row section">							
			<p class="description">{{ $video->description }}</p>
		</div>
	  				
	</div> {{-- /container --}}

	<div id="flagModal" class="modal">
    	<div class="modal-content black-text">

      		<h4>Flag this video</h4>
      		<form method="POST" action='{{ url("/addFlag") }}'>
      			{{ csrf_field() }}
      			<input type="hidden" name="video_id" value="{{ $video->id }}"></input>
      			<div class="input-field col s12">
					<textarea id="message" name="message" class="materialize-textarea" required></textarea>
					<label for="message">Why are you flagging this video?</label>
				</div>
				<button type="submit" class="btn amber accent-3">Submit</button>
      		</form>

    	</div>
	    <div class="modal-footer">
	      	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
	    </div>
  	</div>

@endsection