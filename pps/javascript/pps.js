function setCookie(name, value)
{
	var time = new Date();
	time.setDate(time.getDate() + 365); // days
	document.cookie=name + '=' + escape(value) + ';path=/';
}

function getCookie(name)
{
	var cookies = document.cookie.split('; ');
	var value;

	cookies.each(function(cookie)
	{
		var data = cookie.split('=');

		if (data[0] == name)
		{
			value = data[1];
		}
	});
	return value;
}

function showMenu()
{
	setCookie('hide', 0);
	doShowMenu();
	return false;
}

function doShowMenu()
{
	$$('ul.children').invoke('show');
	$$('ul.sub-menu').invoke('show');

	var img = $('nav-expand');
	img.src = img.src.replace('down', 'up');

	$('expand').onclick = hideMenu;
}

function hideMenu()
{
	setCookie('hide', 1);
	doHideMenu();
	return false;
}

function doHideMenu()
{
	$$('ul.children').invoke('hide');
	$$('ul.sub-menu').invoke('hide');

	var img = $('nav-expand');
	img.src = img.src.replace('up', 'down');

	$('expand').onclick = showMenu;
}

document.observe("dom:loaded", function()
{
	if (getCookie('hide') == '1')
	{
		doHideMenu();
	}
});
