document.addEventListener('DOMContentLoaded', function () {
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
            var ttl = cookiebar.dataset.cookiebarTtl ? parseInt(cookiebar.dataset.cookiebarTtl, 10) : 365;

            // Set the cookie
            date.setDate(date.getDate() + ttl);
            document.cookie = cookieName + "=1; expires=" + date.toUTCString() + ';' + 'path=/';

            // Remove the active CSS class
            cookiebar.classList.remove(cssClass);
        });
    }
});
