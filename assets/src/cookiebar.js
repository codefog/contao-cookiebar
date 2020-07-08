document.addEventListener('DOMContentLoaded', function () {
    var cookiebar = document.querySelector('[data-cookiebar]');

    // Return if the cookiebar element does not exist
    if (!cookiebar) {
        return;
    }

    var cookieName = cookiebar.dataset.cookiebar;

    if (window.localStorage.getItem(cookieName) && window.localStorage.getItem(cookieName) > Math.round(Date.now() / 1000)) {
        return;
    }

    var cookies = document.cookie ? document.cookie.split('; ') : [];

    // Return if the cookie is still valid (backwards compatibility)
    for (var i = 0; i < cookies.length; i++) {
        if (cookies[i] === cookieName + '=1') {
            return;
        }
    }

    var bodyCssClass = 'cookiebar-active';
    var cookiebarCssClass = 'cookiebar--active';

    // Add the active CSS class
    cookiebar.classList.add(cookiebarCssClass);

    // Add the body CSS class
    document.body.classList.add(bodyCssClass);

    // Power up the accept buttons
    Array.prototype.slice.call(cookiebar.querySelectorAll('[data-cookiebar-accept]')).forEach(function (acceptButton) {
        acceptButton.addEventListener('click', function (e) {
            e.preventDefault();

            var date = new Date();
            var ttl = cookiebar.dataset.cookiebarTtl ? parseInt(cookiebar.dataset.cookiebarTtl, 10) : 365;

            // Store in local storage
            date.setDate(date.getDate() + ttl);
            window.localStorage.setItem(cookieName, Math.round(date.getTime() / 1000));

            // Remove the active CSS class
            cookiebar.classList.remove(cookiebarCssClass);

            // Remove the body CSS class
            document.body.classList.remove(bodyCssClass);
        });
    });

    var analyticsBox = cookiebar.querySelector('[data-cookiebar-analytics]');

    // Power up the analytics box if exists
    if (analyticsBox) {
        var analyticsKey = 'COOKIEBAR_ANALYTICS';

        // Check the box if the box was checked
        if (localStorage.getItem(analyticsKey)) {
            analyticsBox.checked = true;
        }

        // Set the correct value if box is already checked (#72)
        if (analyticsBox.checked) {
            localStorage.setItem(analyticsKey, 1);
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
