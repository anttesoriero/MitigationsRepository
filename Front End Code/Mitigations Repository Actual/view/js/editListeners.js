/*forking page listeners  */

console.log('editListeners.js loaded.');

addListeners();

/*****************************************************
 *                        Listeners                  *
 *****************************************************/
 
 function addListeners() {
    $('#edit').on('click', function(evt)
    {
        evt.stopPropagation();
       // evt.preventDefault();
        console.log('CLICK');
        // Make URL for Ajax call
        ajaxURL = '../../controller/php/editing.php';

        // Serialize the form so Ajax can post it asynchronously, then post it.
        $.post(ajaxURL, $('#editMitigationForm').serialize(), processEdit);
        console.log('AJAX call submitted.');
        processEdit();
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

function processEdit(editData) {
    if (editData.toLowerCase().indexOf("error") != -1) {
        $('#errorMessage').html(editData);
    } else if (editData.toLowerCase().indexOf("success") != -1) {
        $('#successMessage').html(editData);  // visible for split second
    }
}

function destroy(message) {
    $('#rightResultDisplay').html(message);
}