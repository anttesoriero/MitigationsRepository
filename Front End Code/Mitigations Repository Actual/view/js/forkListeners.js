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
        $.post(ajaxURL, $('#forkMitigationForm').serialize(), processFork);
        console.log('AJAX call submitted.');
        processFork();
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

function processFork(forkData) {
    if (forkData.toLowerCase().indexOf("error") != -1) {
        $('#errorMessage').html(forkData);
    } else if (forkData.toLowerCase().indexOf("success") != -1) {
        $('#successMessage').html(forkData);  // visible for split second
    }
}

function destroy(message) {
    $('#rightResultDisplay').html(message);
}