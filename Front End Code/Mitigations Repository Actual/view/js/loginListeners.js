/* Login form listeners */

console.log('loginListeners.js loaded.');
addListeners();

/************************************
 *    Listeners                     *
 ************************************/

function addListeners() {

    // Listener for authenticaed login button
    $('#submitLogin').on('click', function(evt) {
        evt.stopPropagation(); // prevent event bubbling from any parent elements

        // Make URL for Ajax call
        ajaxURL = 'controller/php/login.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        $.post(ajaxURL, $('#loginForm').serialize(), processLogin);
        console.log('AJAX call submitted.');
    });

    // Listener for authenticaed login button
    $('#logout').on('click', function(evt) {
        evt.stopPropagation(); // prevent event bubbling from any parent elements

        // Make URL for Ajax call
        ajaxURL = 'controller/php/destroySession.php';
        console.log("Session destroyed.");
    });

}

/************************************
 *   Call back functions
 ************************************/

function processLogin(loginData) {
    // The returned loginData will be whatever the php echoes

    // Parse the AJAX return and look for certain strings
    if (loginData.toLowerCase().indexOf("error") != -1) {
        $('#errorMessage').html(loginData);
    }
    else if (loginData.toLowerCase().indexOf("success") != -1) {
        $('#successMessage').html(loginData);  // visible for split second
    }
}
