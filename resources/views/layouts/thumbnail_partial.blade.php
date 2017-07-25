@if($video->platform == "YouTube")

	<div id="{{ $video->url }}"></div>

	<script type="text/javascript">
		
		var ytVidID = "{{ $video->url }}"
		var ytData{{ $video->id }} = document.getElementById("{{ $video->url }}")
		var varApiKey = 'AIzaSyAZxVQVn-TTAtR7jTCnGKP6DkiYIsBzbhQ'

		$.get(
			"https://www.googleapis.com/youtube/v3/videos",
			{
				part: 'snippet', 
				id: ytVidID, 
				key: varApiKey
			},
			function(data){
				ytData{{ $video->id }}.innerHTML = '<img src="' + data.items[0].snippet.thumbnails.medium.url + '" class="responsive-img">'
			}
		)
		
	</script>

@elseif($video->platform == "Vimeo")

	<div id="{{ $video->url }}"></div>

	<script type="text/javascript">
		
		var vimeoVidID = "{{ $video->url }}"
		var vimeoData{{ $video->id }} = document.getElementById("{{ $video->url }}")
		var url = 'https://vimeo.com/' + vimeoVidID

		$.get(
			"https://vimeo.com/api/oembed.json",
			{
				url: url,
			},
			function(data){
				vimeoData{{ $video->id }}.innerHTML = '<img src="' + data.thumbnail_url + '" class="responsive-img">'
			}
		)
		
	</script>

@else
	Video format unsupported :(
@endif