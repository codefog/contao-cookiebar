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

    var bodyCssClass = 'cookiebar-active';
    var cookiebarCssClass = 'cookiebar--active';

    // Add the active CSS class
    cookiebar.classList.add(cookiebarCssClass);

    // Add the body CSS class
    document.body.classList.add(bodyCssClass);

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
            cookiebar.classList.remove(cookiebarCssClass);

            // Remove the body CSS class
            document.body.classList.remove(bodyCssClass);
        });
    }

    var analyticsBox = cookiebar.querySelector('[data-cookiebar-analytics]');

    // Power up the analytics box if exists
    if (analyticsBox) {
        var analyticsKey = 'COOKIEBAR_ANALYTICS';

        // Check the box if the box was checked
        if (localStorage.getItem(analyticsKey)) {
            analyticsBox.checked = true;
        }

        analyticsBox.addEventListener('change', function (e) {
            e.preventDefault();

            if (this.checked) {
                localStorage.setItem(analyticsKey, 1);
            } else {
                localStorage.removeItem(analyticsKey);
            }
        });
    }
});
