/*delete page listeners  */

console.log('deleteListeners.js loaded.');

/*******************************/
addListeners();

/*****************************************************
 *                        Listeners                  *
 *****************************************************/

function addListeners() {
    $('#delete').on('click', function (evt) {
        evt.stopPropagation();
       // evt.preventDefault();
        console.log('CLICK');
        // Make URL for Ajax call
        ajaxURL = '../../controller/php/deleting.php';

	    // Serialize the form so Ajax can post it asynchronously, then post it.
        $.post(ajaxURL, $('#deleteMitigationForm').serialize(), processDelete);
        console.log('AJAX call submitted.');
        processDelete();
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


function processDelete(deleteData) {
    console.log(deleteData)
    if (deleteData.toLowerCase().indexOf("error") != -1) {
        $('#errorMessage').html(editData);
    } else if (deleteData.toLowerCase().indexOf("success") != -1) {
        $('#successMessage').html(editData);  // visible for split second

        window.location.href = '../../index.php';
    }
}


