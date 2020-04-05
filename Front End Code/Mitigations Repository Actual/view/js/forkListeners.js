/*forking page listeners  */

console.log('forkListeners.js loaded.');

addListeners();

/*****************************************************
 *                        Listeners                  *
 *****************************************************/
 
 function addListeners() {
    $('#fork').on('click', function(evt)
    {
        evt.stopPropagation();
       // evt.preventDefault();
        console.log('CLICK');
        // Make URL for Ajax call
        ajaxURL = '../../controller/php/addition.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        $.post(ajaxURL, $('#createMitigationForm').serialize(), processAddition);
        console.log('AJAX call submitted.');
        processAddition();
    });

}


/****************************************************
 *                  Callbacks                       *
 ****************************************************/
function processData(echoedData) {
    // Very simple callback that can be used for movies and actors
    // Note that the HTML tagging is done by the PHP
    $('#left').html(echoedData);
}