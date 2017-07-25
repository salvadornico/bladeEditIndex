<div class="video-container">

	@if($video->platform == "YouTube")

		<div id="player"></div>

	<script>

		var tag = document.createElement('script');

		tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

		var player;
		function onYouTubeIframeAPIReady() {
			player = new YT.Player('player', {
				videoId: "{{ $video->url }}",
			});
		}

	</script>

	@elseif($video->platform == "Vimeo")

		<div id="random_vid"></div>

		<script type="text/javascript">

			var randomBox = document.getElementById("random_vid")
			var url = 'https://vimeo.com/' + "{{ $video->url }}"

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