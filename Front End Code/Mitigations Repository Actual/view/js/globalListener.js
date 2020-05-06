// Listener for authenticaed login button
$('#logout').on('click', function (evt) {
    evt.stopPropagation(); // prevent event bubbling from any parent elements

    // Make URL for Ajax call
    ajaxURL = '../../controller/php/destroySession.php';
    ajaxFetch(ajaxURL, logoutRedirect());

    console.log("Session destroyed.");

});

function logoutRedirect() {

    window.location.href = '../../index.php';
}
