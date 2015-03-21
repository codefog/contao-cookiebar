/**
 * cookiebar extension for Contao Open Source CMS
 *
 * Copyright (C) 2011-2015 Codefog
 *
 * @package cookiebar
 * @author  Codefog <http://codefog.pl>
 * @author  Kamil Kuzminski <kamil.kuzminski@codefog.pl>
 * @license LGPL
 */

var setCookieBar = function(name) {
	var cookiebar = document.getElementById('cookiebar');
	var date = new Date();
	date.setDate(date.getDate() + 365);
	document.cookie = name + "=1; expires=" + date.toUTCString();
	cookiebar.parentNode.removeChild(cookiebar);
}
