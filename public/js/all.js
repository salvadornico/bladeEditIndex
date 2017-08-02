$(document).ready(function() {
	$('ul.tabs').tabs()
	$('.modal').modal()
})

$('input').focus(function() {
	Materialize.updateTextFields()
})
function populateModal(element) {
	parentID = $(element).parent().attr("id")

	var title = "#title-" + parentID

	$("#titleForDeletion").text($(title).text())
	$("#videoToDelete").val(parentID)
}
function closeChip(elementID) {
	tagName = $("#" + elementID).prev().text()
	tagID = elementID.substring(4)

	$("#tagForDeletionName").text(tagName)
	$("#tagToDelete").val(tagID)

	$('#deleteTagModal').modal('open')
}
$(document).ready(function() {
    		
	$("#parseUrlBtn").click(function() {
		var rawUrl = $("#rawUrl").val()
		parseUrl(rawUrl)
	})
	$("#rawUrl").keypress(function(e) {
		if(e.which == 13) {
			$("#parseUrlBtn").click()
		}
	})

})

youtubeRegex = /^(?:https?:\/\/)?(?:www.)?(?:youtu.be\/|youtube.com\/watch\?v=)(.+)(?:\?|&)?/
vimeoRegex = /^(?:https?:\/\/)?(?:www.)?(?:vimeo.com\/)(\d+)(?:\?)?/

function parseUrl(url) {
	var result
	$("#resultBox").addClass("scale-in")
	if (youtubeRegex.test(url)) {
		result = youtubeRegex.exec(url)
		processYoutube(result[1])
	} else if (vimeoRegex.test(url)) {
		result = vimeoRegex.exec(url)
		processVimeo(result[1])			
	} else {
		$("#resultMessage").html("Invalid URL. Please double-check and try again.")
	}
}

function processYoutube(vidID) {
	var apiKey = 'AIzaSyAZxVQVn-TTAtR7jTCnGKP6DkiYIsBzbhQ'

	$.ajax({
		url: "https://www.googleapis.com/youtube/v3/videos",
		method: "GET",
		data: {
			part: 'snippet', 
			id: vidID,
			key: apiKey,
		},
		success: function(data){
			$("#resultMessage").html('Is this the correct video?<br><img src="' + 
				data.items[0].snippet.thumbnails.medium.url + '">')

			$("#title").val(data.items[0].snippet.title)
			$("#description").val(data.items[0].snippet.description)
			$("#platform").val("YouTube")
			$("#url").val(vidID)
			Materialize.updateTextFields()
			$('#description').trigger('autoresize')
			$("#addVideoForm").addClass("scale-in")
		},
		error: function(response, status, error) {
			console.log("Error found!")
			console.log(response)
			console.log(status)
			console.log(error)
			$("#resultMessage").html("No video found. Please double check your link.")
		},
	})
}

function processVimeo(vidID) {
	var url = 'https://vimeo.com/' + vidID

	$.ajax({
		url: "http://vimeo.com/api/oembed.json",
		method: "GET",
		data: {
			url: url,
		},
		success: function(data){
			$("#resultMessage").html('Is this the correct video?<br><img src="' + 
				data.thumbnail_url + '">')

			$("#title").val(data.title)
			$("#description").val(data.description)
			$("#platform").val("Vimeo")
			$("#url").val(vidID)
			Materialize.updateTextFields()
			$('#description').trigger('autoresize')
			$("#addVideoForm").addClass("scale-in")
		},
		error: function(response, status, error) {
			console.log("Error found!")
			console.log(response)
			console.log(status)
			console.log(error)
			$("#resultMessage").html("No video found. Please double check your link.")
		},
	})
}