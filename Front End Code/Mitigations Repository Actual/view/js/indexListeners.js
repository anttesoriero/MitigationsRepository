/* Index page listeners */

console.log('indexListeners.js loaded.');
var regex = /[!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~]/g;

addListeners();

/**************************************
 *          Listeners                 *
 **************************************/

function addListeners()
{
    //Listener for going to the search page
    $('#searchForm').on('submit', function(evt)
    {
        evt.preventDefault();
        evt.stopPropagation();
        var rawTerm = document.getElementById('searchField').value;
        var searchTerm = rawTerm.replace(regex, '');
        console.log('search');

        // Make URL for Ajax call
      // ajaxURL = 'controller/php/getRandMitigation.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
      // $.post(ajaxURL, $('#searchForm').serialize(),processSearch);
      //  console.log('AJAX call submitted.');
        processSearch(searchTerm);
    });

    $('#newMitigation').on('click', function(evt)
    {
        evt.stopPropagation();
        console.log('CLICK');
        // Make URL for Ajax call
       //ajaxURL = 'controller/php/login.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
      // $.post(ajaxURL, $('#loginForm').serialize(), processLogin);
       // console.log('AJAX call submitted.');
        processLogin();
    });

    $('#mostRecent').on('click', function(evt)
    {
        evt.stopPropagation();
        console.log('CLICK');
        // Make URL for Ajax call
        //ajaxURL = 'controller/php/login.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        // $.post(ajaxURL, $('#loginForm').serialize(), processLogin);
        // console.log('AJAX call submitted.');
        gotoMostRecent();
    });

    $('#random').on('click', function(evt)
    {
        evt.stopPropagation();
        console.log('CLICK');
        // Make URL for Ajax call
        //ajaxURL = 'controller/php/login.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        // $.post(ajaxURL, $('#loginForm').serialize(), processLogin);
        // console.log('AJAX call submitted.');
        gotoRandom();
    });
}

/*******************************************************
 * Call-back Functions
 ******************************************************/

function processLogin()
{
    window.location.href='view/php/create.php';
}

function processSearch(searchTerm)
{

   window.location.href='view/php/search.php?q=' + searchTerm;
}

function gotoMostRecent()
{
    window.location.href='view/php/search.php?q=mostrecent'
}

function gotoRandom()
{
    window.location.href='view/php/search.php?q=random'
}