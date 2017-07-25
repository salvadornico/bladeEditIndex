<div class="video-container">

	@if($random_video->platform == "YouTube")

		<div id="player"></div>

	<script>

		var tag = document.createElement('script');

		tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		var player;
		function onYouTubeIframeAPIReady() {
			player = new YT.Player('player', {
				videoId: "{{ $random_video->url }}",
				events: {
					'onReady': onPlayerReady,
					'onStateChange': onPlayerStateChange
				}
			});
		}

		function onPlayerReady(event) {
			// event.target.playVideo(); //don't autoplay
		}

		var done = false;
		function onPlayerStateChange(event) {
			if (event.data == YT.PlayerState.PLAYING && !done) {
				setTimeout(stopVideo, 6000);
				done = true;
			}
		}
		function stopVideo() {
			player.stopVideo();
		}

	</script>

	@elseif($random_video->platform == "Vimeo")

		<div id="random_vid"></div>

		<script type="text/javascript">
			
			var randomID = "{{ $random_video->url }}"
			var randomBox = document.getElementById("random_vid")
			var url = 'https://vimeo.com/' + randomID

			$.get(
				"http://vimeo.com/api/oembed.json",
				{
					url: url,
				},
				function(data){
					randomBox.innerHTML = data.html
				}
			)
			
		</script>

	@else
		Video format unsupported :(
	@endif

</div>