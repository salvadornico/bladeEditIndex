$(document).ready(function() {
	$('ul.tabs').tabs()
	tabs = $('li.tab')
	tabLinks = $('li.tab > a')

	for (var i = 0; i < tabLinks.length; i++) {
		if (tabLinks[i].textContent.trim() == activePage) {
			tabLinks[i].className = "active"
			tabs[i].className += " active"
		} else {
			tabLinks[i].className = ""
		}
	}
})