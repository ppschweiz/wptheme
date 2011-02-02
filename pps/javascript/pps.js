function showMenu() {
	$$('ul.children').each(function(child) {
		child.show();
	});
	$$('ul.sub-menu').each(function(child) {
		child.show();
	});

	var img = $('nav-expand');
	img.src = img.src.replace('down', 'up');

	$('expand').onclick = function() {
		hideMenu();
		return false;
	}
}

function hideMenu() {
	$$('ul.children').each(function(child) {
		child.hide();
	});
	$$('ul.sub-menu').each(function(child) {
		child.hide();
	});

	var img = $('nav-expand');
	img.src = img.src.replace('up', 'down');

	$('expand').onclick = function() {
		showMenu();
		return false;
	}
}
