/* Index page listeners */

console.log('indexListeners.js loaded.');
addListeners();

/**************************************
 *          Listeners                 *
 **************************************/

function addListeners()
{
    //Listener for going to the search page
    $('#searchForm').on('submit', function(evt) {
        evt.stopPropagation();
        console.log('search');

        // Make URL for Ajax call
       ajaxURL = 'controller/php/getMitigation.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
      // $.post(ajaxURL, $('#searchForm').serialize(),processSearch);
      //  console.log('AJAX call submitted.');
        processSearch();
});

    $('#newMitigation').on('click', function(evt) {
        evt.stopPropagation();
        console.log('CLICK');
        // Make URL for Ajax call
        ajaxURL = 'controller/php/login.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        $.post(ajaxURL, $('#loginForm').serialize(), processLogin);
        console.log('AJAX call submitted.');
        //processLogin();
    });
}

/*******************************************************
 * Call-back Functions
 ******************************************************/

function processLogin(loginData)
{
    window.location.href='view/php/create.php';
}

function processSearch()
{
    window.location.href='view/php/search.php';
}