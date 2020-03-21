/* Index page listeners */

console.log('indexListeners.js loaded.');
addListeners();

/**************************************
 *          Listeners                 *
 **************************************/

function addListeners()
{
    //Listener for going to the search page
    $('#searchField').on('submit', function(evt) {
        evt.stopPropagation();

       ajaxURL = 'controller/php/search.php';

       $.post(ajaxURL, $('#searchField').serialize(),processSearch);


});

    $('newMitigation').on('click', function(evt) {
        evt.stopPropagation();

        // Make URL for Ajax call
        ajaxURL = 'controller/php/login.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        $.post(ajaxURL, $('#loginForm').serialize(), processLogin);
        console.log('AJAX call submitted.');
    });
}

