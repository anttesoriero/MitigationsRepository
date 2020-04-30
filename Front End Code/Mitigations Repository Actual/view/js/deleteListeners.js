/*delete page listeners  */

console.log('deleteListeners.js loaded.');

/*******************************/
addListeners();
/*user Role*/
var role = 'role';

/*Getting user's role*/
try {
    ajaxURL = '../../controller/php/getRole.php';
    roleTemp = ajaxFetch(ajaxURL, processRole);
} catch (e) {
    console.log("Error in getRole.php" + e);
}

function processRole(jsonResults) {

    var jsonData = JSON.parse(jsonResults);
    role = jsonData[0].ROLE;
    console.log(role);
}

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

function processDelete(deleteData) {
    console.log(deleteData)
    if (deleteData.toLowerCase().indexOf("error") != -1) {
        $('#errorMessage').html(deleteData);
    } else if (deleteData.toLowerCase().indexOf("success") != -1) {
        $('#successMessage').html(deleteData);  // visible for split second
        window.location.href = '../../index.php';
    }
}



