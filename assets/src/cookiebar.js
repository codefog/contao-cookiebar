document.addEventListener('DOMContentLoaded', function() {
    var cookiebar = document.querySelector('[data-cookiebar]');

    // Return if the cookiebar element does not exist
    if (!cookiebar) {
    	return;
	}

	var cookieName = cookiebar.dataset.cookiebar;

    // Return if the cookie is still valid
    if (document.cookie.indexOf(cookieName) !== -1) {
    	return;
	}

	var cssClass = 'cookiebar--active';

	// Add the active CSS class
	cookiebar.classList.add(cssClass);

	var acceptButton = cookiebar.querySelector('[data-cookiebar-accept]');

	// Power up the accept button if exists
	if (acceptButton) {
        acceptButton.addEventListener('click', function (e) {
			e.preventDefault();
			var date = new Date();
			date.setDate(date.getDate() + 365);
			document.cookie = cookieName + "=1; expires=" + date.toUTCString() + ';' + 'path=/';
			cookiebar.classList.remove(cssClass);
		});
	}
});
