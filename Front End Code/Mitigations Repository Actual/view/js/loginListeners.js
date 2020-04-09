/* Login form listeners */

console.log('loginListeners.js loaded.');
addListeners();

/************************************
 *    Listeners                     *
 ************************************/

function addListeners() {

    // Listener for authenticaed login button
    $('#submitLogin').on('click', function (evt) {
        evt.stopPropagation(); // prevent event bubbling from any parent elements

        // Make URL for Ajax call
        ajaxURL = '../../controller/php/login.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        $.post(ajaxURL, $('#loginForm').serialize(), processLogin);
        console.log('AJAX call submitted.');
    });

    // Listener for authenticaed login button
    $('#logout').on('click', function (evt) {
        evt.stopPropagation(); // prevent event bubbling from any parent elements

        // Make URL for Ajax call
        ajaxURL = '../../controller/php/destroySession.php';
        ajaxFetch(ajaxURL, logoutRedirect());

        console.log("Session destroyed.");

    });

}

/************************************
 *   Call back functions
 ************************************/

function processLogin(loginData) {
    // The returned loginData will be whatever the php echoes
    console.log("SOMETHING returned");
    console.log(loginData);

    // Parse the AJAX return and look for certain strings
    if (loginData.toLowerCase().indexOf("error") != -1) {
        $('#errorMessage').html(loginData);
    } else {
        //if (loginData.toLowerCase().indexOf("success") != -1) {
        //     $('#successMessage').html(loginData);  // visible for split second
        // }

        if (loginData === '/index.php') {
            window.location.href = '../../index.php';
        } else {
            window.location.href = loginData;
        }

    }

}

function logoutRedirect()
{
    window.location.href = '../../index.php';
}

