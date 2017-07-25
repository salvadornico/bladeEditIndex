@extends("layouts.template")

@section("main_content")

	<div class="container">

		<div class="row section">

			<div class="col s12 l9">

				@include("layouts.player_partial")

				<p>
					{{ $video->description }}
				</p>

			</div>

			<div class="col s12 l3">
				
				<div class="card grey darken-1">
            		<div class="card-content white-text">

              			<span class="card-title">{{ $video->title }}</span>

	            		<div class="section">
	              			<span class="highlight">Original owner:</span>
	              			<br>
	              			<span id="owner"></span>
	              			<br><br>
	              			<span class="highlight">Shared by:</span>
	              			<br>
	              			<span>{{ $video->owner()->first()->name }}</span>
	              			<br><br>

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

							</script>

							<span class="highlight">Tags:</span>
							<br>
			
							@include("layouts.tags_list_partial")

						</div>

						<div class="section">
							
							<form method="POST" autocomplete="off">
								<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
								<div class="input-field inline">
									<input id="tagInput" name="tagInput" type="text" class="autocomplete" required>
									<label for="tagInput">Tag this article</label>
								</div>
							</form>

						</div>

						<button class="btn blue accent-3" id="tagBtn">
						<i class="material-icons">label</i>
						</button>

						<script type="text/javascript">
							$("#tagBtn").click(function() {
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
									},
									error: function(response, data) {
					    				console.log("Error found!")
					    				console.log(response)
					    				console.log(data)
									},
								})
							})

							$(document).ready(function() {

								$('input.autocomplete').autocomplete({
									data: {
										@foreach($all_tags as $tag)
											"{{ $tag->tag }}": null,
										@endforeach
									},
									limit: 20,
									minLength: 1,
								})

							})
						</script>

            		</div>
          		</div>

			</div>
			
		</div>	
	  				
	</div>

@endsection