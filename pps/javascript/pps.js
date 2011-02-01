function showMenu() {
	var menu = $$('#navigation > div.menu');
	menu[0].removeClassName('closed');

	var img = $('nav-expand');
	img.src = img.src.replace('down', 'up');

	$('expand').onclick = function() {
		hideMenu();
		return false;
	}
}

function hideMenu() {
	var menu = $$('#navigation > div.menu');
	menu[0].addClassName('closed');

	var img = $('nav-expand');
	img.src = img.src.replace('up', 'down');

	$('expand').onclick = function() {
		showMenu();
		return false;
	}
}
