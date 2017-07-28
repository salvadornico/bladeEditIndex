function populateModal(element) {
	parentID = $(element).parent().attr("id")

	var title = "#title-" + parentID

	$("#titleForDeletion").text($(title).text())
	$("#videoToDelete").val(parentID)
}