function closeChip(elementID) {
	tagName = $("#" + elementID).prev().text()
	tagID = elementID.substring(4)

	$("#tagForDeletionName").text(tagName)
	$("#tagToDelete").val(tagID)

	$('#deleteTagModal').modal('open')
}