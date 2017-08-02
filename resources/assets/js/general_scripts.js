$(document).ready(function() {
	$('ul.tabs').tabs()
	$('.modal').modal()
})

$('input').focus(function() {
	Materialize.updateTextFields()
})