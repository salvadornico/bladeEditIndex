@extends("layouts.template")

@section("main_content")

<h2> Youtube - {{ $ytVidID }}</h2>

<div id="ytData">Data goes here</div>

<script type="text/javascript">
	
	var ytVidID = "{{ $ytVidID }}"
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
			ytData.innerHTML = data.items[0].snippet.title + "<br>"
			ytData.innerHTML += "<p>" + data.items[0].snippet.description + "</p><br>"
			ytData.innerHTML += 'https://www.youtube.com/watch?v=' + ytVidID + "<br>"
			ytData.innerHTML += data.items[0].snippet.channelTitle + "<br>"
			ytData.innerHTML += 'https://www.youtube.com/channel/' + data.items[0].snippet.channelId + "<br>"
			ytData.innerHTML += '<img src="' + data.items[0].snippet.thumbnails.default.url + '"><br>'
			ytData.innerHTML += '<img src="' + data.items[0].snippet.thumbnails.medium.url + '"><br>'
			ytData.innerHTML += '<img src="' + data.items[0].snippet.thumbnails.high.url + '"><br>'
		}
	)
	
</script>

<!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
<div id="player"></div>

<script>
	// 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          	height: '390',
          	width: '640',
          	videoId: ytVidID,
          	events: {
            	'onReady': onPlayerReady,
            	'onStateChange': onPlayerStateChange
          	}
        });
    }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        // event.target.playVideo(); //don't autoplay
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
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

<h2> Vimeo - {{ $vimeoVidID }}</h2>

<div id="vimeoData">Data goes here</div>

<script type="text/javascript">
	
	var vimeoVidID = "{{ $vimeoVidID }}"
	var vimeoData = document.getElementById("vimeoData")
	var url = 'https://vimeo.com/' + vimeoVidID

	$.get(
		"http://vimeo.com/api/oembed.json",
		{
			url: url,
		},
		function(data){
			vimeoData.innerHTML = data.title + "<br>"
			vimeoData.innerHTML += "<p>" + data.description + "</p><br>"
			vimeoData.innerHTML += url + "<br>"
			vimeoData.innerHTML += data.author_name + "<br>"
			vimeoData.innerHTML += data.author_url + "<br>"
			vimeoData.innerHTML += '<img src="' + data.thumbnail_url + '"><br>'
			vimeoData.innerHTML += data.html + "<br>"
		}
	)
	
</script>

<div id="embed">Loading video...</div>

<script>
    // This is the URL of the video you want to load
    var videoUrl = url;
    // This is the oEmbed endpoint for Vimeo (we're using JSON)
    // (Vimeo also supports oEmbed discovery. See the PHP example.)
    var endpoint = 'http://www.vimeo.com/api/oembed.json';
    // Tell Vimeo what function to call
    var callback = 'embedVideo';
    // Put together the URL
    var url = endpoint + '?url=' + encodeURIComponent(videoUrl) + '&callback=' + callback + '&width=640';
    // This function puts the video on the page
    function embedVideo(video) {
        document.getElementById('embed').innerHTML = unescape(video.html);
    }
    // This function loads the data from Vimeo
    function init() {
        var js = document.createElement('script');
        js.setAttribute('type', 'text/javascript');
        js.setAttribute('src', url);
        document.getElementsByTagName('head').item(0).appendChild(js);
    }
    // Call our init function when the page loads
    window.onload = init;
</script>

@endsection