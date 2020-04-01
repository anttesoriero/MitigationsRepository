/*search page listeners  */

console.log('createListeners.js loaded.');

addListeners();

/*****************************************************
 *                        Listeners                  *
 *****************************************************/
function addListeners() {
    $('#create').on('click', function(evt)
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

function processAddition(additionData)
{
    if (additionData.toLowerCase().indexOf("error") != -1) {
        $('#errorMessage').html(additionData);
    }
    else if (additionData.toLowerCase().indexOf("success") != -1) {
        $('#successMessage').html(additionData);  // visible for split second
    }
}

function destroy(message)
{
    $('#rightResultDisplay').html(message);
}