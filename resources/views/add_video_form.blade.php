@extends("layouts.template")

@section("main_content")

	<div class="container">

		<h2>Add a new video</h2>

		<div class="row" id="rawUrlBox">
			<div class="input-field col s11">
          		<input id="rawUrl" type="text" class="validate">
          		<label for="rawUrl">Paste in your YouTube or Vimeo link</label>
        	</div>
        	<div class="col s1">
        		<button class="btn-large waves-effect waves-light amber accent-2" id="parseUrlBtn">
		        	<i class="material-icons">search</i>       			
        		</button>
        	</div>
		</div>

		<div class="row" id="resultBox">

		</div>

	</div>

	<script type="text/javascript">		
		$(document).ready(function() {
    		
			$("#parseUrlBtn").click(function() {
				var rawUrl = $("#rawUrl").val()
				$("#resultBox").html(parseUrl(rawUrl))
			})
			$("#rawUrl").keypress(function(e) {
				if(e.which == 13) {
					$("#parseUrlBtn").click()
				}
			})

  		})

		youtubeRegex = /^(?:https?:\/\/)?(?:www.)?(?:youtu.be\/|youtube.com\/watch\?v=)(.+$)/
		vimeoRegex = /^(?:https?:\/\/)?(?:www.)?(?:vimeo.com\/)(\d+$)/

		function parseUrl(url) {
			if (youtubeRegex.test(url)) {
				var result = youtubeRegex.exec(url)
			} else if (vimeoRegex.test(url)) {
				var result = vimeoRegex.exec(url)				
			} else {
				return "Invalid URL. Please double-check and try again."
			}
			return result[1]
		}
	</script>

@endsection