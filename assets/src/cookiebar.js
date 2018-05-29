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

	//add Body-class to top/bottom space (no overlay important website-content) if cookiebar visible
    var bodyEl = document.getElementsByTagName('body')[0];
    var cookiebarBodyClass = 'cb-visible';
	if(bodyEl) bodyEl.classList.add(cookiebarBodyClass);

	var cssClass = 'cookiebar--active';

	// Add the active CSS class
	cookiebar.classList.add(cssClass);

	var acceptButton = cookiebar.querySelector('[data-cookiebar-accept]');

	// Power up the accept button if exists
	if (acceptButton) {
        acceptButton.addEventListener('click', function (e) {
			e.preventDefault();

			var date = new Date();
			var ttl = cookiebar.dataset.cookiebarTtl ? parseInt(cookiebar.dataset.cookiebarTtl, 10) : 365;

			// Set the cookie
			date.setDate(date.getDate() + ttl);
			document.cookie = cookieName + "=1; expires=" + date.toUTCString() + ';' + 'path=/';

			// Remove the active CSS class
			cookiebar.classList.remove(cssClass);
            bodyEl.classList.remove(cookiebarBodyClass);
		});
	}

    var denailButton = cookiebar.querySelector('[data-cookiebar-denail]');

    // Power up the accept button if exists
    if (denailButton) {
        denailButton.addEventListener('click', function (e) {
            e.preventDefault();

            var date = new Date();
            var ttl = cookiebar.dataset.cookiebarTtl ? parseInt(cookiebar.dataset.cookiebarTtl, 10) : 365;

            // Set the cookie
            date.setDate(date.getDate() + ttl);
            document.cookie = cookieName + "=1; expires=" + date.toUTCString() + ';' + 'path=/';

            //Damit es im page-, analytics|piwik-template um den jeweiligen tracking-snipped abgefragt werden kann
			//if (!localStorage.getItem('optout')) {
            //   //beliebigen Tracking Code hier einfügen
            // }
			//Quelle: https://www.christian-penseler.de/opt-out-loesung-fuer-analytics-facebook-tracking-mit-dem-google-tag-manager/
            localStorage.setItem('optout', 'true');

            // Remove the active CSS class
            cookiebar.classList.remove(cssClass);
            bodyEl.classList.remove(cookiebarBodyClass);
        });
    }
});
