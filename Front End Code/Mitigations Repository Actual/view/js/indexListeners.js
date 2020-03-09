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

       /* ajaxURL = 'controller/php/search.php';*/

        /*$.post(ajaxURL, $('#searchField').serialize(),processSearch);*/


})
}