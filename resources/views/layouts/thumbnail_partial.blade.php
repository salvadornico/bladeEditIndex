@if($video->platform = "YouTube")

	<div id="ytData">Data goes here</div>

	<script type="text/javascript">
		
		var ytVidID = "{{ $video->url }}"
		var ytData = document.getElementById("ytData")
		var varApiKey = 'AIzaSyAZxVQVn-TTAtR7jTCnGKP6DkiYIsBzbhQ'

		$.get(
			"https://www.googleapis.com/youtube/v3/videos",
			{
				part: 'snippet', 
				id: ytVidID, 
				key: varApiKey
			},
			function(data){
				ytData.innerHTML = '<img src="' + data.items[0].snippet.thumbnails.medium.url + '">'
			}
		)
		
	</script>

@elseif($video->platform = "Vimeo")

	<div id="vimeoData">Data goes here</div>

	<script type="text/javascript">
		
		var vimeoVidID = "{{ $video->url }}"
		var vimeoData = document.getElementById("vimeoData")
		var url = 'https://vimeo.com/' + vimeoVidID

		$.get(
			"https://vimeo.com/api/oembed.json",
			{
				url: url,
			},
			function(data){
				vimeoData.innerHTML = '<img src="' + data.thumbnail_url + '">'
			}
		)
		
	</script>

@endif